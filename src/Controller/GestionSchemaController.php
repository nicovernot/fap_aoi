<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Driver\Connection;
use Symfony\Component\HttpFoundation\Request;

class GestionSchemaController extends AbstractController
{
    /**
     * @Route("/gschema", name="gestion_schema")
     */
    public function index(Connection $connection,Request $request)
    {
        $sql = "SELECT * FROM IEI_SSMENU WHERE IDSSM = :id";
        $nomtable= $request->query->get('nmtbl');
        $ong= $request->query->get("nglt");
        var_dump($ong);
        var_dump($nomtable);
        if(isset($ong) and isset($nomtable)){
           $sql1 = "select *
           from information_schema.columns
           where table_name = '$nomtable';" ;
         $cols = $connection->fetchAll($sql1);
         var_dump($cols);
       // foreach ($cols as $key => $value) {
      //   $connection->insert('champ', array('onglet_id' => $ong,'Chplib'=>$value["name"],'Chpcha'=>$value["name"],'Chpord'=>$value["cid"],'Chptyp'=>$value["type"],'Chprec'=>1));
        //  }  
        }
       
            
            
         $entity = "App\Entity\Onglet";
           $onglets = $this->getDoctrine()
        ->getRepository($entity)
        ->findAll();

       
        $stmt = $connection->prepare($sql);
        $stmt->bindValue("id", 1);
        $stmt->execute();
        $st = $stmt->fetchAll();
      $sm = $connection->getSchemaManager();
      //$databases = $sm->listDatabases();
      $tables = $sm->listTables();
     // $tables = "tables"; 
       return $this->render('gestion_schema/index.html.twig', [
            'controller_name' => 'GestionSchemaController',
            'tables' => $tables,
            'stm' => $st,
          
           'onglets' => $onglets,
        ]);
    }
}
