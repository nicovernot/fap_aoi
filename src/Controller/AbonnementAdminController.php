<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use Sonata\AdminBundle\Controller\CRUDController;
use App\Repositoty\AbonnementRepository;
use App\Repositoty\PaiementRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;

final class AbonnementAdminController extends CRUDController
{

    private $logger;
    
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
      
    }


     /**
     * @param $id
     */
    public function RembourserAction($id)
    {
    $object = $this->admin->getSubject();
    if ($object->getRemboursement()==false) {
        # code...

        $paiement = $object->getPaiement();
        $object->setRemboursement(true);
        $object->setDateremboursement(new \DateTime());
        $this->logger->info($paiement->getIdpaiement());

       
       // $entityManager = $this->getDoctrine()->getManager();
        //    $entityManager->persist($object);
         //   $entityManager->flush();
    }




        return new RedirectResponse($this->admin->generateUrl('list'));       
    }
}
