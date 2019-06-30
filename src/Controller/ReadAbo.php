<?php

namespace App\Controller;

use App\Entity\Abonnement;
use Symfony\Component\Security\Core\Security;
use Psr\Log\LoggerInterface;

class ReadAbo
{
    private $security;
    private $logger;
    
    public function __construct(Security $security,LoggerInterface $logger)
    {
        $this->security = $security;
        $this->logger = $logger;
      
    }

  

    public function __invoke(Abonnement $data): Book
    {
       // $this->bookPublishingHandler->handle($data);
       $this->get('logger')->info('e.g. a user logged in');
       $this->get('logger')->notice('normal but significant events');
       $user = $this->security->getUser();
       $this->get('logger')->notice($user);
       return $data;
    }
}