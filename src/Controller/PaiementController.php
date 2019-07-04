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
use GuzzleHttp\ClientInterface;
use App\Entity\Paiement;
use App\Entity\Abonnement;
use App\Repository\AbonnementRepository;
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
        
        ->add('AMOUNT', HiddenType::class, ['data' => '0',])
        ->add('CID', HiddenType::class, ['data' => 'CIDabcdef',])
        ->add('CARDNUMBER', TextType::class, [
            'label' => 'Carte de Credit',
            'constraints' => [            
                new NotBlank(),
                new Length(['min' => 10,'max' =>10]),
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
            $data = $form->getData();
            $uuid="8e39f14a-d44e-51bb-8782-89723e586aa5";
            $logger->info($data['CID']);
            $c = curl_init();
            /*On indique à curl quelle url on souhaite télécharger*/
            $strdata = "http://ec2-52-47-88-142.eu-west-3.compute.amazonaws.com:6543/cardpay/{$uuid}/{$data['CID']}/{$data['CARDNUMBER']}/{$data['MONTH']}/{$data['YEAR']}/{$data['AMOUNT']}";
            curl_setopt($c, CURLOPT_URL, "$strdata");
//            curl_setopt($c, CURLOPT_URL, "http://ec2-52-47-88-142.eu-west-3.compute.amazonaws.com:6543/cardpay/$uuid/$data['CID']/$data['CARDNUMBER']/$data['MONTH']/$data['YEAR']/$data['AMOUNT']");
            /*On indique à curl de nous retourner le contenu de la requête plutôt que de l'afficher*/
            curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
            /*On indique à curl de ne pas retourner les headers http de la réponse dans la chaine de retour*/
            curl_setopt($c, CURLOPT_HEADER, true);
            /*On execute la requete*/
            $resp = curl_exec($c);
            // Close request to clear up some resources
            curl_close($c);
            $logger->info($resp);
 
          return $this->render('test.html.twig', [
          'number' => $resp,
          'str'=>$strdata,
          ]
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
    public function newAction(Request $request,LoggerInterface $logger,AbonnementRepository $abonnementRepository)
    {

        $data = $request->getContent();
        $logger->info('We are logging paiement iii!');
        $logger->info($data);

        $usr = $this->getUser();
        $today = new \DateTime(); 
        $idabo =  substr($data['cid'],0,strpos($data['cid'], "-"));     
        $abbo = $abonnementRepository->findBy(['id' => $idabo]); 
        $paiement = new Paiement();
        $paiement->setClient($usr);
        $paiement->setDate($today);
        $paiement->setIdpaiement($data['transaction']);
        $paiement->setAbonnement($abbo[0]);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($paiement);
        $entityManager->flush();

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
