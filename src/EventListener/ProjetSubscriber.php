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
        $this->createProjet($args);
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
            $tp = $entity->getTypeprojet();
            $placename = $entity->getPlace1();    
            $user = $entity->getUser();   
            $useremail = $user->getEmail();
            $query = $this->em->createQuery(
                'SELECT p
                FROM App\Entity\Place p
                WHERE  p.typeprojet = :typeprojet
                AND p.nom = :place'
            );
            
            $query->setParameter('typeprojet', $tp);
            $query->setParameter('place', $placename);
            $messs1= $query->getResult();
            $conditions ['conditions'] = $messs1[0]->getConditions();
            $conditions['place']=$entity->getPlace1();
            $conditions['nomprojet']=$entity->getNom();
            $conditions['formurl'] = "https://form.jotform.com/201351467044347"; 
            $jsonContent = $this->serializer->serialize($conditions, 'json');
            $this->logger->info($jsonContent);
        $changefield = $uow->getEntityChangeSet($entity);
         if (array_key_first($changefield) == 'place1')
         switch ($changefield['place1'][1]) {
            case "draft":
                $this->logger->info("bus ---> mail ");
                $this->logger->info($jsonContent);
                $this->bus->dispatch(new MailNotification($jsonContent,$useremail));   ;
                break;
            case "reviewed":
                $this->logger->info("bus ---> mail ");
                $this->logger->info($jsonContent);
                $this->bus->dispatch(new MailNotification($jsonContent,$useremail));   
                break;
            case "fini":
                $this->logger->info("bus ---> mail ");
                $this->logger->info($jsonContent);
                $this->bus->dispatch(new MailNotification($jsonContent,$useremail));                 
                break;
            case "rejected":
                $this->logger->info("bus ---> mail ");
                $this->logger->info($jsonContent);
                $this->bus->dispatch(new MailNotification($jsonContent,$useremail)); 
                break;                
        }
           // $this->logger->info($changefield['place1'][0]."old value - new value ".$changefield['place1'][1]);
        }


       
    }
    
 
    public function createProjet(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        $entityManager = $args->getObjectManager();
        if ($entity instanceof Projet) {
        $tp = $entity->getTypeprojet();
        $placename = $entity->getPlace1(); 
        $user = $entity->getUser();   
        $useremail = $user->getEmail();
        $query = $this->em->createQuery(
            'SELECT p
            FROM App\Entity\Place p
            WHERE  p.typeprojet = :typeprojet
            AND p.nom = :place'
        );
        
        $query->setParameter('typeprojet', $tp);
        $query->setParameter('place', $placename);
        $messs1= $query->getResult();
        $conditions['conditions'] = $messs1[0]->getConditions();
        $conditions['nomprojet']=$entity->getNom();
        $conditions['place']=$entity->getPlace1();
        $conditions['formurl'] = "https://form.jotform.com/201351467044347"; 
        $jsonContent = $this->serializer->serialize( $conditions, 'json');
        $this->logger->info($jsonContent);
        $this->bus->dispatch(new MailNotification($jsonContent,$useremail));    
        }
       
        
    }
 
 }