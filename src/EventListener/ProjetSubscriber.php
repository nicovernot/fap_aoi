<?php

namespace App\EventListener;
 
use App\Entity\Projet;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class ProjetSubscriber implements EventSubscriber
{

  
    public function __construct(LoggerInterface $logger,EntityManagerInterface $em)
    {
        $this->logger = $logger;
        $this->logger->info("construct projet event");
        $this->em = $em;
       
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
            $this->logger->info($changefield['place1'][0]."old value - new value ".$changefield['place1'][1]);
        }
       
    }
    
 
    public function updateQuantite(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        $entityManager = $args->getObjectManager();
 
        if ($entity instanceof Projet) {
            $entity->setNom("toto");
            $this->em->persist($entity);
            $this->em->flush();
            
        $this->logger->info("event subscriber");
        }
    }
 
 }