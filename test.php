<?php


$API_URL = 'https://api.line.me/v2/bot/message';
$API_URL = 'https://api.line.me/v2/bot/message/push';

$ACCESS_TOKEN = 'Xz5YorliDxlUasYbtcV1PG8hNQh6Ce4KGTWNUkwAdCEsSzfRaa/g2CdtQuGrmkSSwxAFKRni8LxMoM+8vufU1aT0tJswTReq3FfVi8pp+5NduiLAhZUHuS2/yF1A6ZEZ6KJKRxdFeFvad6XmTfwYHgdB04t89/1O/w1cDnyilFU='; 
$channelSecret = '8e4788f8f2b0a590fe809041521f1bf6';


$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array



// if ( sizeof($request_array['events']) > 0 ) {

//     foreach ($request_array['events'] as $event) {

//         $reply_message = '';
//         $reply_token = $event['replyToken'];


//         $data = [
//             'replyToken' => $reply_token,
//             'messages' => [['type' => 'text', 'text' => json_encode($request_array)]]
//         ];
//         $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);

//         $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);

//         echo "Result: ".$send_result."\r\n";
        
//     }
// }

if ( sizeof($request_array['events']) > 0 ) {
    foreach ($request_array['events'] as $event) {
       
       $reply_message = '';
       $reply_token = $event['replyToken'];
       $text = $event['message']['text'];

       $data = [
          'replyToken' => $reply_token,
          'messages' => [['type' => 'text', 'text' => $text ]]
       ];
       $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
       $send_result = send_reply_message($API_URL.'/reply',      $POST_HEADER, $post_body);
       echo "Result: ".$send_result."\r\n";
     }
 }
 

echo "OK";




function send_reply_message($url, $post_header, $post_body)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}

?>