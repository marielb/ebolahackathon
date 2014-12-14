<?php

require('MySql_Connector.php'); 

class Patient_DAO {

	public $db;

	public function __construct() {
		$this->db = new MySql_Connector();
	}

	public function logMessage($healerPhoneNumber) {
		$sql = $this->db->mysqli->prepare("INSERT INTO tblConversation
			SET PhoneNumber = ?");

		$statement->bind_param("s", $healerPhoneNumber);

		return $this->db->query($sql);
	}

	public function getCurrentStep($healerPhoneNumber) {
		$statement = $this->db->mysqli->prepare("SELECT TOP 1 Step 
			FROM tblConversation
			WHERE PhoneNumber = ?
			ORDER BY Timestamp desc");

		$statement->bind_param("s", $healerPhoneNumber);

		return $this->db->query($statement);
	}

}

?>