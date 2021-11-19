<?php
 
$strAccessToken = "Xz5YorliDxlUasYbtcV1PG8hNQh6Ce4KGTWNUkwAdCEsSzfRaa/g2CdtQuGrmkSSwxAFKRni8LxMoM+8vufU1aT0tJswTReq3FfVi8pp+5NduiLAhZUHuS2/yF1A6ZEZ6KJKRxdFeFvad6XmTfwYHgdB04t89/1O/w1cDnyilFU=";
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
if($arrJson['events'][0]['message']['text'] == "ไอดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
}else if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดี เราคือแชทบอทที่ช่วยในการดูแลงานระหว่างเจ้าของรถที่มีรถหลายๆคน กับเหล่าคนขับรถที่เจ้าของรถจ้างมา และดูแลในส่วนของการบันทึกการทำงานระหว่างผู้จ้างที่มาจ้างคนเจ้าของรถอีกด้วย";
  $arrPostData['messages'][1]['type'] = "sticker";
  $arrPostData['messages'][1]['packageId'] = "11537";
  $arrPostData['messages'][1]['stickerId'] = "52002739";
}else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันสามารถจ่ายงานให้แก่คนขับรถเป็นรายคน สามารถบันทึกการทำงาน เก็บข้อมูลเป็นสถิติ รายงาน และฉันยังสามารถแจ้งประวัติการทำงานต่อผู้ที่มาจ้างคุณเจ้าของรถอีกด้วย (เฉพาะงานที่ตัวเองจ้างเท่านั้นนะ)";
  $arrPostData['messages'][1]['type'] = "sticker";
  $arrPostData['messages'][1]['packageId'] = "11537";
  $arrPostData['messages'][1]['stickerId'] = "52002734";
}else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "sticker";
  $arrPostData['messages'][0]['packageId'] = "11537";
  $arrPostData['messages'][0]['stickerId'] = "52002744";

}
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
?>