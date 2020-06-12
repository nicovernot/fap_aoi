<?php

namespace App\Messenger\Serializer;

use App\Message\MailNotification;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Exception\MessageDecodingFailedException;
use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface;

class JsonSerializer implements SerializerInterface
{
    public function decode(array $encodedEnvelope): Envelope
    {
        $body = json_decode($encodedEnvelope['body'], true);

        if (!$body) {
            throw new MessageDecodingFailedException('The body is not a valid JSON.');
        }

        $type = $body['type'] ?? '';
        switch ($type) {
            case 'mailnotification':
                // Here, you can / should validate the structure of $body
                $message = new MailNotification($body['content'],$body['usermail']);
                break;

            default:
                throw new MessageDecodingFailedException("The type '$type' is not supported.");
        }

        return new Envelope($message);
    }

    public function encode(Envelope $envelope): array
    {
        $message = $envelope->getMessage();

        if ($message instanceof MailNotification) {
            return [
                'body' => json_encode([
                    'type' => 'mailnotification',
                    'content' => $message->getContent(),
                    'usermail' => $message->getUserMail(),
                ]),
                'headers' => [
                ],
            ];
        }
    }
}