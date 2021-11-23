<?php
// Access Token
$access_token = 'Xz5YorliDxlUasYbtcV1PG8hNQh6Ce4KGTWNUkwAdCEsSzfRaa/g2CdtQuGrmkSSwxAFKRni8LxMoM+8vufU1aT0tJswTReq3FfVi8pp+5NduiLAhZUHuS2/yF1A6ZEZ6KJKRxdFeFvad6XmTfwYHgdB04t89/1O/w1cDnyilFU=';
// User ID
$userId = 'Ud34e97f0f96077eadfe7f2d339f87266';


$flexDataJson = '{
  "type": "flex",
  "altText": "Flex Message",
  "contents": {
    "type": "carousel",
    "contents": [
      {
        "type": "bubble",
        "direction": "ltr",
        "body": {
          "type": "box",
          "layout": "vertical",
          "spacing": "md",
          "action": {
            "type": "uri",
            "label": "Action",
            "uri": "https://linecorp.com"
          },
          "contents": [
            {
              "type": "text",
              "text": "มีงานใหม่เข้า",
              "weight": "bold",
              "size": "3xl",
              "contents": []
            },
            {
              "type": "text",
              "text": "กรุณาอ่านรายละเอียดเพิ่มเติม",
              "size": "lg",
              "wrap": true,
              "contents": [
                {
                  "type": "span",
                  "text": "กรุณาอ่านรายละเอียดเพิ่มเติม และกดเริ่มงาน"
                }
              ]
            },
            {
              "type": "separator"
            },
            {
              "type": "box",
              "layout": "vertical",
              "spacing": "sm",
              "contents": [
                {
                  "type": "spacer",
                  "size": "lg"
                },
                {
                  "type": "box",
                  "layout": "baseline",
                  "contents": [
                    {
                      "type": "text",
                      "text": "สถานที่ต้นทาง",
                      "weight": "bold",
                      "color": "#979797FF",
                      "margin": "sm",
                      "contents": []
                    },
                    {
                      "type": "text",
                      "text": "บางแพ",
                      "weight": "bold",
                      "color": "#00C04EFF",
                      "margin": "sm",
                      "contents": []
                    }
                  ]
                },
                {
                  "type": "box",
                  "layout": "baseline",
                  "contents": [
                    {
                      "type": "text",
                      "text": "สถานที่ปลายทาง",
                      "weight": "bold",
                      "color": "#979797FF",
                      "margin": "sm",
                      "contents": []
                    },
                    {
                      "type": "text",
                      "text": "จอมบึง",
                      "weight": "bold",
                      "color": "#00C04EFF",
                      "margin": "sm",
                      "contents": []
                    }
                  ]
                }
              ]
            },
            {
              "type": "box",
              "layout": "vertical",
              "contents": [
                {
                  "type": "spacer",
                  "size": "lg"
                },
                {
                  "type": "separator",
                  "color": "#ADADADFF"
                }
              ]
            },
            {
              "type": "box",
              "layout": "vertical",
              "spacing": "sm",
              "contents": [
                {
                  "type": "spacer",
                  "size": "lg"
                },
                {
                  "type": "box",
                  "layout": "baseline",
                  "contents": [
                    {
                      "type": "text",
                      "text": "30 เมษายน 2566",
                      "weight": "bold",
                      "size": "lg",
                      "color": "#353535FF",
                      "align": "center",
                      "margin": "sm",
                      "contents": []
                    }
                  ]
                }
              ]
            }
          ]
        },
        "footer": {
          "type": "box",
          "layout": "vertical",
          "contents": [
            {
              "type": "button",
              "action": {
                "type": "uri",
                "label": "ดูรายละเอียด",
                "uri": "https://linecorp.com"
              },
              "color": "#264653",
              "style": "primary"
            }
          ]
        }
      }
    ]
  }
}';

$flexDataJsonDeCode = json_decode($flexDataJson,true);

// ข้อความที่ต้องการส่ง
$messages = array(
    'type' => 'text',
    'text' => 'มีงานใหม่',
);
$post = json_encode(array(
    'to' => array($userId),
    'messages' => array($flexDataJsonDeCode),
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