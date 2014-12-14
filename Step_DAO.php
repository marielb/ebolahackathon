<?php

require_once('MySql_Connector.php'); 

class Step_DAO {

	public $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function loadOptions($stepId) {
		$sql = $this->db->mysqli->prepare("SELECT *
			FROM tblStep
			INNER JOIN tblOption
			ON tblStep.OptionID = tblOption.OptionID
			WHERE tblStep.StepID = ?");

		$sql->bind_param("i", $stepId);

		return $this->db->queryToArray($sql);
	}

	public function getStepMessage($stepId) {
		$sql = $this->db->mysqli->prepare("SELECT tblStepMessage.Message
			FROM tblStep
			INNER JOIN tblStepMessage
			ON tblStep.StepID = tblStepMessage.StepID
			WHERE tblStep.StepID = ?
			LIMIT 1");

		$sql->bind_param("i", $stepId);
		
		$result = $this->db->queryToArray($sql);

		return $result[0]['Message'];
	}
}

?>