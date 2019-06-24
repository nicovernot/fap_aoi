<?php


namespace App\EventSubscriber;

use Psr\Log\LoggerInterface;
use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Magazine;
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
            KernelEvents::VIEW => ['sendMail', EventPriorities::PRE_DESERIALIZE],
        ];
    }

    public function sendMail(GetResponseEvent $event)
    {
        $this->logger->info('not!');
        $Magazine = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$Magazine instanceof Magazine || Request::METHOD_GET !== $method) {
          
            return;
        }

       // $message = (new \Swift_Message('A new book has been added'))
       //     ->setFrom('system@example.com')
       //     ->setTo('contact@les-tilleuls.coop')
      //      ->setBody(sprintf('The book #%d has been added.', $book->getId()));

      //  $this->mailer->send($message);
 var_dump('test');
      $this->logger->info('Yea, it totally works!');
    }
}