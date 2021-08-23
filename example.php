<?php

require 'vendor/autoload.php';

use Ivanivanton\TelegramBot\TelegramBotService;

$token;
$chat_id;
$message;

$bot = new TelegramBotService($token);
$result = $bot->sendMessageTo($chat_id, $message);

