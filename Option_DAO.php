<?php

require_once('MySql_Connector.php'); 

class Option_DAO {

	public $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function getNextStep($optionId) {
		$sql = $this->db->mysqli->prepare("SELECT NextStep
			FROM tblOption
			WHERE OptionID = ?
			LIMIT 1");

		$sql->bind_param("i", $optionId);

		$result = $this->db->queryToArray($sql);
		return $result[0]['NextStep'];
	}

	public function getOptionText($optionId) {
		$sql = $this->db->mysqli->prepare("SELECT OptionText
			FROM tblOption
			WHERE OptionID = ?
			LIMIT 1");

		$sql->bind_param("i", $optionId);

		$result = $this->db->queryToArray($sql);
		return $result[0]['OptionText'];
	}

}

?>