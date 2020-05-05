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
use Github\Client;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

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

    /**
     * @Route("/github")
     */
    public function github() {
        $client = new \Github\Client();
       
        $commits = $client->api('repo')->commits()->all('nicovernot', 'fap_aoi', array('sha' => 'master'));
       $message = $commits[0]["commit"]["message"];
       $author = $commits[0]["commit"]["author"]["name"];
       dump($author) ;
       //'./update.sh'
       $process = new Process(['ls']);
$process->run();

// executes after the command finishes
if (!$process->isSuccessful()) {
    throw new ProcessFailedException($process);
}

echo $process->getOutput();
        return new response ( '<html><body>github: message envoyé</body></html>');
    }

}
