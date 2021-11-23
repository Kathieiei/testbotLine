<?php
// Access Token
$access_token = 'Xz5YorliDxlUasYbtcV1PG8hNQh6Ce4KGTWNUkwAdCEsSzfRaa/g2CdtQuGrmkSSwxAFKRni8LxMoM+8vufU1aT0tJswTReq3FfVi8pp+5NduiLAhZUHuS2/yF1A6ZEZ6KJKRxdFeFvad6XmTfwYHgdB04t89/1O/w1cDnyilFU=';
// User ID
$userId = 'Ud34e97f0f96077eadfe7f2d339f87266';
// ข้อความที่ต้องการส่ง
$messages = array(
    'type' => 'text',
    'text' => 'ทดสอบการส่งข้อความ',
);
$post = json_encode(array(
    'to' => array($userId),
    'messages' => array($messages),
));
// URL ของบริการ Replies สำหรับการตอบกลับด้วยข้อความอัตโนมัติ
$url = 'https://api.line.me/v2/bot/message/multicast';
$headers = array('Content-Type: application/json', 'Authorization: Bearer '.$access_token);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
echo $result;

?>