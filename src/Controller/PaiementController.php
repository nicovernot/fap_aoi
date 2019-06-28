<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Psr\Log\LoggerInterface;

class PaiementController extends AbstractController
{
    /**
     * @Route("/paiement", name="paiement")
     * 
     */
    public function index(Request $request)
    { 

    $defaultData = ['message' => 'Merci de remplir tous les champs pour éffectuer le paiement'];
    $form = $this->createFormBuilder($defaultData)
        ->add('UUID', HiddenType::class, ['data' => 'UUIDabcdef',])
        ->add('CID', HiddenType::class, ['data' => 'CIDabcdef',])
        ->add('CARDNUMBER', TextType::class, [
            'label' => 'Carte de Credit',
            'constraints' => [            
                new NotBlank(),
                new Length(['min' => 12,'max' =>12]),
            ],
        ])
        ->add('MONTH', IntegerType::class, [
            'label' => 'Mois',
            'constraints' => [
                
                new NotBlank(),
                new Length(['min' => 1,'max' =>2]),
            ],
        ])
        ->add('YEAR', IntegerType::class, [
            'label' => 'Annéé',
            'constraints' => [
                
                new NotBlank(),
                new Length(['min' => 4,'max' =>4]),
            ],
        ])
        ->add('AMOUNT', HiddenType::class, ['data' => 'abcdef', ])
        ->add('Envoyer', SubmitType::class)
        ->getForm();
       $data=[];
        $form->handleRequest($request);
         //     var_dump($form);
        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();
            
            
        }

        return $this->render('paiement/index.html.twig', [
            'controller_name' => 'Paiement',
            'paiementForm' => $form->createView(),
            'data'=>$data,
        ]);
    }

     /**
     * @Route("/api/paiementretour")
     * @Method({"POST"})
     */
    public function newAction(Request $request,LoggerInterface $logger)
    {

        $data = $request->getContent();
        $logger->info('We are logging!');
        $logger->info($data);
        return new Response($data);
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
