<?php

namespace App\Messenger\Serializer;

use Psr\Log\LoggerInterface;
use App\Message\MailNotification;
use App\Message\UploadLinkNotification;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Exception\MessageDecodingFailedException;
use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface;

class JsonSerializer implements SerializerInterface
{

    public function __construct(LoggerInterface $logger)
    {

        $this->logger = $logger;
    }
    public function decode(array $encodedEnvelope): Envelope
    {
        $body = json_decode($encodedEnvelope['body'], true);
        $this->logger->info($body['type']); 
        if (!$body) {
            throw new MessageDecodingFailedException('The body is not a valid JSON.');
        }

        $type = $body['type'] ?? '';
        switch ($type) {
            case 'mailnotification':
                // Here, you can / should validate the structure of $body
                $message = new MailNotification($body['content'],$body['usermail']);
                break;
            case 'uploadlinknotification':
                    // Here, you can / should validate the structure of $body
                    $message = new UploadLinkNotification($body['content'],$body['subject'],$body['path']);
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


        if ($message instanceof UploadLinkNotification) {
            return [
                'body' => json_encode([
                    'type' => 'uploadlinknotification',
                    'content' => $message->getContent(),
                    'subject' => $message->getSubject(),
                    'path' => $message->getPath(),
                ]),
                'headers' => [
                ],
            ];
        }

    }
}