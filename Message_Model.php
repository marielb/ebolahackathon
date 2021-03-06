<?php

require_once('Message_DAO.php'); 
require_once('Step_Model.php'); 

class Message_Model {

	public $dao;

	public $healerPhoneNumber;

	public $message;

	public function __construct($db, $healerPhoneNumber, $message) {
		$this->dao = new Message_DAO($db);

		$this->healerPhoneNumber = $healerPhoneNumber;
		$this->message = $message;	
	}

	public function logMessage($stepID) {
		$this->dao->logMessage($this->healerPhoneNumber, $this->message, $stepID);
	}

	public function getCurrentStep() {
		$result = $this->dao->getCurrentStep($this->healerPhoneNumber);

		return $result;
	}

	public function getNextMessage() {
		$stepID = $this->getCurrentStep();

		if ($stepID < 0) {		
			$step = new Step_Model($this->dao->db, 0);
			$this->logMessage(0);
			return $step->getQuestion();
		}

		$step = new Step_Model($this->dao->db, $stepID);
		$step->loadOptions();

		$nextStep = $step->getNextStep($this->message);
		// echo var_dump($nextStep);

		if ($nextStep < 0) {
			return "Please enter a valid option number";
		}

		if ($nextStep->stepID == 7 || $nextStep->stepID == 8 || $nextStep->stepID == 3 || $nextStep->stepID == 5) {
			$this->logMessage(-1);
		} else {
			$this->logMessage($nextStep->stepID);
		}

		return $nextStep->getQuestion();

	}

	public function getAllAlerts() {
		$results = $this->dao->getAllAlerts();

		if (empty($results)) {
			return;
		}

		return json_encode($results);
	}
}

?>