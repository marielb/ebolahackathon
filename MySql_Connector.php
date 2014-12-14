<?php

class MySql_Connector {

	public function query($statement) {
		mysqli_connect("marielrb.webfactional.com", "marielrb_ebola", "043908mb");
		mysqli_select_db("ebolapatientlog") or die("Unable to select database");

		$result = mysql_query($sql);

		mysqli_close();

		return $result;
	}

	public function queryToArray($statement) {
		mysqli_connect("marielrb.webfactional.com", "marielrb_ebola", "043908mb");
		mysqli_select_db("ebolapatientlog") or die("Unable to select database");

		$result = mysql_query($sql);
		$resultToArray = mysql_fetch_array($result);

    $statement->execute();
    $statement->close();

		mysqli_close();

		return $resultToArray;
	}
}

?>