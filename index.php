<?php

header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

require_once('Services/Twilio.php'); 
require_once('Patient_Model.php'); 
require_once('Message_Model.php'); 
require_once('MySql_Connector.php'); 
require_once('TwilioAuth.php'); 

$twilio = new TwilioAuth();

$text = $_REQUEST['Body'];
$number = $_REQUEST['From'];

// $text = "16";
// $number = "+14438513816";

$message = 'Please provide a valid number';

if (!empty($text) && !empty($number)) {
	$mysqli = new MySql_Connector();

	$message_model = new Message_Model($mysqli, $number, $text);

	$message = $message_model->getNextMessage();
	$mysqli->close();
}

// echo $message;



?>
<Response>
    <Message><?= $message ?></Message>
</Response>
