<?php

require('MySql_Connector.php'); 

class Patient_DAO {

	public $db;

	public function __construct() {
		$this->db = new MySql_Connector();
	}

	public function logMessage($name, $healerPhoneNumber) {
		$sql = "SELECT TOP 1 PatientName, HealerPhoneNumber, Age, Gender
			FROM tblPatient
			WHERE PatientName = ? AND HealerPhoneNumber = ?";

		return $this->db->query($sql);
	}

	public function getCurrentStep($name, $healerPhoneNumber) {
		$statement = $this->db->mysqli->prepare("INSERT INTO tblPatient
			(PatientName, HealerPhoneNumber)
			VALUES
			(?, ?)");

		$statement->bind_param("ss", $name, $healerPhoneNumber);

		$this->db->query($statement);
	}

	public function getNextMessage($name, $healerPhoneNumber, $age) {
		$statement = $this->db->mysqli->prepare("UPDATE tblPatient
			SET Age = ?
			WHERE PatientName = ? AND HealerPhoneNumber = ?");

		$statement->bind_param("iss", $age, $name, $healerPhoneNumber);

		$this->db->query($statement);
	}

}

?>