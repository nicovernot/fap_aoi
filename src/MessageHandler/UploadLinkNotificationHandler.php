<?php

// src/MessageHandler/SmsNotificationHandler.php
namespace App\MessageHandler;
use Psr\Log\LoggerInterface;
use App\Message\UploadLinkNotification;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

 /**
 * Class MailNotificationHandler
 */
class UploadLinkNotificationHandler implements MessageHandlerInterface
{



    
     /**
     * @var LoggerInterface
     */
    protected $logger;
    /**
     * UploadlinkNotificationHandler constructor.
     *
     */
    public function __construct(LoggerInterface $logger)
    {

        $this->logger = $logger;
    }

    public function __invoke(UploadLinkNotification $message)
    { 
       $content = $message->getContent();  
       
    
    $this->logger->info($content);
  //  $this->logger->error('An error occurred');

    }
}
