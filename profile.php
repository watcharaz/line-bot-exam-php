<?php


$access_token = 'qHeas1kVDNRSBK0gHl3s8osjuqLp04RULKx8OK3/t1KXjrL0hVBl/OyYAUC2x0hTB4gpBG10FJFyV1GkFKf+45pXJURIwDAYlhG0L0maQttMyC7ypENzqNGskBbRs2k1J0SN5KTIFxRDRxTxFlKfwwdB04t89/1O/w1cDnyilFU=
';

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

