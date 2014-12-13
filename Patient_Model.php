<?php

require('Patient_DAO.php'); 

class Patient_Model {

	public $dao;

	public $name;

	public $healerPhoneNumber;

	public $age;

	public $gender;

	public function __construct($name, $healerPhoneNumber) {
		$this->dao = new Patient_DAO();

		$this->name = $name;
		$this->healerPhoneNumber = $healerPhoneNumber;
	}

	public function load() {
		$result = $this->dao->load($this->name, $this->healerPhoneNumber);

		$this->age = $result['Age'];
		$this->gender = $result['Gender'];
	}

	public function addPatient() {
		$this->dao->addPatient($this->name, $this->healerPhoneNumber);
	}

	public function updateAge($age) {
		$this->dao->updateAge($this->name, $this->healerPhoneNumber, $age);
	}

	public function updateGender($gender) {
		$this->dao->updateGender($this->name, $this->healerPhoneNumber, $gender);
	}
}

?>