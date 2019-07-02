<?php


namespace App\EventSubscriber;

use Psr\Log\LoggerInterface;
use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Abonnement;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class MagazineSubscriber implements EventSubscriberInterface
{
    private $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public static function getSubscribedEvents()
    {
       
        return [
            KernelEvents::VIEW => ['sendMail', EventPriorities::PRE_READ],
        ];
    }

    public function sendMail(GetResponseEvent $event)
    {
        $this->logger->info('not!');
        $Abonnement = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$Abonnement instanceof Abonnement || Request::METHOD_GET !== $method) {
          
            return;
        }



      //  $this->mailer->send($message);

      $this->logger->info('Yea, it totally works!');
    }
}