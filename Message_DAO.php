<?php

require_once('MySql_Connector.php'); 

class Message_DAO {

	public $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function logMessage($healerPhoneNumber, $message, $stepID) {
		$sql = $this->db->mysqli->prepare("INSERT INTO 
			tblConversation (PhoneNumber, Message, Step)
			VALUES (?, ?, ?)");


		$sql->bind_param("ssi", $healerPhoneNumber, $message, $stepID);

		return $this->db->query($sql);
	}

	public function getCurrentStep($healerPhoneNumber) {
		$sql = $this->db->mysqli->prepare("SELECT Step 
			FROM tblConversation
			WHERE PhoneNumber = ?
			ORDER BY Timestamp desc
			LIMIT 1");

		$sql->bind_param("s", $healerPhoneNumber);

		$result = $this->db->queryToArray($sql);

		if (count($result) == 0) {
			return -1;
		}

		return $result[0]['Step'];
	}

	public function clear($healerPhoneNumber) {
		$sql = $this->db->mysqli->prepare("DELETE 
			FROM tblConversation
			WHERE PhoneNumber = ?");

		$sql->bind_param("s", $healerPhoneNumber);

		$this->db->query($sql);
	}

	public function getAllAlerts() {
		$sql = $this->db->mysqli->prepare("SELECT PhoneNumber, Message, Timestamp as TimeReported
			FROM tblConversation
			WHERE Message = '16' OR Message = '15'
			ORDER BY Timestamp DESC");

		return $this->db->queryToArray($sql);
	}

}

?>