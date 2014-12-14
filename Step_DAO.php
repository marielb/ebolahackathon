<?php

require('MySql_Connector.php'); 

class Step_DAO {

	public $db;

	public function __construct() {
		$this->db = new MySql_Connector();
	}

	public function loadInitialStep() {
		$sql = "SELECT TOP 1 *
			FROM tblSteps
			WHERE StepID = 0";

		return $this->db->query($sql);
	}

	public function addStep($question, $stepId, $response) {
		$sql = "INSERT INTO tblSteps
			(Question, Response, StepID)
			VALUES
			(?,?,?)";

		$sql->bind_param("ssi", $question, $response, $stepId);

		$this->db->query($sql);
	}

	public function updateQuestion($stepId, $question) {
		$sql = "UPDATE tblSteps
			SET Question = ?
			WHERE StepID = ?";
		
		$sql->bind_param("si", $question, $stepId);

		$this->db->query($sql);
	}

	public function updateResponse($stepId, $response) {
		$sql = "UPDATE tblSteps
			SET Response = ?
			WHERE $stepId = ?";

		$sql->bind_param("si", $response, $stepId);

		$this->db->query($sql);
	}
}

?>