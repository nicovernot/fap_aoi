<?php

// src/Message/SmsNotification.php
namespace App\Message;

class MailNotification
{
    private $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}