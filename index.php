<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'SBVUX5KIDBH71NagmsyC/e5hSFedMITHLHrONAxXjUDmNOykJjG5C+vvctnaLd4uhvmRIAzD5uLqJmE3AU1x1NUoT7NK1PcucmdtXWYFgRzAes+lB367xc+ZnfyOAn7AF2PjXpcjVe2Ewwp9Nu/nswdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
    // Loop through each event
    foreach ($events['events'] as $event) {
        // Reply only when message sent is in 'text' format
        if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
            // Get text sent
            $text = $event['source']['userId'];
            // Get replyToken
            $replyToken = $event['replyToken'];

            if($event['message']['text'] == 'ok'){
                $ms = 'ok' . $text;
            }else{
                $ms = 'no' . $text;
            }

            $access_token = 'SBVUX5KIDBH71NagmsyC/e5hSFedMITHLHrONAxXjUDmNOykJjG5C+vvctnaLd4uhvmRIAzD5uLqJmE3AU1x1NUoT7NK1PcucmdtXWYFgRzAes+lB367xc+ZnfyOAn7AF2PjXpcjVe2Ewwp9Nu/nswdB04t89/1O/w1cDnyilFU=';
            $channelSecret = 'e97b555217c97f5889d0bfd50c6f049e';
            $idPush = $text;
            $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
            $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
            $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($ms);
            $response = $bot->pushMessage($idPush, $textMessageBuilder);

            echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
        }
    }
}
echo "OK";
