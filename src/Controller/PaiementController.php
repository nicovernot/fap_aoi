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
use Symfony\Component\HttpFoundation\RedirectResponse;
use Guzzle\Http\Client;

class PaiementController extends AbstractController
{


    /**
     * @Route("/paiements", name="paiements")
     * 
     */
    public function index(Request $request,LoggerInterface $logger)
    { 
    $host = $request->server->get('HTTP_HOST'); 

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
            $logger->info('We are logging! paiments host request');
            $logger->info($host);
            $data = $form->getData();
            $uuid="8e39f14a-d44e-51bb-8782-89723e586aa5";
            $client = new Client('http://ec2-52-47-88-142.eu-west-3.compute.amazonaws.com:6543');
            $req = $client->get('/cardpay/8e39f14a-d44e-51bb-8782-89723e586aa5/test000/012345678912/1/2019/20');
            //$client = new Client('127.0.0.1:8000');
            //$req = $client->get('users');
            $response = $req->send();
            $logger->info($req);
            
            //$httpClient = HttpClient::create();
           // $response = $httpClient->request('GET', 'http://ec2-52-47-88-142.eu-west-3.compute.amazonaws.com:6543/cardpay/8e39f14a-d44e-51bb-8782-89723e586aa5/test000/012345678912/1/2019/20');
           // return new RedirectResponse('http://ec2-52-47-88-142.eu-west-3.compute.amazonaws.com:6543/cardpay/8e39f14a-d44e-51bb-8782-89723e586aa5/test000/012345678912/1/2019/20');
           return new Response(
            '<html><body>Lucky number: 4</body></html>'
        );
        }

        return $this->render('paiement/index.html.twig', [
            'controller_name' => 'Paiement',
            'paiementForm' => $form->createView(),
            'data'=>$data,
            
            'host'=>$host,
        ]);
    }

     /**
     * @Route("/paiement")
     * @Method({"POST"})
     */
    public function newAction(Request $request,LoggerInterface $logger)
    {

        $data = $request->getContent();
        $logger->info('We are logging paiement!');
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
