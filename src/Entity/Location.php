<?php

class Location {	

	public $continents = array(
		'Monde'   => array(),
		'Érasia'  => array( 'Terros', 'Mizuhan', 'Flamen', 'Nalcia' ),
		'Midgard' => array( 'Abyan', 'Aliphyr', 'Torcan', 'Dyrinn' ),
	);

	private $id;
	private $continent;
	private $country;
	private $place;

	public function getId() {
		return $this->id;
	}

	public function setId( $id ) {
		$this->id = $id;
	}

	public function getContinent() {
		return $this->continent;
	}

	public function setContinent( $continent ) {
		$this->continent = $continent;
	}
	
	public function getCountry() {
		return $this->country;
	}

	public function setCountry( $country ) {
		$this->country = $country;
	}
	
	public function getPlace() {
		return $this->place;
	}

	public function setPlace( $place ) {
		$this->place = $place;
	}

	public function fullString() {
		$string = $this->continent;

		if ( $this->country ) {
			$string .= ' - ' . $this->country;
		}
		if ( $this->place ) {
			$string .= ' - ' . $this->place;
		}

		return $string;
	}

	public function smallString() {
		if ( $this->continent == 'Monde' ) {
			return 'Partout dans le monde...';
		}
		if ( $this->continent == 'Érasia' ) {
			$string;

			if ( $this->country ) {
				$string = $this->country;
			}
			else {
				$string = $this->continent;
			}

			if ( $this->place ) {
				$string .= ' - ' . $this->place;
			}

			return $string;
		}
		if ( $this->continent == 'Midgard' ) {
			if ( !$this->country and !$this->place ) {
				return $this->continent;
			}

			if ( $this->place ) {
				return $this->place;
			}
			return $this->country;
		}
	}
}









