<?php


namespace App\Message;

class UploadLinkNotification
{


    private $content;

    private $subject;

    private $path;

    public function __construct(string $content,string $subject,string $path)
    {
        $this->content = $content;
        $this->subject = $subject;
        $this->path = $path;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getPath(): string
    {
        return $this->path;
    }
}