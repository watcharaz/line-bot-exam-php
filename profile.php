<?php


$access_token = 'WrWkMADGqaenlmRb3r8aPworUiFfXqy831EdZS6avx7ixF1Nlvghn9Xv7Tby2TcmB4gpBG10FJFyV1GkFKf+45pXJURIwDAYlhG0L0maQtswVltqeQqm+MXr4rZA2DRnbD7f0hBfKMRSmz8S2ly6HwdB04t89/1O/w1cDnyilFU=';

$userId = 'U3f3647f1af28b00a2a206fcc5fdd8808';

$url = 'https://api.line.me/v2/bot/profile/'.$userId;

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

