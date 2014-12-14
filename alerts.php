<?php

require_once('Message_Model.php'); 

$mysqli = new MySql_Connector();

$message = new Message_Model($mysqli, "", "");

echo $message->getAllAlerts();

$mysqli->close();

?>