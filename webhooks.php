<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$accessToken = "WrWkMADGqaenlmRb3r8aPworUiFfXqy831EdZS6avx7ixF1Nlvghn9Xv7Tby2TcmB4gpBG10FJFyV1GkFKf+45pXJURIwDAYlhG0L0maQtswVltqeQqm+MXr4rZA2DRnbD7f0hBfKMRSmz8S2ly6HwdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่

$content = file_get_contents('php://input');
$arrayJson = json_decode($content, true);

$arrayHeader = array();
$arrayHeader[] = "Content-Type: application/json";
$arrayHeader[] = "Authorization: Bearer {$accessToken}";

//รับข้อความจากผู้ใช้
$message = $arrayJson['events'][0]['message']['text'];

#ตัวอย่าง Message Type "Text"
if ($message == "สวัสดี") {
	$arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
	$arrayPostData['messages'][0]['type'] = "text";
	$arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
	replyMsg($arrayHeader, $arrayPostData);
}
#ตัวอย่าง Message Type "Sticker"
else if ($message == "ฝันดี") {
	$arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
	$arrayPostData['messages'][0]['type'] = "sticker";
	$arrayPostData['messages'][0]['packageId'] = "2";
	$arrayPostData['messages'][0]['stickerId'] = "46";
	replyMsg($arrayHeader, $arrayPostData);
}
#ตัวอย่าง Message Type "Sticker" เคลื่อไหว
else if ($message == "ดีครับ") {
	$arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
	$arrayPostData['messages'][0]['type'] = "sticker";
	$arrayPostData['messages'][0]['packageId'] = "11537";
	$arrayPostData['messages'][0]['stickerId'] = "52002734";
	replyMsg($arrayHeader, $arrayPostData);
}
#ตัวอย่าง Message Type "Image"
else if ($message == "รูปแมว") {
	$image_url = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
	$arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
	$arrayPostData['messages'][0]['type'] = "image";
	$arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
	$arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
	replyMsg($arrayHeader, $arrayPostData);
}
#ตัวอย่าง Message Type "Location"
else if ($message == "ตำแหน่งที่อยู่") {
	$arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
	$arrayPostData['messages'][0]['type'] = "location";
	$arrayPostData['messages'][0]['title'] = "หน้าโรงเรียน ธรรมมิสลาม ท่าอิฐ";
	$arrayPostData['messages'][0]['address'] = "13.896056,100.477781";
	$arrayPostData['messages'][0]['latitude'] = "13.896056";
	$arrayPostData['messages'][0]['longitude'] = "100.477781";
	replyMsg($arrayHeader, $arrayPostData);
}
#ตัวอย่าง Message Type "Text + Sticker ใน 1 ครั้ง"
else if ($message == "ลาก่อน") {
	$arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
	$arrayPostData['messages'][0]['type'] = "text";
	$arrayPostData['messages'][0]['text'] = "อย่าทิ้งกันไป";
	$arrayPostData['messages'][1]['type'] = "sticker";
	$arrayPostData['messages'][1]['packageId'] = "1";
	$arrayPostData['messages'][1]['stickerId'] = "131";
	replyMsg($arrayHeader, $arrayPostData);
}
#ตัวอย่าง Message นับเลข
else if ($message == "นับ 1-10"){
	for($i=1;$i<=10;$i++){
	  $arrayPostData['to'] = $id;
	  $arrayPostData['messages'][0]['type'] = "text";
	  $arrayPostData['messages'][0]['text'] = $i;
	  pushMsg($arrayHeader,$arrayPostData);
	}
}
#ตัวอย่าง Message Type "Video"
else if ($message == "vi"){
	$arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
	$arrayPostData['messages'][0]['type'] = "video";
	$arrayPostData['messages'][0]['originalContentUrl'] = "http://0.s3.envato.com/h264-video-previews/80fad324-9db4-11e3-bf3d-0050569255a8/490527.mp4";//ใส่ url ของ video ที่ต้องการส่ง
	$arrayPostData['messages'][0]['previewImageUrl'] = "images/BigBuckBunny.jpg";//ใส่รูป preview ของ video
	replyMsg($arrayHeader,$arrayPostData);
}
#ตัวอย่าง Message Type "Audio"
else if ($message == "au"){
	$arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
	$arrayPostData['messages'][0]['type'] = "Audio";
	$arrayPostData['messages'][0]['duration'] = "60000";
	$arrayPostData['messages'][0]['contentProvider'] = "http://transom.org/wp-content/uploads/2004/03/stereo_96kbps.mp3?_=6";//ใส่ url ของ video ที่ต้องการส่ง
	replyMsg($arrayHeader,$arrayPostData);
}
function replyMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
    }
exit;
?>
