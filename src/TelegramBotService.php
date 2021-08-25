<?php

namespace kavalar;

use \TelegramBot\Api\BotApi;

/**
 * @author Ivaniv Anton
 * @version 1.0
 *
 * Telegram Bot Service using \TelegramBot\Api\BotApi
 * @see \TelegramBot\Api\BotApi
 */
class TelegramBotService
{
    protected $bot;

    /**
     * @param $token string Bot token
     */
    public function __construct($token)
    {
        $this->bot = new BotApi($token);
    }

    /**
     *
     * Use this method to send message to given chat.
     * On success, the sent \TelegramBot\Api\Types\Message is returned.
     *
     * @param $chat_id int Telegram chat id
     * @param $message string Message to send
     *
     * @throws Api\HttpException When chat is not found
     * @throws Api\Exception
     * @throws Api\InvalidArgumentException
     */
    public function sendMessageTo($chat_id, $message)
    {
        return $this->bot->sendMessage($chat_id, $message);
    }
}
