<?php
   $accessToken = "Xz5YorliDxlUasYbtcV1PG8hNQh6Ce4KGTWNUkwAdCEsSzfRaa/g2CdtQuGrmkSSwxAFKRni8LxMoM+8vufU1aT0tJswTReq3FfVi8pp+5NduiLAhZUHuS2/yF1A6ZEZ6KJKRxdFeFvad6XmTfwYHgdB04t89/1O/w1cDnyilFU=";//copy ข้อความ Channel access token ตอนที่ตั้งค่า
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
   //รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   $id = 'Ud34e97f0f96077eadfe7f2d339f87266';

     
          $arrayPostData['to'] = 'Ud34e97f0f96077eadfe7f2d339f87266';
          $arrPostData['messages'][0]['type'] = "text";
          $arrPostData['messages'][0]['text'] = "สวัสดี เราคือแชทบอทที่ช่วยในการดูแลงานระหว่างเจ้าของรถที่มีรถหลายๆคน กับเหล่าคนขับรถที่เจ้าของรถจ้างมา และดูแลในส่วนของการบันทึกการทำงานระหว่างผู้จ้างที่มาจ้างคนเจ้าของรถอีกด้วย";
          $arrPostData['messages'][1]['type'] = "sticker";
          $arrPostData['messages'][1]['packageId'] = "11537";
          $arrPostData['messages'][1]['stickerId'] = "52002739";
          pushMsg($arrayHeader,$arrayPostData);
    
 
   function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }
   exit;
?>