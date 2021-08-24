<?php

require 'vendor/autoload.php';

use kavalar\TelegramBotService;

$token;
$chat_id;
$message;

$bot = new TelegramBotService($token);
$result = $bot->sendMessageTo($chat_id, $message);

