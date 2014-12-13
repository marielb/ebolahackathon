<?php

class MySql_Connector {

	public function query($sql) {
		mysql_connect("marielrb.webfactional.com", "marielrb_ebola", "043908mb");
		mysql_select_db("ebolapatientlog") or die("Unable to select database");

		$result = mysql_query($sql);

		mysql_close();

		return $result;
	}

	public function queryToArray($sql) {
		mysql_connect("marielrb.webfactional.com", "marielrb_ebola", "043908mb");
		mysql_select_db("ebolapatientlog") or die("Unable to select database");

		$result = mysql_query($sql);
		$resultToArray = mysql_fetch_array($result);

		mysql_close();

		return $resultToArray;
	}
}

?>