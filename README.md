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


### renderTemplate($template_name, $parameters)

Returns rendered template

`$args` is associative array such format

 ```php
[
    'name' => 'Jhon'
];
 ```

Throws [NoSuchParameterException](https://github.com/apuc/telegram_bot/blob/master/src/exceptions/NoSuchParameterException.php),
[NoSuchTemplateException](https://github.com/apuc/telegram_bot/blob/master/src/exceptions/NoSuchTemplateException.php),

# Example

  ```php

  $bot = new TelegramBotService($token);

  $templates = [
      'example' => "Hello ~name~"
  ];
  $attributes = [
      'name' => 'Jhon'
  ];
  
  $templateProcessor = new BotNotificationTemplateProcessor($templates);
  $message = $templateProcessor->renderTemplate('example', $attributes);

  $result = $bot->sendMessageTo($chat_id, $message);
  ```

Watch full example at [example.php](https://github.com/apuc/telegram_bot/blob/master/examples/example.php)
