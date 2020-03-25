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
use ivkos\Pushbullet;
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
     * @Route("/push")
     */
    public function mail()
    { 
    
        $pb = new \Pushbullet\Pushbullet('o.BwhuAhQrjZo1GmR6yKThEiCOLbvvsCYT');
       $devices = $pb->getDevices();
       $pb->device("Motorola Moto G (5)")->sendSms("+33680263596", "Hello there!");
    return new Response(
        '<html><body>Lucky number: message envoyé</body></html>'
    );
    }


}
