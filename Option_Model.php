<?php

require_once('Option_DAO.php'); 

class Option_Model {

	public $dao;

	public $optionID;

	public $optionText;

	public $nextStep;


	public function __construct($db, $optionID, $optionText, $nextStep) {
		$dao = new Option_DAO($db);

		$this->optionID = $optionID;
		$this->optionText = $optionText;
		$this->nextStep = $nextStep;
	}

	public function getNextStep() {
		return $this->dao->getNextStep($this->optionID);
	}

	public function getOptionText() {
		return $this->dao->getOptionText($this->optionID);
	}

}

?>