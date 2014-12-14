<?php

require('Message_DAO.php'); 

class Message_Model {

	public $dao;

	public $healerPhoneNumber;

	public $message;

	public function __construct($healerPhoneNumber, $message) {
		$this->dao = new Message_DAO();

		$this->healerPhoneNumber = $healerPhoneNumber;
		$this->message = $message;	
	}

	public function logMessage() {
		$this->dao->logMessage($this->healerPhoneNumber);
	}

	public function getCurrentStep() {
		$result = $this->dao->getCurrentStep($this->healerPhoneNumber);

		if (empty($result)) {
			return 0;
		} else {
			return $result;
		}
	}

	public function getNextMessage($input) {
		$step = new Step_Model($this->getCurrentStep());
		$step->loadOptions();

		if ($step->stepID == 0) {
			return $step->getQuestion();
		} else {
			return $step->getNextMessage($input);
		}
	}
}

?>