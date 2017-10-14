<?php
	class Date
	{
		var $days = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
		var $months = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
		
		/**
		  * Returns all dates between the current year and the end of the forward year
		  *
		  * @param $current_year, $forward_year
		  * @return $result
		  */
		function getAll($current_year, $forward_year)
		{
			$result = array();
			$date = new DateTime($current_year."-01-01");
			
			while ($date->format("Y") <= $forward_year)
			{
				$year = $date->format("Y");
				$month = $date->format("n");
				$day = $date->format("j");
				$week_day = str_replace("0", "7", $date->format("w"));
			
				$result[$year][$month][$day] = $week_day;
				$date->add(new DateInterval("P1D"));
			}
			
			return $result;
		}	
	}
?>