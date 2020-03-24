<?php

// src/Controller/MailerController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Message\MailNotification;
use Symfony\Component\Messenger\MessageBusInterface;

class MailerController extends AbstractController
{
    /**
     * @Route("/email")
     */
    public function index(MessageBusInterface $bus)
    { 
    
    $bus->dispatch(new MailNotification('Look! I created a message!'));    
    
    return new Response(
        '<html><body>Lucky number: message envoyé</body></html>'
    );
    }

    /**
     * @Route("/mail")
     */
    public function mail(\Swift_Mailer $mailer)
    { 
    
     
        $mail = (new \Swift_Message('Hello Email'))
        ->setFrom('niveco13380@gmail.com')
        ->setTo('nicovernot@gmail.com')
        ->setBody('You should see me from the profiler!')
    ;

    $mailer->send($mail);
    
    return new Response(
        '<html><body>Lucky number: message envoyé</body></html>'
    );
    }


}
