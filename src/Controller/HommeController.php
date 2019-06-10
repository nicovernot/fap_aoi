<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

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
}
