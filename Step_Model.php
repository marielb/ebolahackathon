<?php

require('Step_DAO.php'); 

class Step_Model {

	public $dao;

	public $stepId;

	public $message;

	public $options;

	public function __construct($stepId) {
		$this->dao = new Steps_DAO();
		$this->stepId = $stepId;
	}


	public function loadOptions() {
		$result = $this->dao->loadOptions($this->stepId);
		$this->options = [];

		foreach ($result as $option) {
			$this->options[] = new Option_Model(
				$option['OptionID'],
				$option['OptionText'],
				$option['NextStep']
			)
		}
	}

	public function getNextMessage($input) {
		foreach ($this->options as $option) {
			if ($option->optionText == $input) {
				$nextStep = new Step_Model($option->nextStep);
				return $nextStep->getQuestion();
			}
		}
	}

	public function getStepMessage() {
		$str = $this->dao->getStepMessage($this->stepId);
	}

	public function getQuestion() {
		$str = $this->getStepMessage($this->$stepId);

		$count = 1;
		foreach ($this->options as $option) {
			$str .= "\n" . $count . ": "  . $option->optionText;
			$count += 1;
		}

		return $str;
	}
}

?>