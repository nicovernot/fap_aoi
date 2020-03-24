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
        
        $mail = (new \Swift_Message('Hello Email'))
        ->setFrom('niveco13380@gmail.com')
        ->setTo('nicovernot@gmail.com')
        ->setBody('You should see me from the profiler!')
    ;

    $this->mailer->send($mail);
    
    $this->logger->info('I just got the logger');
    $this->logger->error('An error occurred');

    }
}
