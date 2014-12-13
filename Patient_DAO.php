<?php

require('MySql_Connector.php'); 

class Patient_DAO {

	public $db;

	public function __construct() {
		$this->db = new MySql_Connector();
	}

	public function load($name, $healerPhoneNumber) {
		$sql = "SELECT TOP 1 PatientName, HealerPhoneNumber, Age, Gender
			FROM tblPatient
			WHERE PatientName = '" . $name  
				.	"' AND HealerPhoneNumber = '" . $healerPhoneNumber . "'";

		return $this->db->query($sql);
	}

	public function addPatient($name, $healerPhoneNumber) {
		$sql = "INSERT INTO tblPatient
			(PatientName, HealerPhoneNumber)
			VALUES
			('" . $name . "', '" . $healerPhoneNumber . "')";

		echo $sql;
		$result = $this->db->query($sql);

		echo var_dump($result);
	}

	public function updateAge($name, $healerPhoneNumber, $age) {
		$sql = "UPDATE tblPatient
			SET Age = " . $age . "
			WHERE PatientName = '" . $name . "'' AND HealerPhoneNumber = '" . $healerPhoneNumber . "'";

		$this->db->query($sql);
	}

	public function updateGender($name, $healerPhoneNumber, $gender) {
		$sql = "UPDATE tblPatient
			SET Age = " . $gender . "
			WHERE PatientName = '" . $name . "'' AND HealerPhoneNumber = '" . $healerPhoneNumber . "'";

		$this->db->query($sql);
	}
}

?>