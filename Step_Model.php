<?php

require('Step_DAO.php'); 

class Step_Model {

	public $dao;

	public $stepId;

	public $question;

	public $response;

	public function __construct($stepId, $question, $response) {
		$this->dao = new Steps_DAO();

		$this->stepId = $stepId;
		$this->question = $question;
		$this->response = $response;
	}

	public function loadInitialStep() {
		$result = $this->dao->loadInitialStep();

		$this->stepId = $result['StepId'];
		$this->question = $result['Question'];
		$this->response = $result['Response'];
	}


	public function addStep($question, $stepId, $response) {
		$this->dao->addStep($question, $stepId, $response);
	}

	public function updateQuestion($question) {
		$this->dao->updateQuestion($this->stepId, $question);
	}

	public function updateResponse($response) {
		$this->dao->updateResponse($this->stepId, $response);
	}
}

?>