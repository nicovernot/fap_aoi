<?php


namespace App\Message;

class MailNotification
{
    private $content;

    private $usermail;

    public function __construct(string $content,string $usermail)
    {
        $this->content = $content;
        $this->usermail = $usermail;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getUserMail(): string
    {
        return $this->usermail;
    }
}