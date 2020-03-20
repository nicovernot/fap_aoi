<?php

// src/Controller/MailerController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class MailerController extends AbstractController
{
    /**
     * @Route("/email")
     */
    public function index( \Swift_Mailer $mailer)
    { $message = (new \Swift_Message('Hello Email'))
        ->setFrom('niveco13380@gmail.com')
        ->setTo('nicovernot@gmail.com')
        ->setBody('You should see me from the profiler!')
    ;

    $mailer->send($message);
    
    return new Response(
        '<html><body>Lucky number: message envoyé</body></html>'
    );
    }
}
