<?php

class ApiController {

	public function monthlyTablesAction( $numberOfYears ) {
		$date     = new Date();
		$tables   = array();
		$year     = (int) date( 'Y' );
		$lastYear = $year + ( $numberOfYears - 1 );
		$eventRep = new EventRepository();
		$events   = $eventRep->findBetweenYears( $year, $lastYear );

		while ( $year <= $lastYear ) {
			for ( $month = 1; $month <= 12; $month++ ) {
				$html = '<table>';

				// Head
				$html .= '<thead><tr>';
				foreach ( $date->days as $day ) {
					$html .= '<th>' . $day . '</th>';
				}
				$html .= '</tr></thead>';

				// Body
				$html .= '<tbody><tr>';
				$lastDay = cal_days_in_month( CAL_GREGORIAN, $month, $year );
				for ( $day = 1; $day <= $lastDay; $day++ ) {
					$datetime = new DateTime( $year . '-' . $month . '-' . $day );
					$week_day = date( 'N', $datetime->getTimestamp() );

					// Add cases if not a monday
					if ( $day == 1 && $week_day != 1 ) {
						$html .= '<td colspan="' . ( $week_day - 1 ) . '" class="preambule"></td>';
					}

					// Day number
					if ( date( 'Y-n-j' ) == $datetime->format( 'Y-n-j' ) ) {
						$html .= '<td class="today">';
					}
					else {
						$html .= '<td>';
					}
					$html .= '<div class="day">' . $day . '</div>';
					
					
					
					// On ajoute les événements s'il y en a		
					if ( isset( $events[ $datetime->format( 'Y-n-j' ) ] ) ) {
						$html .= '<ul class="events">';
						foreach ( $events[ $datetime->format( 'Y-n-j' ) ] as $id => $event ) {
							$html .= '<li>';
								$html .= '<span class="title ';
								if ( $event->getLocation() ) {
									$html .= strtolower( $event->getLocation()->getCountry() );
								}
								$html .= '">';
									if ( $event->getTopic() ) {
										$html .= '<a href="' . $event->getTopic() . '" target="_blank">';
										$html .= '<span class="title-orga">Événement organisé :</span> ';
									}
									$html .= $event->getName();
									if ( $event->getTopic() ) {
										$html .= '</a>';
									}
								$html .= '</span>';

								$html .= '<div class="desc">';
									$html .= '<span class="name">';
										if ( $event->getTopic() ) {
											$html .= '<span class="name-orga">Événement organisé</span><br />';
										}
										$html .= $event->getName();
									$html .= '</span>';
									$html .= '<br />';
									if ( $event->getLocation() ) {
										$html .= '<span class="location ' . strtolower( $event->getLocation()->getCountry() ) . '">';
										$html .= $event->getLocation()->smallString();
										$html .= '</span>';
										$html .= '<br /><hr class="separator" />';	
									}
									$html .= '<div>' . $event->getDescription() . '</div>';
								$html .= '</div>';
							$html .= '</li>';
						}
						$html .= '</ul>';
					}

					// End of day
					$html .= '</td>';

					// Return to line a the end of each week
					if ( $week_day == 7 ) {
						$html .= '</tr><tr>';
					}

					// Add cases if not a sunday
					if ( $day == $lastDay && $week_day != 7 ) {
						$html .= '<td colspan="' . ( 7 - $week_day ) . '" class="end"></td>';
					}
				}
				$html .= '</tr></tbody>';

				// End
				$html .= '</table>';
				array_push( $tables, array( 'id' => $datetime->format( 'Y-n' ), 'content' => $html ) );
			}
			$year++;
		}

		header( 'Content-type: application/json' );
		echo $_GET['callback'] . '(' . json_encode( $tables ) . ')';
	}
}