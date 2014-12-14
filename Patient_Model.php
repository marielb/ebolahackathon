<?php

require('Patient_DAO.php'); 

class Patient_Model {

	public $dao;

	public $name;

	public $healerPhoneNumber;

	public $age;

	public $isFemale;

	public function __construct($db, $name, $healerPhoneNumber) {
		$this->dao = new Patient_DAO($db);

		$this->name = $name;
		$this->healerPhoneNumber = $healerPhoneNumber;
	}

	public function load() {
		$result = $this->dao->load($this->name, $this->healerPhoneNumber);

		$this->age = $result['Age'];
		$this->isFemale = $result['IsFemale'];
	}

	public function addPatient() {
		$this->dao->addPatient($this->name, $this->healerPhoneNumber);
	}

	public function updateAge($age) {
		$this->dao->updateAge($this->name, $this->healerPhoneNumber, $age);
	}

	public function updateGender($isFemale) {
		$this->dao->updateGender($this->name, $this->healerPhoneNumber, $isFemale);
	}
}

?>