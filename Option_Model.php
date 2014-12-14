<?php

require('Node_DAO.php'); 

class Node_Model {

	public $dao;

	public $key;

	public $node;

	public $parentStepId;

	public $nodes;


	public function __construct($key, $parentStepId, $node, $nodes) {
		$dao = new Node_DAO();

		$this->key = $key;
		$this->parentStepId = $parentStepId;
		$this->node = $node;
		$this->nodes = $nodes;
	}

	public function loadNodes() {
		$result = $this->dao->loadNodes();

		$this->nodes = $result['Nodes'];
	}

	public function loadNodesByParentStepId($parentStepId) {
		$result = $this->dao->loadNodesByParentStepId($this->$parentStepId);

		$this->nodes = $result['Nodes'];
	}

	public function updateKey($key) {
		$this->dao->updateKey($this->node, $key);
	}

	public function updateParentStepId($parentStepId) {
		$this->dao->updateParentStepId($this->node, $parentStepId);
	}
}

?>