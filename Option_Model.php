<?php

require('Option_DAO.php'); 

class Option_Model {

	public $dao;

	public $optionId;

	public $optionText;

	public $nextStep;


	public function __construct($optionId, $optionText, $nextStep) {
		$dao = new Options_DAO();

		$this->optionId = $optionId;
		$this->optionText = $optionText;
		$this->nextStep = $nextStep;
	}

	public function getNextStep() {
		return $this->dao->getNextStep($this->optionId);
	}

	public function getOptionText() {
		return $this->dao->getOptionText($this->optionId);
	}

}

?>