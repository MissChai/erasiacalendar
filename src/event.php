<?php
	class Event
	{	
		public $name;
		public $description;
		public $location;
		public $topic;
		
		/**
		  * Constructs an Event
		  */
		public function Event() { }
	
		public function __construct($name, $description, $location, $topic)
		{
			$this->name = $name;
			$this->description = $description;
			$this->location = $location;
			$this->topic = $topic;
		}
		
		/**
		  * Returns all events from the database
		  */
		public function getAll($current_year, $forward_year)
		{
			global $data_base;
			$events = array();
			$request = $data_base->query('SELECT id_event, name_event, topic, begin_year, begin_month, begin_day,
												end_year, end_month, end_day, description, name_period, name_location
											FROM events e 
											INNER JOIN locations l
											ON e.id_location = l.id_location
											INNER JOIN periods p
											ON e.id_period = p.id_period') or die(print_r($data_base->errorInfo()));

			while ($data = $request->fetch()) {
				$id = $data['id_event'];
				$name = $data['name_event'];
				$description = $data['description'];
				$location = $data['name_location'];
				$topic = $data['topic'];
				
				$begin_year = $data['begin_year'];
				$begin_month = $data['begin_month'];
				$begin_day = $data['begin_day'];
				$end_year = $data['end_year'];
				$end_month = $data['end_month'];
				$end_day = $data['end_day'];
				$period = $data['name_period'];
				
				// si on a tout
				if (isset($begin_year) && isset($begin_month) && isset($begin_day) 
					&& isset($end_year) && isset($end_month) && isset($end_day)) {
					$begin_date = new DateTime($begin_year.'-'.$begin_month.'-'.$begin_day);
					$end_date = new DateTime($end_year.'-'.$end_month.'-'.$end_day);
					
					// événement apériodique
					if ($period == 'none') {
						$begin_timestamp = $begin_date->getTimestamp();
						$end_timestamp = $end_date->getTimestamp();	
						do {
							$events[$begin_timestamp][$id] = new Event($name, $description, $location, $topic);
							$begin_date->add(new DateInterval("P1D"));
							$begin_timestamp = $begin_date->getTimestamp();
						} while ($begin_timestamp <= $end_timestamp);
					}
					
				// si on a pas les années
				} else if (isset($begin_month) && isset($begin_day) && isset($end_month) && isset($end_day)) {
					// journée annuelle
					if (($period == 'annual') && ($begin_month == $end_month) && ($begin_day == $end_day)) {
						$begin_date = new DateTime($current_year.'-'.$begin_month.'-'.$begin_day);
						$end_date = new DateTime($forward_year.'-'.$end_month.'-'.$end_day);
						$begin_timestamp = $begin_date->getTimestamp();
						$end_timestamp = $end_date->getTimestamp();				
						do {
							$events[$begin_timestamp][$id] = new Event($name, $description, $location, $topic);
							$begin_date->add(new DateInterval("P1Y"));
							$begin_timestamp = $begin_date->getTimestamp();
						} while ($begin_timestamp <= $end_timestamp);
						
					// période annuelle
					} else if (($period == 'annual') && (($begin_month != $end_month) || ($begin_day != $end_day))) {
						$year = $current_year;
						while ($year <= $forward_year) {
							if ($begin_month <= $end_month)
								$end_year = $year;
							else
								$end_year = $year + 1;
							$begin_date = new DateTime($year.'-'.$begin_month.'-'.$begin_day);
							$end_date = new DateTime($end_year.'-'.$end_month.'-'.$end_day);
							$begin_timestamp = $begin_date->getTimestamp();
							$end_timestamp = $end_date->getTimestamp();
							do {
								$events[$begin_timestamp][$id] = new Event($name, $description, $location, $topic);
								$begin_date->add(new DateInterval("P1D"));
								$begin_timestamp = $begin_date->getTimestamp();
							} while ($begin_timestamp <= $end_timestamp);
							$year++;
						}
					}
				}
			}

			$request->closeCursor();
			//echo '<pre>'.print_r($events).'</pre>';	
			return $events;
		}
		
		/**
		  * Returns the country affected to an event
		  */
		public function getCountry()
		{
			$country = 'tous';
			if (preg_match("/^Terros/", $this->location))
				$country = 'terros';
			else if (preg_match("/^Mizuhan/", $this->location))
				$country = 'mizuhan';
			else if (preg_match("/^Nalcia/", $this->location))
				$country = 'nalcia';
			else if (preg_match("/^Flamen/", $this->location))
				$country = 'flamen';
			else if (preg_match("/^Abyan/", $this->location))
				$country = 'abyan';
			else if (preg_match("/^Torcan/", $this->location))
				$country = 'torcan';
			else if (preg_match("/^Aliphyr/", $this->location))
				$country = 'aliphyr';
			else if (preg_match("/^Dyrinn/", $this->location))
				$country = 'dyrinn';
			else if (preg_match("/^Tenkei \/ Midgard/", $this->location))
				$country = 'tenkei';
			else if (preg_match("/^[EÉ]rasia/", $this->location))
				$country = 'erasia';
			else
				$country = 'tous';
			
			return $country;
		}
	}
?>









