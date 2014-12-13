<?php

class Patient_Model {

	$dao;

	$name;

	$healerPhoneNumber;

	$age;

	$gender;

	public function __construct($name, $healerPhoneNumber) {
		$dao = new MySql_Connector();

		$this->name = $name;
		$this->healerPhoneNumber = $healerPhoneNumber;
	}

	public function addPatient($name, $healerPhoneNumber) {
		$this->dao->query($name, $healerPhoneNumber);
	}

	public function updateAge($age) {
		$this->dao->query($this->name, $this->healerPhoneNumber, $age);
	}

	public function updateGender($gender) {
		$this->dao->query($this->name, $this->healerPhoneNumber, $gender);
	}
}

?>