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
       
        $nomtable= $request->query->get('nmtbl');
        $ong= $request->query->get("nglt");
 
        if(isset($ong) and isset($nomtable)){
           $sql1 = "SELECT * 
           FROM `INFORMATION_SCHEMA`.`COLUMNS` 
           WHERE `TABLE_NAME` = '$nomtable';" ;
        // $seq = $connection->fetchAll("select nextval('champ_id_seq');");
        // $seq = $seq[0]["nextval"];
         $cols = $connection->fetchAll($sql1);
       
       foreach ($cols as $key => $value) {
       // $seq = $connection->fetchAll("select nextval('champ_id_seq');");
       // $seq = $seq[0]["nextval"];
         $connection->insert('champ', array('onglet_id' => $ong,'Chplib'=>$value["COLUMN_NAME"],'Chpcha'=>$value["COLUMN_NAME"],'Chpord'=>$value ["ORDINAL_POSITION"],'Chptyp'=>$value ["DATA_TYPE"],'Chplon'=>$value ["CHARACTER_MAXIMUM_LENGTH"],'Chprec'=>1));
       }  
        }
       
            
            
         $entity = "App\Entity\Onglet";
           $onglets = $this->getDoctrine()
        ->getRepository($entity)
        ->findAll();

       
       // $stmt = $connection->prepare($sql);
      //  $stmt->bindValue("id", 1);
      //  $stmt->execute();
      //  $st = $stmt->fetchAll();
      $sm = $connection->getSchemaManager();
      //$databases = $sm->listDatabases();
      $tables = $sm->listTables();
     // $tables = "tables"; 
       return $this->render('gestion_schema/index.html.twig', [
            'controller_name' => 'GestionSchemaController',
            'tables' => $tables,
           
           'onglets' => $onglets,
        ]);
    }
}
