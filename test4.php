<?php
// Access Token
$access_token = 'Xz5YorliDxlUasYbtcV1PG8hNQh6Ce4KGTWNUkwAdCEsSzfRaa/g2CdtQuGrmkSSwxAFKRni8LxMoM+8vufU1aT0tJswTReq3FfVi8pp+5NduiLAhZUHuS2/yF1A6ZEZ6KJKRxdFeFvad6XmTfwYHgdB04t89/1O/w1cDnyilFU=';

// ดาต้าเบส
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rondingt";
$mysql = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($mysql, "utf8");

if ($mysql->connect_error){
$errorcode = $mysql->connect_error;
print("MySQL(Connection)> ".$errorcode);
}
$getUser = $mysql->query("SELECT * worktod");

while(
    $row = $getUser->fetch_assoc()){
    $name_w = $row['name_w'];
    $name_d = $row['name_d'];
  }
// User ID
$userId = 'Ud34e97f0f96077eadfe7f2d339f87266';
// ข้อความที่ต้องการส่ง
$messages = array(
    'type' => 'text',
    'text' => $name_w,
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