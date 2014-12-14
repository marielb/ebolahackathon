<?php

require_once('Message_Model.php'); 

$message = new Message_Model();

echo $message->getAllAlerts();
?>