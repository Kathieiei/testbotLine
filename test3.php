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
        "hero": {
          "type": "image",
          "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_5_carousel.png",
          "size": "full",
          "aspectRatio": "20:13",
          "aspectMode": "cover"
        },
        "body": {
          "type": "box",
          "layout": "vertical",
          "spacing": "sm",
          "contents": [
            {
              "type": "text",
              "text": "Arm Chair, White",
              "size": "xl",
              "weight": "bold",
              "wrap": true
            },
            {
              "type": "box",
              "layout": "baseline",
              "contents": [
                {
                  "type": "text",
                  "text": "$49",
                  "flex": 0,
                  "size": "xl",
                  "weight": "bold",
                  "wrap": true
                },
                {
                  "type": "text",
                  "text": ".99",
                  "flex": 0,
                  "size": "sm",
                  "weight": "bold",
                  "wrap": true
                }
              ]
            }
          ]
        },
        "footer": {
          "type": "box",
          "layout": "vertical",
          "spacing": "sm",
          "contents": [
            {
              "type": "button",
              "action": {
                "type": "uri",
                "label": "Add to Cart",
                "uri": "https://linecorp.com"
              },
              "style": "primary"
            },
            {
              "type": "button",
              "action": {
                "type": "uri",
                "label": "Add to whishlist",
                "uri": "https://linecorp.com"
              }
            }
          ]
        }
      },
      {
        "type": "bubble",
        "hero": {
          "type": "image",
          "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_6_carousel.png",
          "size": "full",
          "aspectRatio": "20:13",
          "aspectMode": "cover"
        },
        "body": {
          "type": "box",
          "layout": "vertical",
          "spacing": "sm",
          "contents": [
            {
              "type": "text",
              "text": "Metal Desk Lamp",
              "size": "xl",
              "weight": "bold",
              "wrap": true
            },
            {
              "type": "box",
              "layout": "baseline",
              "flex": 1,
              "contents": [
                {
                  "type": "text",
                  "text": "$11",
                  "flex": 0,
                  "size": "xl",
                  "weight": "bold",
                  "wrap": true
                },
                {
                  "type": "text",
                  "text": ".99",
                  "flex": 0,
                  "size": "sm",
                  "weight": "bold",
                  "wrap": true
                }
              ]
            },
            {
              "type": "text",
              "text": "Temporarily out of stock",
              "flex": 0,
              "margin": "md",
              "size": "xxs",
              "color": "#FF5551",
              "wrap": true
            }
          ]
        },
        "footer": {
          "type": "box",
          "layout": "vertical",
          "spacing": "sm",
          "contents": [
            {
              "type": "button",
              "action": {
                "type": "uri",
                "label": "Add to Cart",
                "uri": "https://linecorp.com"
              },
              "flex": 2,
              "color": "#AAAAAA",
              "style": "primary"
            },
            {
              "type": "button",
              "action": {
                "type": "uri",
                "label": "Add to wish list",
                "uri": "https://linecorp.com"
              }
            }
          ]
        }
      },
      {
        "type": "bubble",
        "body": {
          "type": "box",
          "layout": "vertical",
          "spacing": "sm",
          "contents": [
            {
              "type": "button",
              "action": {
                "type": "uri",
                "label": "See more",
                "uri": "https://linecorp.com"
              },
              "flex": 1,
              "gravity": "center"
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
    'messages' => [$flexDataJsonDeCode],
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