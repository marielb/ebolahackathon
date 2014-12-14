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
		$this->dao->addPatient($this->name, $this->healerPhoneNumber);
	}

	public function getCurrentStep() {
		// look in tblConversation for current Step
		$this->dao->getCurrentStep($this->name, $this->healerPhoneNumber, $age);
	}

	public function getNextMessage($input) {
		// parent id = getcurrentstep
		// load all nodes (parentid)
		// match the node with the input (currNode, input)
		// look up the message by the node value
		// return message
		$this->dao->getNextMessage($this->name, $this->healerPhoneNumber, $isFemale);
	}
}

?>