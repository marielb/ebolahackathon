<?php

require('MySql_Connector.php'); 

class Step_DAO {

	public $db;

	public function __construct() {
		$this->db = new MySql_Connector();
	}

	public function loadOptions($stepId) {
		$sql = $this->db->mysqli->prepare("SELECT *
			FROM tblStep
			INNER JOIN tblOption
			ON tblStep.OptionID = tblOption.OptionID
			WHERE StepID = ?");

		$sql->bind_param("i", $stepId);

		return $this->db->query($sql);
	}

	public function getStepMessage($stepId) {
		$sql = $this->db->mysqli->prepare("SELECT Message
			FROM tblStep
			INNER JOIN tblStepMessage
			ON tblStep.StepID = tblStepMessage.StepID
			WHERE StepID = ?");

		$sql->bind_param("i", $stepId);

		return $this->db->query($sql);
	}
}

?>