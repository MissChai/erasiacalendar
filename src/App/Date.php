<?php

class Date {

	public $days = array(
		'Lundi',
		'Mardi',
		'Mercredi',
		'Jeudi',
		'Vendredi',
		'Samedi',
		'Dimanche',
	);

	public $months = array(
		'Janvier',
		'Février',
		'Mars',
		'Avril',
		'Mai',
		'Juin',
		'Juillet',
		'Août',
		'Septembre',
		'Octobre',
		'Novembre',
		'Décembre',
	);

	/**
	  * Returns all dates between the current year and the end of the forward year
	  *
	  * @param $currentYear, $forwardYear
	  * @return $result
	  */
	function findBetweenYears( $currentYear, $forwardYear ) {
		$result = array();
		$date   = new DateTime( $currentYear . '-01-01' );

		while ( $date->format( 'Y' ) <= $forwardYear ) {
			$year    = $date->format( 'Y' );
			$month   = $date->format( 'n' );
			$day     = $date->format( 'j' );
			$weekDay = str_replace( '0', '7', $date->format( 'w' ) );
		
			$result[$year][$month][$day] = $weekDay;
			$date->add( new DateInterval( 'P1D' ) );
		}

		return $result;
	}
}
