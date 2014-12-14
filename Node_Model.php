<?php

require('Node_DAO.php'); 

class Node_Model {

	$dao;

	$key;

	$node;

	$parentStepId;


	public function __construct($key, $parentStepId, $node) {
		$dao = new Node_DAO();

		$this->key = $key;
		$this->parentStepId = $parentStepId;
		$this->node = $node;
	}

	public function loadNodes() {
		$result = $this->dao->loadNodes();

		// $this->node = $result['Node'];
		// $this->parentStepId = $result['ParentStepId'];
		// $this->key = $result['Key'];
	}

	public function loadNodesByParentStepId($parentStepId) {
		$result = $this->dao->loadNodesByParentStepId($this->$parentStepId);

		// $this->node = $result['Node'];
		// $this->parentStepId = $result['ParentStepId'];
		// $this->key = $result['Key'];
	}

	public function updateKey($key) {
		$this->dao->updateKey($this->node, $key);
	}

	public function updateParentStepId($parentStepId) {
		$this->dao->updateParentStepId($this->node, $parentStepId);
	}
}

?>