# Telegram Bot Service

Telegram Bot Service

# [TelegramBotService](https://github.com/apuc/telegram_bot/blob/master/src/TelegramBotService.php)

## Methods

### sendMessageTo($chat_id, $message)

Use this method to send message to given chat.

  ```php
  $bot = new TelegramBotService($token);
  $result = $bot->sendMessageTo($chat_id, $message);
  ```

# [BotNotificationTemplateProcessor](https://github.com/apuc/telegram_bot/blob/master/src/BotNotificationTemplateProcessor.php)

## Methods

### __construct($templates)

<i>$templates</i> is associative array such format

 ```php
    [
        'template_name' => "Hello ~name~"
    ];
 ```

Where `~name~` is parameter which could be rendered by `renderTemplate` method

`$templates` default value you can see
at [default_templates.php](https://github.com/apuc/telegram_bot/blob/master/src/default_templates.php)
<br>
<br>

### renderTemplate($template_name, $parameters)

Returns rendered template

`$args` is associative array such format

 ```php
[
    'name' => 'Jhon'
];
 ```

Throws [NoSuchAttributeException](https://github.com/apuc/telegram_bot/blob/master/src/exceptions/NoSuchAttributeException.php)
,
[NoSuchTemplateException](https://github.com/apuc/telegram_bot/blob/master/src/exceptions/NoSuchTemplateException.php),

# Example

  ```php
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
  $message = $templateProcessor->renderTemplate('interview_request', $attributes);

  $result = $bot->sendMessageTo($chat_id, $message);
  ```

Watch full example at [example.php](https://github.com/apuc/telegram_bot/blob/master/examples/example.php)
