<?php



require "vendor/autoload.php";

$access_token = 'WrWkMADGqaenlmRb3r8aPworUiFfXqy831EdZS6avx7ixF1Nlvghn9Xv7Tby2TcmB4gpBG10FJFyV1GkFKf+45pXJURIwDAYlhG0L0maQtswVltqeQqm+MXr4rZA2DRnbD7f0hBfKMRSmz8S2ly6HwdB04t89/1O/w1cDnyilFU=
';

$channelSecret = '6ab5f4a4cd846c7606048f9ca2313635';

$pushID = 'U7ef7a449f2a5c2057eacfc02ba2eb286';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







