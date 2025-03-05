<?php

namespace kibalanga\Twilio;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './config/app.php';

require_once '../vendor/autoload.php';
use Twilio\Rest\Client;

class Twilio
{
    public static function send($number, $message) 
    {
        $sid    = TWILIO_SID;
        $token  = TWILIO_TOKEN;
        $twilio = new Client($sid, $token);
      
        $message = $twilio->messages->create($number,//"+255778760701", // to
            array(
              "from" => TWILIO_NUMBER,
              "body" => $message
            )
        );
        $message_id = $message->id;

        if ($message_id) {
            return ['status' => 'success', 'message' => 'message sent successful!', 'message_id' => $message_id];
        } else {
            return ['status' => 'error', 'message' => 'message not sent'];
        }
    }
}