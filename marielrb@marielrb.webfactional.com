<?php

// header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

require('Services/Twilio.php'); 
require('Patient_Model.php'); 
require('Message_Model.php'); 
 
$account_sid = 'AC40a84246e6d9f4d28eec16f18ad6e860'; 
$auth_token = 'ed7cc923bfc6a33f31988c0712c76e4e'; 
$client = new Services_Twilio($account_sid, $auth_token);

// $name = $_REQUEST['Body'];
// $number = $_REQUEST['From'];

// if (!empty($name) && !empty($number)) {
// 	$patient = new Patient_Model($name, $number);
// 	$patient->addPatient();
// }

$mysqli = new MySql_Connector();

$message_model = new Message_Model($mysqli, '+14438513816', 'yo');
$message_model->logMessage();

$message = $message_model->getNextMessage('yo');

echo $message;

// $sms = $client->account->messages->sendMessage(
//     "443-568-3935", $number, $message
// );

// $patient = new Patient_Model('Test', '1');
// $patient->addPatient();

$mysqli->close();

?>
<!-- <Response>
    <Message><?= $message ?></Message>
</Response> -->