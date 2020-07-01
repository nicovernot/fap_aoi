<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class HommeController extends AbstractController
{
    /**
     * @Route("/", name="homme")
     */
    public function index(Request $request)
    {
        $hostName = $request->server->get('HTTP_HOST');
        $user = $this->getUser();
        $projets = [];
        if($user){
        $projetstemp =$user->getProjets();
        foreach($projetstemp as $value){
        $tempvalue = "http://".$hostName."/api/projets/".strval($value->getId());    
        array_push($projets,$tempvalue);
        }
        }
        $ong=0;
        $type=0;
        $men=0;
        if ($request->isMethod('get')) {
          $ong =$request->query->get('ong');
          $type =$request->query->get('type');
          $idmen =$request->query->get('men');
}
           $menuentity = "App\Entity\Menu";
           $menu = $this->getDoctrine()
        ->getRepository($menuentity)
         ->findBy(array(),array('menord' => 'ASC'));
           $ssmenuentity = "App\Entity\Ssmenu";
           $ssmenu = $this->getDoctrine()
        ->getRepository($ssmenuentity)
        ->findBy(array(),array('ssmord' => 'ASC'));
        return $this->render('homme/index.html.twig', [
            'controller_name' => 'HommeController',
            'menu'=> $menu,
            'projets' => $projets,
            'ssmenu'=>$ssmenu,
            'ong' =>$ong,
            'type'=>$type,
            'idmen'=>$idmen,
        ]);
    }

  /**
     * @Route("/api/apicmptfilter", name="comptefilter")
     */
    public function usefilter(Request $request)
    {
        if ($request->isMethod('post')) {
            $refererUrl = $request->getSession()->get('_security.main.target_path');
            $entityManager = $this->getDoctrine()->getManager();
            $connecteduser = $this->getUser();
           // var_dump($connecteduser);
            $id = $connecteduser->getId();
            $Userentity = "App\Entity\User";
            $usercompte = $this->getDoctrine()
            ->getRepository($Userentity)
            ->findOneBy(['id' => $id]);
        
            if (!$usercompte) {
                throw $this->createNotFoundException(
                    'No User found for id '.$id
                );
            }
            $nom =$request->request->get('nom');
            $usercompte->setNom($nom);
            $prenom =$request->request->get('prenom');
            $usercompte->setPrenom($prenom);            
            $tel =$request->request->get('tel');
            $usercompte->setTel($tel);            
            $rue =$request->request->get('rue');
            $usercompte->setRue($rue);
            $nrue =$request->request->get('numeroRue');
            $usercompte->setNumeroRue($nrue);
            $ville =$request->request->get('ville');
            $usercompte->setVille($ville);
            $cp =$request->request->get('codepostal');
            $usercompte->setCodepostal($cp);
            $entityManager->persist($usercompte);

        // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();
               
            
            return $this->redirect($refererUrl);
       

        }
        $id=0;
        if ($request->isMethod('get')) {
        
          $id =$request->query->get('id');
          $Userentity = "App\Entity\User";
          $usercompte = $this->getDoctrine()
       ->getRepository($Userentity)
       ->findOneBy(['id' => $id]);
       $connecteduser = $this->getUser();
     if($usercompte !=$connecteduser){
        return $this->json(['error' => "vou n'etes pas autorisé à acceder a ce compte"]);
     }
     
    $ketid ="App\Entity\@id";
    $usercompte->$ketid = "/apicmptfilter?id=1";
    $array = $this->json([$usercompte]);

        return $this->json([$usercompte]);
}
       
    }

    protected function getUser()
    {
        if (!$this->container->has('security.token_storage')) {
            throw new \LogicException('The SecurityBundle is not registered in your application.');
        }
        if (null === $token = $this->container->get('security.token_storage')->getToken()) {
            return;
        }
        if (!is_object($user = $token->getUser())) {
            // e.g. anonymous authentication
            return;
        }
        return $user;
    }

}
