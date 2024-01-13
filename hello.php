// Send an SMS using Twilio's REST API and PHP
<?php
// Required if your environment does not handle autoloading
require __DIR__ . '/twilio-php-app\vendor\autoload.php';

// Your Account SID and Auth Token from console.twilio.com
$sid = "AC2e9425daadf393c37c936f1f6c42a94c";
$token = "fd50d112ac64a08dafa486353461035d";
$client = new Twilio\Rest\Client($sid, $token);

// Use the Client to make requests to the Twilio REST API
$client->messages->create(
    // The number you'd like to send the message to
    '+918830573512',
    [
        // A Twilio phone number you purchased at https://console.twilio.com
        'from' =>'+19377876028',
        // The body of the text message you'd like to send
        'body' => "Hey bhaskar! Good luck on the bar exam!"
    ]
);