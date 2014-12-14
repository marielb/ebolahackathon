<?php

require('MySql_Connector.php'); 

class Node_DAO {

	$db;

	public function __construct() {
		$db = new MySql_Connector();
	}

	public function loadNodes() {
		$sql = "SELECT * FROM tblNode";

		$this->db->query($sql);
	}

	public function loadNodesByParentStepId($parentStepId) {
		$sql = "SELECT *
			FROM tblNode
			WHERE ParentStepID = ?";

		$sql->bind_param("i", $parentStepId);

		$this->db->query($sql);
	}
 
	public function updateKey($node, $key) {
		$sql = "UPDATE tblNode
			SET Key = ?
			WHERE NodeID = ?";

		$sql->bind_param("si", $key, $node);

		$this->db->query($sql);
	}

	public function updateParentStepId($node, $parentStepId) {
		$sql = "UPDATE tblNode
			SET ParentStepID = ?
			WHERE NodeID = ?";

		$sql->bind_param("ii", $parentStepId, $node);

		$this->db->query($sql);
	}
}

?>