<?php
// api/src/Controller/CreateBookPublication.php

namespace App\Controller;

use App\Entity\Message;

class MessageData
{


    public function __invoke(Message $data): Message
    {
        return ['your custom answer'];
    }
}