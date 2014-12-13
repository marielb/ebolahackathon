<?php

header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

require('Services/Twilio.php'); 
 
$account_sid = 'AC40a84246e6d9f4d28eec16f18ad6e860'; 
$auth_token = 'ed7cc923bfc6a33f31988c0712c76e4e'; 
$client = new Services_Twilio($account_sid, $auth_token);

$number = "443-851-3816";

$name = 'Mariel';

// $sms = $client->account->messages->sendMessage(
//     "443-568-3935", $number, "Sup"
// );

?>

<Response>
    <Message>Hello, <?= $name ?>!</Message>
</Response>