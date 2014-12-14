<?php

require('MySql_Connector.php'); 

class Steps_DAO {

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
			('" . $question . "', '" . $response . "', " . $stepId . ")";

		echo $sql;
		$result = $this->db->query($sql);

		echo var_dump($result);
	}

	public function updateQuestion($stepId, $question) {
		$sql = "UPDATE tblSteps
			SET Question = " . $question . "
			WHERE StepID = " . $stepId;

		$this->db->query($sql);
	}

	public function updateResponse($stepId, $response) {
		$sql = "UPDATE tblSteps
			SET Response = " . $response . "
			WHERE $stepId = " . $stepId;

		$this->db->query($sql);
	}
}

?>