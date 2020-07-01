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

    private $templating;

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
    public function __construct(Swift_Mailer $mailer,LoggerInterface $logger,\Twig_Environment $templating)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
        $this->templating = $templating;
    }

    public function __invoke(MailNotification $message)
    { 
       $content = $message->getContent();  
       $condition = json_decode($content);
       $url = $condition->formurl;
       $nomprojet = $condition->nomprojet;
       $conditions = $condition->conditions;
        $mail = (new \Swift_Message('Mise a jour'))
        ->setFrom('niveco13380@gmail.com')
        ->setTo($message->getUserMail())
        ->setBody( $this->templating->render(

            'emails/workflow.html.twig',
            ['url' => $url,
             'condition' => $conditions,
             'nom' => $message->getUserMail(),
             'nomprojet' => $nomprojet
            ]
        ),
        'text/html'
        )
    ;

    $this->mailer->send($mail);
    
    $this->logger->info($url);
    

    }
}
