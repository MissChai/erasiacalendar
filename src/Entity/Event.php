<?php

class Event {	

	private $id;
	private $name;
	private $description;
	private $topic;
	private $isAnnual;
	private $beginDate;
	private $endDate;
	private $location;

	public function getId() {
		return $this->id;
	}

	public function setId( $id ) {
		$this->id = $id;
	}

	public function getName() {
		return $this->name;
	}

	public function setName( $name ) {
		$this->name = $name;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription( $description ) {
		$this->description = $description;
	}

	public function getTopic() {
		return $this->topic;
	}

	public function setTopic( $topic ) {
		$this->topic = $topic;
	}

	public function getIsAnnual() {
		return $this->isAnnual;
	}

	public function setIsAnnual( $isAnnual ) {
		$this->isAnnual = $isAnnual;
	}

	public function getBeginDate() {
		return $this->beginDate;
	}

	public function setBeginDate( $beginDate ) {
		$this->beginDate = $beginDate;
	}

	public function getEndDate() {
		return $this->endDate;
	}

	public function setEndDate( $endDate ) {
		$this->endDate = $endDate;
	}

	public function getLocation() {
		return $this->location;
	}

	public function setLocation( $location ) {
		$this->location = $location;
	}

	public function isPassed() {
		if ( $this->isAnnual ) {
			return true;
		}

		$year    = date( 'Y' );
		$endDate = new DateTime( $this->endDate );
		if ( $year > $endDate->format( 'Y' ) ) {
			return true;
		}
		return false;
	}
}