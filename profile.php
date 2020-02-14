<?php


$access_token = '3gRRrihoNlySOopovVwKXAqLMkHzXzslmg98EjkB1On4rvQ98mzJ4KQba60NVYcFX6YPDcFjByaKpiGNEspEJ2Dqm/KBtqi0Gl/LLAN0ILDerkzEGqwKEuhvEXh5lGqjQxiEKor9Ic+uumDquN/jWwdB04t89/1O/w1cDnyilFU=';

$userId = 'U63bbf7731b27ebbf1d53404939413984';

$url = 'https://api.line.me/R/ti/p/%40970pyzql/bot/profile/'.$userId;

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

