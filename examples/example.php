<?php

require __DIR__.'/../vendor/autoload.php';

use kavalar\BotNotificationTemplateProcessor;
use kavalar\TelegramBotService;

$token;
$chat_id;
$message;

$attributes = [
    'phone' => "83134131",
    'email' => "jhon@example.com",
    'comment' => "jhon@example.com",
    'profile_id' => '1'
];

$bot = new TelegramBotService($token);

/// Used default templates
$templateProcessor = new BotNotificationTemplateProcessor();
$message = $templateProcessor->renderTemplate('interview_request', $attributes);

$result = $bot->sendMessageTo($chat_id, $message);

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

