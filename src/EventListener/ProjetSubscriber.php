<?php

namespace App\EventListener;
 
use App\Entity\Projet;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use App\Message\MailNotification;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Serializer\SerializerInterface;

class ProjetSubscriber implements EventSubscriber
{

  
    public function __construct(LoggerInterface $logger,EntityManagerInterface $em,MessageBusInterface $bus,SerializerInterface $serializer)
    {
        $this->logger = $logger;
        $this->logger->info("construct projet event");
        $this->em = $em;
        $this->bus = $bus;
        $this->serializer = $serializer;
       
    }
    public function getSubscribedEvents()
    {
        return [
            Events::postPersist,
            Events::postUpdate,
        ];
    }
 
    public function postPersist(LifecycleEventArgs $args)
    {
        $this->updateQuantite($args);
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $this->updateProjet($args);
    }
    public function updateprojet(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        $uow = $this->em->getUnitOfWork();
        if ($entity instanceof Projet) {
        $changefield = $uow->getEntityChangeSet($entity);
         if (array_key_first($changefield) == 'place1')
         switch ($changefield['place1'][1]) {
            case "draft":
               
                $this->logger->info($entity->getTypeprojet());
                break;
            case "reviewed":
                $mess = json_encode(array('a' => "titre", 'b' => "body text"));
                $this->logger->info("bus ---> mail ");
                $this->bus->dispatch(new MailNotification($mess,'eno31o5qmu5yziu@pipedream.net'));   
                $this->logger->info($entity->getTypeprojet());
                break;
            case "fini":
                echo "i égal 2";
                break;
            case "rejected":
                echo "i égal 2";
                break;                
        }
           // $this->logger->info($changefield['place1'][0]."old value - new value ".$changefield['place1'][1]);
        }


       
    }
    
 
    public function updateQuantite(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        $entityManager = $args->getObjectManager();
        if ($entity instanceof Projet) {
        $tp = $entity->getTypeprojet();
        $placename = $entity->getPlace1();    
        $query = $this->em->createQuery(
            'SELECT p
            FROM App\Entity\Place p
            WHERE  p.typeprojet = :typeprojet
            AND p.nom = :place'
        );
        
        $query->setParameter('typeprojet', $tp);
        $query->setParameter('place', $placename);
        $messs1= $query->getResult();
        $jsonContent = $this->serializer->serialize($messs1, 'json');
        $mess = json_encode(array('a' => "titre", 'b' => "body text"));
        $this->logger->info("bus ---> mail ");
        $this->bus->dispatch(new MailNotification($mess,'eno31o5qmu5yziu@pipedream.net'));    
        }
       
        
    }
 
 }