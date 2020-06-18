<?php


namespace App\MessageHandler;

use App\Entity\Document;
use Psr\Log\LoggerInterface;
use App\Message\UploadLinkNotification;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;

 /**
 * Class MailNotificationHandler
 */
class UploadLinkNotificationHandler implements MessageHandlerInterface
{
    /**
    * @var EntityManagerInterface
    */
    protected $em;
   
    /**
    * @var LoggerInterface
    */
    protected $logger;
    /**
     * UploadlinkNotificationHandler constructor.
     *
     */
    public function __construct(LoggerInterface $logger,EntityManagerInterface $em)
    {

        $this->logger = $logger;
        $this->em = $em;
    }

    public function __invoke(UploadLinkNotification $message)
    { 
       $content = $message->getContent();  
       $path = $message->getPath();
       $this->logger->info($path);
       $query = $this->em->createQuery(
        'SELECT p
        FROM App\Entity\User p
        WHERE  p.email = :email'
    );
    
    $query->setParameter('email', $path);
    $user= $query->getResult();
    $this->logger->info($user[0]->getEmail());
    $date = date("D M d, Y G:i", time());
    $today = strtotime($date); 
    $doc = new Document();
    $doc->setNom($path.'_'.$today);
    $doc->setUser($user[0]);
    $doc->setFichier("$content");
    $doc->setValide(false);
    $this->em->persist($doc);
    $this->em->flush();  
      
  

    }
}