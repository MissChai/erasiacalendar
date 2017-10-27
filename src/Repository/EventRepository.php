<?php

class EventRepository {

	/**
	 * Return a list of all events
	 *
	 * @return array List of events
	 */
	public function findAll() {
		global $dataBase;

		$sql = "
			SELECT *
			FROM t_event
			ORDER BY evt_name
		";
		$sth = $dataBase->prepare( $sql );
		$sth->execute();
		$result = $sth->fetchAll();

		$events = array();
		foreach ( $result as $row ) {
			array_push( $events, $this->buildDomainObject( $row ) );
		}
		return $events;
	}

	/**
	  * Return a list of all annual events
	  *
	  * @return array List of events
	  */
	public function findAnnual() {
		global $dataBase;

		$sql = "
			SELECT *
			FROM t_event
			WHERE evt_is_annual = 1
			ORDER BY evt_name
		";
		$sth = $dataBase->prepare( $sql );
		$sth->execute();
		$result = $sth->fetchAll();

		$events = array();
		foreach ( $result as $row ) {
			array_push( $events, $this->buildDomainObject( $row ) );
		}
		return $events;
	}

	/**
	  * Return a list of all special events
	  *
	  * @return array List of events
	  */
	public function findAperiodic() {
		global $dataBase;

		$sql = "
			SELECT *
			FROM t_event
			WHERE evt_is_annual = 0
			ORDER BY evt_name
		";
		$sth = $dataBase->prepare( $sql );
		$sth->execute();
		$result = $sth->fetchAll();

		$events = array();
		foreach ( $result as $row ) {
			array_push( $events, $this->buildDomainObject( $row ) );
		}
		return $events;
	}

	/**
	  * Return a list of all events between years
	  *
	  * @param $currentYear, $forwardYear
	  */
	public function findBetweenYears( $currentYear, $forwardYear ) {
		$all    = $this->findAll();
		$events = array();

		foreach ( $all as $event ) {
			$beginDate = new DateTime( $event->getBeginDate() );
			$endDate   = new DateTime( $event->getEndDate() );

			// Special event
			if ( !$event->getIsAnnual() ) {
				if ( (int) $endDate->format( 'Y' ) < $currentYear ) {
					continue;
				}

				$date = clone $beginDate;
				while ( $date <= $endDate ) {
					$events[$date->format( 'Y-n-j' )][$event->getId()] = $event;
					$date->add( new DateInterval( 'P1D' ) );
				}
			}

			// Annual event
			else {
				$year = $currentYear;

				// Event in same year
				if ( $beginDate <= $endDate ) {
					while ( $year <= $forwardYear ) {
						$date = clone $beginDate;
						while ( $date <= $endDate ) {
							$events[$year . $date->format( '-n-j' )][$event->getId()] = $event;
							$date->add( new DateInterval( 'P1D' ) );
						}
						$year++;
					}
				}

				// Event between year
				else {
					$endDate->add( new DateInterval( 'P1Y' ) );
					$year--;

					while ( $year <= $forwardYear ) {
						$date = clone $beginDate;
						while ( $date <= $endDate ) {
							if ( $date->format( 'Y' ) == $endDate->format( 'Y' ) ) {
								$year++;
							}
							if ( $year <= $forwardYear ) {
								$events[$year . $date->format( '-n-j' )][$event->getId()] = $event;
							}
							$date->add( new DateInterval( 'P1D' ) );
						}
					}
				}
			}
		}

		return $events;
	}


	/**
	 * Return a list of events using a location
	 *
	 * @param int $locId Location identifier
	 * @return Event
	 */
	public function findByLocation( $locId ) {
		global $dataBase;

		$sql = "
			SELECT *
			FROM t_event
			WHERE loc_id = ?
		";
		$sth = $dataBase->prepare( $sql );
		$sth->execute( array( $locId ) );
		$result = $sth->fetchAll();

		$events = array();
		foreach ( $result as $row ) {
			array_push( $events, $this->buildDomainObject( $row ) );
		}
		return $events;
	}

	/**
	 * Returns an event matching the supplied identifier
	 *
	 * @param int $evtId Event identifier
	 * @return Event
	 */
	public function findById( $evtId ) {
		global $dataBase;

		$sql = "
			SELECT *
			FROM t_event
			WHERE evt_id = ?
		";
		$sth = $dataBase->prepare( $sql );
		$sth->execute( array( $evtId ) );
		$row = $sth->fetch();

		if ( $row ) {
			return $this->buildDomainObject( $row );
		}
	}

	/**
	 * Saves an event into the database
	 *
	 * @param event $event Event to save
	 * @return Event Saved event
	 */
	function save( $event ) {
		if ( !$event->getName() ) {
			return 'Nom obligatoire.';
		}
		else if ( strlen( $event->getName() ) > 255 ) {
			return 'Nom trop long.';
		}

		if ( !$event->getBeginDate() ) {
			return "Date de début obligatoire.";
		}
		try {
			$beginDate = new DateTime( $event->getBeginDate() );
		}
		catch ( Exception $e ) {
			return "Date de début incorrecte.";
		};

		if ( !$event->getEndDate() ) {
			$event->setEndDate( $event->getBeginDate() );
		}
		try {
			$endDate = new DateTime( $event->getEndDate() );
		}
		catch ( Exception $e ) {
			return "Date de fin incorrecte.";
		};

		if ( !$event->getIsAnnual() ) {
			if ( $beginDate->format( 'Y' ) < 2008 ) {
				return 'Date de début trop lointaine.';
			}
			if ( $beginDate > $endDate ) {
				return "Date de fin antérieur à la date de début.";
			}
		}
		else {
			$beginDate->setDate( 0000, $beginDate->format( 'm' ), $beginDate->format( 'd' ) );
			$endDate->setDate( 0000, $endDate->format( 'm' ), $endDate->format( 'd' ) );
		}

		$event->setBeginDate( $beginDate->format( 'Y-m-d' ) );
		$event->setEndDate( $endDate->format( 'Y-m-d' ) );

		if ( $event->getId() ) {
			return $this->update( $event );
		}
		else {
			return $this->insert( $event );
		}
	}

	/**
	 * Inserts an event into the database
	 *
	 * @param event $event Event to save
	 * @return event Saved event
	 */
	function insert( $event ) {
		global $dataBase;

		$locId = null;
		if ( $event->getLocation() ) {
			$locId = htmlspecialchars( $event->getLocation()->getId() );
		}

		$sql = "
			INSERT INTO t_event ( evt_name, evt_description, evt_topic, evt_is_annual, evt_begin_date, evt_end_date, loc_id )
			VALUES ( :name, :description, :topic, :is_annual, :begin_date, :end_date, :loc_id )
		";
		$sth = $dataBase->prepare( $sql );
		$sth->execute( array(
			'name'        => htmlspecialchars( $event->getName() ),
			'description' => htmlspecialchars( $event->getDescription() ),
			'topic'       => htmlspecialchars( $event->getTopic() ),
			'is_annual'   => htmlspecialchars( ( $event->getIsAnnual() ) ? 1 : 0 ),
			'begin_date'  => htmlspecialchars( $event->getBeginDate() ),
			'end_date'    => htmlspecialchars( $event->getEndDate() ),
			'loc_id'      => $locId,
		) );

		return $this->findById( $dataBase->lastInsertId() );
	}

	/**
	 * Updates an event into the database
	 *
	 * @param Event $event Event to save
	 * @return Event Saved event
	 */
	function update( $event ) {
		global $dataBase;

		$locId = null;
		if ( $event->getLocation() ) {
			$locId = htmlspecialchars( $event->getLocation()->getId() );
		}

		$sql = "
			UPDATE t_event
			SET
				evt_name        = :name,
				evt_description = :description,
				evt_topic       = :topic,
				evt_is_annual   = :is_annual,
				evt_begin_date  = :begin_date,
				evt_end_date    = :end_date,
				loc_id          = :loc_id
			WHERE evt_id = :id
		";
		$sth = $dataBase->prepare( $sql );
		$sth->execute( array(
			'id'          => $event->getId(),
			'name'        => htmlspecialchars( $event->getName() ),
			'description' => htmlspecialchars( $event->getDescription() ),
			'topic'       => htmlspecialchars( $event->getTopic() ),
			'is_annual'   => htmlspecialchars( ( $event->getIsAnnual() ) ? 1 : 0 ),
			'begin_date'  => htmlspecialchars( $event->getBeginDate() ),
			'end_date'    => htmlspecialchars( $event->getEndDate() ),
			'loc_id'      => $locId,
		) );

		return $this->findById( $event->getId() );
	}

	/**
	 * Removes an event from the database
	 *
	 * @param int $evtId Event identifier
	 */
	function delete( $evtId ) {
		global $dataBase;

		$sql = "
			DELETE FROM t_event
			WHERE evt_id = ?
		";
		
		$sth = $dataBase->prepare( $sql );
		$sth->execute( array( $evtId ) );
	}

	/**
	 * Creates an Event using on a database row
	 *
	 * @param array $row Database row containing the data
	 * @return Event
	 */
	protected function buildDomainObject( $row ) {
		$event = new Event();

		$event->setId( $row['evt_id'] );
		$event->setName( $row['evt_name'] );
		$event->setDescription( $row['evt_description'] );
		$event->setTopic( $row['evt_topic'] );
		$event->setIsAnnual( ( $row['evt_is_annual'] ) ? true : false );
		$event->setBeginDate( $row['evt_begin_date'] );
		$event->setEndDate( $row['evt_end_date'] );
		
		if ( $row['loc_id'] ) {
			$locRep = new LocationRepository();
			$event->setLocation( $locRep->findById( $row['loc_id'] ) );
		}

		return $event;
	}
}