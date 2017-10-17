<?php

class LocationRepository {

	/**
	 * Return a list of all locations
	 *
	 * @return array List of Location
	 */
	public function findAll() {
		global $dataBase;

		$sql = "
			SELECT *
			FROM t_location
			ORDER BY loc_continent, loc_country, loc_place
		";
		$sth = $dataBase->prepare( $sql );
		$sth->execute();
		$result = $sth->fetchAll();

		$locations = array();
		foreach ( $result as $row ) {
			array_push( $locations, $this->buildDomainObject( $row ) );
		}
		return $locations;
	}

	/**
	 * Returns a location matching the supplied identifier
	 *
	 * @param int $locId Location identifier
	 * @return Location
	 */
	public function findById( int $locId ) {
		global $dataBase;

		$sql = "
			SELECT *
			FROM t_location
			WHERE loc_id = ?
		";
		$sth = $dataBase->prepare( $sql );
		$sth->execute( array( $locId ) );
		$row = $sth->fetch();

		if ( $row ) {
			return $this->buildDomainObject( $row );
		}
	}

	/**
	 * Returns the frequency of which a location matching the supplied identifier is used
	 *
	 * @param int $locId Location identifier
	 * @return Location
	 */
	public function getFrequency( int $locId ) {
		global $dataBase;

		$sql = "
			SELECT COUNT(*) AS frequency
			FROM t_event
			WHERE loc_id = ?
		";
		$sth = $dataBase->prepare( $sql );
		$sth->execute( array( $locId ) );
		$row = $sth->fetch();

		if ( $row ) {
			return $row['frequency'];
		}
		return 0;
	}

	/**
	 * Saves a location into the database
	 *
	 * @param Location $location Location to save
	 * @return Location Saved location
	 */
	function save( Location $location ) {
		$continents = $location->continents;

		if ( !$location->getContinent() ) {
			return 'Continent obligatoire';
		}
		if ( !in_array( $location->getContinent(), array_keys( $continents ) ) ) {
			return 'Continent incorrect';
		}

		if ( $location->getContinent() == 'Monde' ) {
			$location->setCountry( '' );
		}
		if ( $location->getCountry() and !in_array( $location->getCountry(), $continents[$location->getContinent()] ) ) {
			return 'Pays incorrect';
		}

		if ( $location->getPlace() and strlen( $location->getPlace() ) > 255 ) {
			return 'Lieu trop long';
		}

		if ( $location->getId() ) {
			return $this->update( $location );
		}
		else {
			return $this->insert( $location );
		}
	}

	/**
	 * Inserts a location into the database
	 *
	 * @param Location $location Location to save
	 * @return Location Saved location
	 */
	function insert( Location $location ) {
		global $dataBase;

		$sql = "
			INSERT INTO t_location ( loc_continent, loc_country, loc_place )
			VALUES ( :continent, :country, :place )
		";
		$sth = $dataBase->prepare( $sql );
		$sth->execute( array(
			'continent' => htmlspecialchars( $location->getContinent() ),
			'country'   => htmlspecialchars( $location->getCountry() ),
			'place'     => htmlspecialchars( $location->getPlace() ),
		) );

		return $this->findById( $dataBase->lastInsertId() );
	}

	/**
	 * Updates a location into the database
	 *
	 * @param Location $location Location to save
	 * @return Location Saved location
	 */
	function update( Location $location ) {
		global $dataBase;

		$sql = "
			UPDATE t_location
			SET loc_continent = :continent, loc_country = :country, loc_place = :place
			WHERE loc_id = :id
		";
		$sth = $dataBase->prepare( $sql );
		$sth->execute( array(
			'id'        => $location->getId(),
			'continent' => htmlspecialchars( $location->getContinent() ),
			'country'   => htmlspecialchars( $location->getCountry() ),
			'place'     => htmlspecialchars( $location->getPlace() ),
		) );

		return $this->findById( $location->getId() );
	}

	/**
	 * Removes a location from the database
	 *
	 * @param int $locId Location identifier
	 */
	function delete( int $locId ) {
		global $dataBase;

		$sql = "
			DELETE FROM t_location
			WHERE loc_id = ?
		";

		$sth = $dataBase->prepare( $sql );
		$sth->execute( array( $locId ) );
	}

	/**
	 * Creates a Location using on a database row
	 *
	 * @param array $row Database row containing the data
	 * @return Location
	 */
	protected function buildDomainObject( array $row ) {
		$location = new Location();

		$location->setId( $row['loc_id'] );
		$location->setContinent( $row['loc_continent'] );
		$location->setCountry( $row['loc_country'] );
		$location->setPlace( $row['loc_place'] );

		return $location;
	}
}