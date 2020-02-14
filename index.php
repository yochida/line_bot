<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = '3gRRrihoNlySOopovVwKXAqLMkHzXzslmg98EjkB1On4rvQ98mzJ4KQba60NVYcFX6YPDcFjByaKpiGNEspEJ2Dqm/KBtqi0Gl/LLAN0ILDerkzEGqwKEuhvEXh5lGqjQxiEKor9Ic+uumDquN/jWwdB04t89/1O/w1cDnyilFU=';

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

            // Build message to reply back
            $messages = [
                'type' => 'text',
                'text' => $text
            ];

            // Make a POST Request to Messaging API to reply to sender
            $url = 'https://api.line.me/v2/bot/message/reply';
            $data = [
                'replyToken' => $replyToken,
                'messages' => [$messages],
            ];

            $post = json_encode($data);
            $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $result = curl_exec($ch);
            curl_close($ch);

            require "vendor/autoload.php";
            $access_token = '3gRRrihoNlySOopovVwKXAqLMkHzXzslmg98EjkB1On4rvQ98mzJ4KQba60NVYcFX6YPDcFjByaKpiGNEspEJ2Dqm/KBtqi0Gl/LLAN0ILDerkzEGqwKEuhvEXh5lGqjQxiEKor9Ic+uumDquN/jWwdB04t89/1O/w1cDnyilFU=';
            $channelSecret = 'e97b555217c97f5889d0bfd50c6f049e';
            $idPush = $messages;
            $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
            $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
            $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
            $response = $bot->pushMessage($idPush, $textMessageBuilder);

            echo $result . "\r\n";
        }
    }
}
echo "OK";
