<?php

declare(strict_types=1);

namespace App\Controller;

use Sonata\AdminBundle\Controller\CRUDController;
use Psr\Log\LoggerInterface;
use Symfony\Component\Workflow\Exception\LogicException;
use Symfony\Component\Workflow\Registry;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
  
final class ProjetAdminController extends CRUDController
{

  

    public function __construct(LoggerInterface $logger,Registry $workflowRegistry,EntityManagerInterface $em)
    {
        $this->logger = $logger;
        $this->logger->info("construct projet admin");
        $this->workflowRegistry = $workflowRegistry;
        $this->em = $em;
       
    }

     /**
     * @param $id
     */
    public function workflowApplyTransitionAction(Request $request){
        
        $id = $request->get('id');
        $this->logger->info($id);  
        $transition = $request->get('transition');
        $this->logger->info($transition); 
        $place="";
        switch ($transition) {
            case 'to_review':
                $place= 'reviewed';
                break;
            case 'publish':
                $place='fini';
                break;
            case 'reject':
                $place='rejected';
                break;
        }
        $object = $this->admin->getSubject();
        $workflow = $this->workflowRegistry->get($object);
        $entitymanager = $this->em;
        try {
          //  $workflow->apply($object, 'to_review');
           $can = $workflow->can($object, $transition);
           if ($can==1 ) {

               $workflow->apply($object, $transition);
               $object->setPlace1($place);
               $entitymanager->persist($object);
               $entitymanager->flush();
               $this->logger->info("transition ok");
           }
 

        } catch (LogicException $exception) {
            $this->logger->info($exception);
        }
        return new RedirectResponse($this->admin->generateUrl('list'));
    }



}
