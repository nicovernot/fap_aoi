<?php

// src/MessageHandler/SmsNotificationHandler.php
namespace App\MessageHandler;
use Psr\Log\LoggerInterface;
use \Swift_Mailer;
use App\Message\MailNotification;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

 /**
 * Class MailNotificationHandler
 */
class MailNotificationHandler implements MessageHandlerInterface
{


    /**
     * @var Swift_Mailer
     */
    protected $mailer;
    
     /**
     * @var LoggerInterface
     */
    protected $logger;
    /**
     * MailNotificationHandler constructor.
     * @param \Swift_Mailer $mailer
    
     */
    public function __construct(Swift_Mailer $mailer,LoggerInterface $logger)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    public function __invoke(MailNotification $message)
    { 
       $content = $message->getContent();  
        $mail = (new \Swift_Message('Hello Email'))
        ->setFrom('niveco13380@gmail.com')
        ->setTo($message->getUserMail())
        ->setBody($content)
    ;
var_dump($message);
    $this->mailer->send($mail);
    
    $this->logger->info($content);
    $this->logger->error('An error occurred');

    }
}
