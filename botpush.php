<?php



require "vendor/autoload.php";

$access_token = 'qHeas1kVDNRSBK0gHl3s8osjuqLp04RULKx8OK3/t1KXjrL0hVBl/OyYAUC2x0hTB4gpBG10FJFyV1GkFKf+45pXJURIwDAYlhG0L0maQttMyC7ypENzqNGskBbRs2k1J0SN5KTIFxRDRxTxFlKfwwdB04t89/1O/w1cDnyilFU=
';

$channelSecret = '6ab5f4a4cd846c7606048f9ca2313635';

$pushID = 'U7ef7a449f2a5c2057eacfc02ba2eb286';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







