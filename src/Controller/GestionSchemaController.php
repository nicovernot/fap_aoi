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
         $seq = $connection->fetchAll("select nextval('champ_id_seq');");
        $seq = $seq[0]["nextval"];
         $cols = $connection->fetchAll($sql1);
       
       foreach ($cols as $key => $value) {
        $seq = $connection->fetchAll("select nextval('champ_id_seq');");
        $seq = $seq[0]["nextval"];
         $connection->insert('champ', array('id' => $seq,'onglet_id' => $ong,'Chplib'=>$value["column_name"],'Chpcha'=>$value["column_name"],'Chpord'=>$value ["ordinal_position"],'Chptyp'=>$value ["data_type"],'Chplon'=>$value ["character_maximum_length"],'Chprec'=>1));
       }  
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
