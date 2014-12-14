<?php

require_once('Step_DAO.php'); 
require_once('Option_Model.php'); 

class Step_Model {

	public $dao;

	public $stepID;

	public $message;

	public $options;

	public function __construct($db, $stepID) {
		$this->dao = new Step_DAO($db);
		$this->stepID = $stepID;
	}


	public function loadOptions() {
		$result = $this->dao->loadOptions($this->stepID);
		$this->options = [];

		// echo var_dump($result);

		if (empty($result)) {
			return;
		}

		foreach ($result as $option) {
			$this->options[] = new Option_Model(
				$this->dao->db, 
				$option['OptionID'],
				$option['OptionText'],
				$option['NextStep']
			);
		}
	}

	public function getNextStep($input) {
		$input = intval($input);
		$this->loadOptions();

		foreach ($this->options as $option) {
			// echo $option->optionID;
			if ($option->optionID == $input) {
				$nextStep = new Step_Model($this->dao->db, $option->nextStep);
				return $nextStep;
			}
		}

		if (!empty($this->options)) {
			return -1;
		}
	}

	public function getStepMessage() {
		return $this->dao->getStepMessage($this->stepID);
	}

	public function getQuestion() {
		$this->loadOptions();
		$str = $this->getStepMessage($this->stepID) . "\n";

		foreach ($this->options as $option) {
			$str .= "" . $option->optionID . ": "  . $option->optionText . "\n";
		}

		return $str;
	}
}

?>