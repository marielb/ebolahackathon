<?php

require('MySql_Connector.php'); 

class Option_DAO {

	$db;

	public function __construct() {
		$db = new MySql_Connector();
	}

	public function getNextStep($optionId) {
		$sql = $this->db->mysqli->prepare("SELECT NextStep
			FROM tblOption
			WHERE OptionID = ?");

		$sql->bind_param("i", $optionId);

		$this->db->query($sql);
	}

	public function getOptionText($optionId) {
		$sql = $this->db->mysqli->prepare("SELECT OptionText
			FROM tblOption
			WHERE OptionID = ?");

		$sql->bind_param("i", $optionId);

		$this->db->query($sql);
	}

}

?>