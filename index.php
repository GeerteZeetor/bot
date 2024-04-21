<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors',1);
ini_set('display_startup_errors',1);

define('TG_TOKEN', '6826070598:AAFK2yMz25-adUjDzEMerrKM90gcc6yJI1k');
define('TG_CHAT_ID', '-4129053303');

$textMessage = 'Test message';
$textMessage = urlencode($textMessage);

//$getQuery = array(
//    "chat_id" 	=> TG_CHAT_ID,
//    "text"  	=> "Test access",
//    "parse_mode" => "html",
//);

//https://api.telegram.org/bot6826070598:AAFK2yMz25-adUjDzEMerrKM90gcc6yJI1k/getUpdates
//https://api.telegram.org/bot6826070598:AAFK2yMz25-adUjDzEMerrKM90gcc6yJI1k/setWebhook?url=https://tg-bot-ma.dev.ru/index.php

$getQuery = array(
    "url" 	=> 'https://tg-bot-ma.dev.ru/index.php',
);

//$arrayQuery = [
//    "certificate" => curl_file_create(__DIR__ . 'tg-bot-ma.dev.ru.pem')
//];

$ch = curl_init("https://api.telegram.org/bot". TG_TOKEN ."/setWebhook?" . http_build_query($getQuery));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);

$resultQuery = curl_exec($ch);
curl_close($ch);

$resultQuery = json_decode($resultQuery, true);

//echo '<pre>';
//print_r(http_build_query($getQuery));
//echo '</pre>';
echo '<pre>';
print_r($resultQuery);
echo '</pre>';

die();