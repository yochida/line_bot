<?php



require "vendor/autoload.php";

$access_token = '3gRRrihoNlySOopovVwKXAqLMkHzXzslmg98EjkB1On4rvQ98mzJ4KQba60NVYcFX6YPDcFjByaKpiGNEspEJ2Dqm/KBtqi0Gl/LLAN0ILDerkzEGqwKEuhvEXh5lGqjQxiEKor9Ic+uumDquN/jWwdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'e97b555217c97f5889d0bfd50c6f049e';

$pushID = 'U63bbf7731b27ebbf1d53404939413984';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







