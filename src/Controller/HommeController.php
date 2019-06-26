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
        $id=0;
        if ($request->isMethod('get')) {
         // $ong =$request->query->get('ong');
         // $type =$request->query->get('type');
          $id =$request->query->get('id');
          $Userentity = "App\Entity\User";
          $usercompte = $this->getDoctrine()
       ->getRepository($Userentity)
       ->findOneBy(['id' => $id]);
       $connecteduser = $this->getUser();
     if($usercompte !=$connecteduser){
        return $this->json(['error' => "vou n'etes pas autorisé à acceder a ce compte"]);
     }
     //$arrb =array("@id"=>"/apicmptfilter?id=1");
    // $usercompte->append(array("@id"=>"/apicmptfilter?id=1"));
    $ketid ="App\Entity\@id";
   $usercompte->$ketid = "/apicmptfilter?id=1";
   $array =  (array) $usercompte;
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
