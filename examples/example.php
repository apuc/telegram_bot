<?php

require __DIR__ . '/../vendor/autoload.php';

use kavalar\BotNotificationTemplateProcessor;
use kavalar\TelegramBotService;

$token;
$chat_id;
$message;

$bot = new TelegramBotService($token);

$templates = [
    'example' => "Hello ~name~"
];
$attributes = [
    'name' => 'Jhon'
];
/// Used custom templates
$templateProcessor = new BotNotificationTemplateProcessor($templates);
$message = $templateProcessor->renderTemplate('example', $attributes);

$result = $bot->sendMessageTo($chat_id, $message);

