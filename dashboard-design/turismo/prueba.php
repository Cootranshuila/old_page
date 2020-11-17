<?php

// Require the bundled autoload file - the path may need to change
// based on where you downloaded and unzipped the SDK
require '../assets/twilio-php-master/Twilio/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC2f964dc4f8f97c7049b3c8fe986f6d49';
$token = '78b2b6745d1a35e6b2a10a9b1c53a570';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$client->messages->create(
    // the number you'd like to send the message to
    '+573123482021',
    array(
        // A Twilio phone number you purchased at twilio.com/console
        // 'from' => '+12055574302',
        // the body of the text message you'd like to send
        'body' => "Hola Leinercito!"
    )
);

?>