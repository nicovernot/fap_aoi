-- MySQL dump 10.17  Distrib 10.3.22-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: myapp
-- ------------------------------------------------------
-- Server version	10.3.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES UTF8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `myapp`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `myapp` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `myapp`;

--
-- Table structure for table `adress`
--

DROP TABLE IF EXISTS `adress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `energie_id` int(11) DEFAULT NULL,
  `typehabitat_id` int(11) DEFAULT NULL,
  `taillesurface_id` int(11) DEFAULT NULL,
  `departement_id` int(11) DEFAULT NULL,
  `ville` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `nrue` int(11) NOT NULL,
  `nomrue` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `codepostal` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5CECC7BEA76ED395` (`user_id`),
  KEY `IDX_5CECC7BEB732A364` (`energie_id`),
  KEY `IDX_5CECC7BE56A4CD2B` (`typehabitat_id`),
  KEY `IDX_5CECC7BE8FABBFBD` (`taillesurface_id`),
  KEY `IDX_5CECC7BECCF9E01E` (`departement_id`),
  CONSTRAINT `FK_5CECC7BE56A4CD2B` FOREIGN KEY (`typehabitat_id`) REFERENCES `type_habitation` (`id`),
  CONSTRAINT `FK_5CECC7BE8FABBFBD` FOREIGN KEY (`taillesurface_id`) REFERENCES `taille_surface` (`id`),
  CONSTRAINT `FK_5CECC7BEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user1` (`id`),
  CONSTRAINT `FK_5CECC7BEB732A364` FOREIGN KEY (`energie_id`) REFERENCES `energie_apres_travaux` (`id`),
  CONSTRAINT `FK_5CECC7BECCF9E01E` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adress`
--

LOCK TABLES `adress` WRITE;
/*!40000 ALTER TABLE `adress` DISABLE KEYS */;
INSERT INTO `adress` VALUES (1,2,1,2,2,6,'nice',6,'latoto',6300),(2,3,2,1,4,13,'marseille',45,'latoto',13013),(3,4,1,1,5,13,'allauch',78,'latoto',13190),(4,12,1,1,3,16,'plan de cuques',4,'vert',3),(5,1,1,1,6,13,'plan de cuques',6,'rue vert coteau',13380);
/*!40000 ALTER TABLE `adress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appli`
--

DROP TABLE IF EXISTS `appli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appli`
--

LOCK TABLES `appli` WRITE;
/*!40000 ALTER TABLE `appli` DISABLE KEYS */;
INSERT INTO `appli` VALUES (1,'projetecoenergie'),(2,'privé');
/*!40000 ALTER TABLE `appli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `champ`
--

DROP TABLE IF EXISTS `champ`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `champ` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `onglet_id` int(11) DEFAULT NULL,
  `chpcha` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chpord` int(11) DEFAULT NULL,
  `chplon` int(11) DEFAULT NULL,
  `chptyp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chpsai` int(11) DEFAULT NULL,
  `chpsel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chprec` int(11) DEFAULT NULL,
  `chplib` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2F61E0ADBD1A86CC` (`onglet_id`),
  CONSTRAINT `FK_2F61E0ADBD1A86CC` FOREIGN KEY (`onglet_id`) REFERENCES `onglet` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `champ`
--

LOCK TABLES `champ` WRITE;
/*!40000 ALTER TABLE `champ` DISABLE KEYS */;
INSERT INTO `champ` VALUES (9,3,'id',1,NULL,'int',NULL,NULL,0,'id'),(10,3,'user_id',2,NULL,'int',NULL,NULL,0,'user_id'),(11,3,'ville',3,70,'varchar',NULL,NULL,1,'ville'),(12,3,'nrue',4,NULL,'int',NULL,NULL,1,'nrue'),(13,3,'nomrue',5,70,'varchar',NULL,NULL,1,'nomrue'),(14,3,'codepostal',6,NULL,'int',NULL,NULL,1,'codepostal'),(15,4,'id',1,NULL,'int',NULL,NULL,0,'id'),(16,4,'appli_id',2,NULL,'int',NULL,NULL,0,'appli_id'),(17,4,'email',3,180,'varchar',NULL,NULL,1,'email'),(18,4,'roles',4,350,'longtext',NULL,NULL,0,'roles'),(19,4,'password',5,255,'varchar',NULL,NULL,0,'password'),(20,4,'nom',6,255,'varchar',NULL,NULL,1,'nom'),(21,4,'prenom',7,255,'varchar',NULL,NULL,1,'prenom'),(22,4,'tel',8,255,'varchar',NULL,NULL,1,'tel'),(23,4,'dateNaissance',9,NULL,'varchar',NULL,NULL,0,'date naissance'),(24,4,'lieuNaissance',10,255,'varchar',NULL,NULL,1,'lieuNaissance'),(25,4,'apitoken',11,255,'varchar',NULL,NULL,0,'apitoken'),(26,5,'id.cat',1,NULL,'txtarray',1,NULL,1,'Categorie'),(27,5,'Nom',2,NULL,'title',0,NULL,1,'Nom'),(28,5,'Notes',4,NULL,'varchar',NULL,NULL,1,'Notes'),(29,5,'name.cat',4,NULL,'varchar',1,NULL,0,'name.cat'),(30,5,'Attachments',3,NULL,'imgarray',NULL,NULL,1,'Attachments'),(31,6,'nom',1,NULL,'title',NULL,NULL,1,'Nom'),(32,6,'description',2,NULL,'varchar',NULL,NULL,1,'description'),(33,7,'id.cat',1,NULL,'txtarray',NULL,NULL,1,'Categorie'),(34,7,'Nom',2,NULL,'title',NULL,NULL,1,'Nom'),(35,7,'Notes',4,NULL,'varchar',NULL,NULL,1,'Notes'),(36,7,'Attachments',3,NULL,'imgarray',NULL,NULL,1,'Attachments'),(37,8,'id.cat',1,NULL,'txtarray',NULL,NULL,1,'Categorie'),(38,8,'Nom',2,NULL,'title',NULL,NULL,1,'Nom'),(39,8,'Notes',3,NULL,'varchar',NULL,NULL,1,'Notes'),(40,8,'Attachments',NULL,NULL,'imgarray',NULL,NULL,1,'Attachments'),(41,9,'id.cat',1,NULL,'txtarray',NULL,NULL,1,'Categorie'),(42,9,'Nom',2,NULL,'title',NULL,NULL,1,'Nom'),(43,9,'Notes',4,NULL,'varchar',NULL,NULL,1,'Notes'),(44,9,'Attachments',3,NULL,'imgarray',NULL,NULL,1,'Attachments'),(47,10,'energie_id',3,NULL,'select',NULL,'{ energieApresTravauxes{ edges{ node{ id nom } } } }',1,'Type Energie'),(48,10,'typehabitat_id',4,NULL,'select',NULL,'{ typeHabitations{ edges{ node{ id nom } } } }',1,'Type Habitat'),(49,10,'taillesurface_id',5,NULL,'select',NULL,'{ tailleSurfaces{ edges{ node{ id nom } } } }',1,'Taille Surface'),(50,10,'departement_id',1,NULL,'select',NULL,'{ departements{ edges{ node{ id nom } } } }',1,'Departement'),(58,10,'typeprojet',7,NULL,'select',NULL,'{ typeProjets { edges{ node{ id nom contientsuraface priseencharge plafondbool  montantplafond familleprojet {nom}} } } }',1,'Type Projet'),(64,10,'surface',8,NULL,'inputnumber',NULL,NULL,1,'Surface travaux *metre 0 en cas de travaux chauffage ou energie renouvelables'),(65,10,'btnsend',9,NULL,'btnsend',NULL,'onButtonClick',1,'Valider Dossier'),(66,10,'familleprojet',6,NULL,'select',NULL,'{   familleProjets{     edges{       node{         id         nom         description       }     }   } }',1,'Famille de Projet'),(67,11,'id',1,NULL,'int',NULL,NULL,0,'id'),(68,11,'user_id',2,NULL,'int',NULL,NULL,0,'user_id'),(69,11,'projectadmin_id',3,NULL,'int',NULL,NULL,0,'projectadmin_id'),(70,11,'typeprojet_id',4,NULL,'int',NULL,NULL,0,'typeprojet_id'),(71,11,'datedevis',5,NULL,'date',NULL,NULL,1,'datedevis'),(72,11,'datefacture',6,NULL,'date',NULL,NULL,1,'datefacture'),(73,11,'nom',7,100,'varchar',NULL,NULL,1,'nom'),(74,11,'adress_id',8,NULL,'int',NULL,NULL,0,'adress_id'),(75,11,'place1',9,100,'varchar',NULL,NULL,1,'place1'),(76,11,'surface',10,NULL,'int',NULL,NULL,1,'surface'),(81,12,'typeprojet',7,0,'select',0,'{ typeProjets { edges{ node{ id nom contientsuraface priseencharge plafondbool  montantplafond familleprojet {nom}} } } }',1,'Type Projet'),(82,12,'surface',8,0,'inputnumber',0,NULL,1,'Surface travaux *metre 0 en cas de travaux chauffage ou energie renouvelables'),(83,12,'btnsend',9,0,'btnsend',0,'onButtonClick',1,'Valider Dossier'),(84,12,'familleprojet',6,0,'select',0,'{   familleProjets{     edges{       node{         id         nom         description       }     }   } }',1,'Famille de Projet'),(85,12,'adress',2,NULL,'select',0,'{ adresses{   edges {  node {   id   nrue   nomrue   codepostal   ville }  } } }',1,'Adresse'),(86,12,'user',1,NULL,'select',NULL,'{   users{     edges{       node{         id  nom        email       }     }   } }',1,'Moi');
/*!40000 ALTER TABLE `champ` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `condition_place`
--

DROP TABLE IF EXISTS `condition_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `condition_place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place_id` int(11) DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `typedocument` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_38C6B7C6DA6A219` (`place_id`),
  CONSTRAINT `FK_38C6B7C6DA6A219` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `condition_place`
--

LOCK TABLES `condition_place` WRITE;
/*!40000 ALTER TABLE `condition_place` DISABLE KEYS */;
INSERT INTO `condition_place` VALUES (1,1,'qualification  RGE','Les travaux doivent être réalisés par un professionnel titulaire d’une qualification portant la mention RGE (Reconnu Garant de l’Environnement) « Installation d’une pompe à chaleur » valide à la date d’engagement des travaux.','certificat qualification  RGE'),(2,1,'efficacité énergétique saisonnière','L’efficacité énergétique saisonnière (Etas) de la PAC seule pour les besoins de chauffage des locaux, hors dispositif de régulation, selon le règlement (EU) n°813/2013 de la commission du 2 août 2013, est supérieure ou égale à :      111% pour les PAC mo','attestation pac   efficacité +  111%'),(3,1,'type PAC','Les PAC utilisées uniquement pour le chauffage de l’eau chaude sanitaire et celles associées à une chaudière haute performance énergétique pour le chauffage des locaux ne sont pas éligibles au dispositif des CEE','devis pac'),(4,16,'facture pompe','La fourniture et la mise en place d’une pompe à chaleur air/eau ou eau/eau     La marque et le modèle de la pompe à chaleur     le type de la pompe à chaleur installée (basse, moyenne ou haute température) et son Etas.','facture pompe'),(5,16,'attestation depose','La dépose de la chaudière remplacée     L’énergie de chauffage de la chaudière remplacée (charbon, fioul ou gaz)     Le type d’équipement remplacé     Indiquer que l’équipement déposé est une chaudière autre qu’à condensation','attestation depose');
/*!40000 ALTER TABLE `condition_place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departement`
--

DROP TABLE IF EXISTS `departement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departement`
--

LOCK TABLES `departement` WRITE;
/*!40000 ALTER TABLE `departement` DISABLE KEYS */;
INSERT INTO `departement` VALUES (1,'1','Ain'),(2,'2','Aisne'),(3,'3','Allier'),(4,'4','Alpes-de-Haute-Provence'),(5,'5','Hautes-Alpes'),(6,'6','Alpes-Maritimes'),(7,'7','Ardèche'),(8,'8','Ardennes'),(9,'9','Ariège'),(10,'10','Aube'),(11,'11','Aude'),(12,'12','Aveyron'),(13,'13','Bouches-du-Rhône'),(14,'14','Calvados'),(15,'15','Cantal'),(16,'16','Charente'),(17,'17','Charente-Maritime'),(18,'18','Cher'),(19,'19','Corrèze'),(20,'21','Côte-d\'Or'),(21,'22','Côtes-d\'Armor'),(22,'23','Creuse'),(23,'24','Dordogne'),(24,'25','Doubs'),(25,'26','Drôme'),(26,'27','Eure'),(27,'28','Eure-et-Loir'),(28,'29','Finistère'),(29,'2A','Corse-du-Sud'),(30,'2B','Haute-Corse'),(31,'30','Gard'),(32,'31','Haute-Garonne'),(33,'32','Gers'),(34,'33','Gironde'),(35,'34','Hérault'),(36,'35','Ille-et-Vilaine'),(37,'36','Indre'),(38,'37','Indre-et-Loire'),(39,'38','Isère'),(40,'39','Jura'),(41,'40','Landes'),(42,'41','Loir-et-Cher'),(43,'42','Loire'),(44,'43','Haute-Loire'),(45,'44','Loire-Atlantique'),(46,'45','Loiret'),(47,'46','Lot'),(48,'47','Lot-et-Garonne'),(49,'48','Lozère'),(50,'49','Maine-et-Loire'),(51,'50','Manche'),(52,'51','Marne'),(53,'52','Haute-Marne'),(54,'53','Mayenne'),(55,'54','Meurthe-et-Moselle'),(56,'55','Meuse'),(57,'56','Morbihan'),(58,'57','Moselle'),(59,'58','Nièvre'),(60,'59','Nord'),(61,'60','Oise'),(62,'61','Orne'),(63,'62','Pas-de-Calais'),(64,'63','Puy-de-Dôme'),(65,'64','Pyrénées-Atlantiques'),(66,'65','Hautes-Pyrénées'),(67,'66','Pyrénées-Orientales'),(68,'67','Bas-Rhin'),(69,'68','Haut-Rhin'),(70,'69','Rhône'),(71,'70','Haute-Saône'),(72,'71','Saône-et-Loire'),(73,'72','Sarthe'),(74,'73','Savoie'),(75,'74','Haute-Savoie'),(76,'75','Paris'),(77,'76','Seine-Maritime'),(78,'77','Seine-et-Marne'),(79,'78','Yvelines'),(80,'79','Deux-Sèvres'),(81,'80','Somme'),(82,'81','Tarn'),(83,'82','Tarn-et-Garonne'),(84,'83','Var'),(85,'84','Vaucluse'),(86,'85','Vendée'),(87,'86','Vienne'),(88,'87','Haute-Vienne'),(89,'88','Vosges'),(90,'89','Yonne'),(91,'90','Territoire de Belfort'),(92,'91','Essonne'),(93,'92','Hauts-de-Seine'),(94,'93','Seine-Saint-Denis'),(95,'94','Val-de-Marne'),(96,'95','Val-d\'Oise'),(97,'971','Guadeloupe'),(98,'972','Martinique'),(99,'973','Guyane'),(100,'974','La Réunion'),(101,'976','Mayotte');
/*!40000 ALTER TABLE `departement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document`
--

DROP TABLE IF EXISTS `document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `conditionplace_id` int(11) DEFAULT NULL,
  `projet_id` int(11) DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fichier` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valide` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D8698A76A76ED395` (`user_id`),
  KEY `IDX_D8698A763D7DF015` (`conditionplace_id`),
  KEY `IDX_D8698A76C18272` (`projet_id`),
  CONSTRAINT `FK_D8698A763D7DF015` FOREIGN KEY (`conditionplace_id`) REFERENCES `condition_place` (`id`),
  CONSTRAINT `FK_D8698A76A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user1` (`id`),
  CONSTRAINT `FK_D8698A76C18272` FOREIGN KEY (`projet_id`) REFERENCES `projet` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document`
--

LOCK TABLES `document` WRITE;
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
INSERT INTO `document` VALUES (5,4,NULL,NULL,'eno31o5qmu5yziu@pipedream.net_1592417400','https://dl.dropboxusercontent.com/apitl/1/Ab_eafQqNtTJv15LvuVvf3qUclQ08nmoefE-OL5k1zt35tv7VORq8QgtM7rQXNMRZnQg44njaf1pX5J81LG6af2pg5hu_Shf4S2Pr5iYy4FYSjHJg48RZuyZZ8RCDafarMpBIhmfiulVUHP6k7rjxs5CEq9my4Hruh9E5SRrMOEdH033R5nCc3vAZv2XOSBOdSRY_owtrcDyO6xFIK-xgzaX7qfLf5qIlV819k99KJhOgdGqrr37DEhc0bNls9LZwhn5i9veNHtt8kfBfHWGZ08l_TFMGAEFM_LLjqiepWVIz97Kf1M7lRPgaspvPlkQQja5jhDmYWFZ6tAgLSiNSkXEhv-9q_KCq8reRXlPTE-Gt3aij-FASXT9HVm_ox3OzusA1WxbL4mIVEEevpZvGvBE',0),(6,4,NULL,NULL,'eno31o5qmu5yziu@pipedream.net_1592417820','https://dl.dropboxusercontent.com/apitl/1/Ab901gMsT467LDBg4nYr73KStGoMOsDgVzPQ44mAqvAwZ_BpACI42Gt-Weiwy_2i7lWZIOD5rjIM8C0z5WVHXYvGKS3cyZr11Mm2DDvuDq4oHxIQCjqm8MuC57L3O_otl7vCwJ2kKdtdL1VhZ9aD5xh6YMyH6Y-BIMYXcjdy29r28BPyLSDTtIHRyvoMz_sEkWwo0ixiZ169uBreCjcFclaX5R3wLMpmb_rcK4hAZ_3afUlT9epajLL9siPJ8GNjJbfqWrhYR8LMii5Wb5zT7z_iedYWjNX1WpuRVHminNlO5kpZx_ZwRDi8iCLL2IMWeKHY1hp4g4c_MUobPRlkSZ6AJ7cOHTaudcM66mCcwgoP4OqBvADaQlmsiTZIK20f0kXL4TP_dmw3r-hz9ZWGryj5',0),(7,4,NULL,NULL,'eno31o5qmu5yziu@pipedream.net_1592417820','https://dl.dropboxusercontent.com/apitl/1/Ab_cSREHvgg2xN0J6GiA14FvBuim5POugYw1OPCQGnephKq-G_mM3MxQA8sHAAaI2xOvsUso09rbyGp3Keznim_GdlFLak3jFgalCg4AusGlXcEdlH73mBTELKquELcZtV1PHWkew9zuoak2rJRY1VwvRx_A08wZ9J3SWgFSn9MaFchhXKFFU80aSm-L9YFhCFDw1F2q4shemJ_XMcKOdMdqAL8_GO-wAup3l-zATJv-qnM6EA6_rnAzKbjrsfwrS01PVm3PnXR9dyi_d85M6P27QqxIxfRFbEThx6gaYKO84PHc7Qq9fCjpnNuIZ_o1P8iLJ6xboFXT1WyPiJIQ5mTKsHDcSO75YSfQRC6qxFTz0GbId3W1YNe5A3u5oS9WFtR8KoAR9Uc_RwlQ5Zt5SNeeg5dk7pI526oXdTDtqzTklHQIQeHUjB9qxacGUslibWI',0),(8,3,NULL,NULL,'mwolf@gmail.com_1592419020','https://www.dropbox.com/s/ymvleokhco8ahb0/mwolf%40gmail.com%20-%20-.pdf?dl=0',0),(9,3,NULL,NULL,'mwolf@gmail.com_1592419020','https://dl.dropboxusercontent.com/apitl/1/Ab-VSkzwDj6EmxmuIJgb-clHJne3H_BGpyFmUrOLXwHTUtTcwqKfm9LMdI_e53I5IHA-SiVZqyPnzT4AskGEKKF6IGFYFrmsSj28XyVaN_WWGB46bIFLZ9s80zNwVZbH-ROLna2yFcqQl5j9oZUXyOOGt_711iEo8Wl-AzsfFS48XbVOBl-PZFRoBDjIWwpUopvG0vIoPS9O4cDgE4vRgSvaN6P-NsKPPsBbtBAc15rqqvT_psk89TtZK6INWQ3kOS_rRDWqVMjTf8Nd3hWIUde03LoGdRjiItkipku2-VjrjIlHMB5PNauC1LrEGfaGPTZPG32DpIqqhna6OHA88jWrOpOg0qvrULs7ErlFev1kG_cueXqsZ-VVsHQKcnec9aMPzAw5OuY0oMotI_sE3HaW',0);
/*!40000 ALTER TABLE `document` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `energie_apres_travaux`
--

DROP TABLE IF EXISTS `energie_apres_travaux`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `energie_apres_travaux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `energie_apres_travaux`
--

LOCK TABLES `energie_apres_travaux` WRITE;
/*!40000 ALTER TABLE `energie_apres_travaux` DISABLE KEYS */;
INSERT INTO `energie_apres_travaux` VALUES (1,'Electricite ou pompe a chaleur'),(2,'combustible');
/*!40000 ALTER TABLE `energie_apres_travaux` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `famille_projet`
--

DROP TABLE IF EXISTS `famille_projet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `famille_projet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `famille_projet`
--

LOCK TABLES `famille_projet` WRITE;
/*!40000 ALTER TABLE `famille_projet` DISABLE KEYS */;
INSERT INTO `famille_projet` VALUES (1,'Les énergies renouvelables','Les énergies renouvelables sont des sources d\'énergie dont le renouvellement naturel est assez rapide pour qu\'elles puissent être considérées comme inépuisables à l\'échelle du temps humain.'),(2,'L’isolation','L\'Isolation thermique du bâtiment est le processus de mise en œuvre de l\'isolation thermique de l\'enveloppe de tout ou partie d\'un bâtiment, par l\'intérieur et/ou l\'extérieur.'),(3,'Le chauffage et la régulation','Le chauffage est l\'action de transmettre de l\'énergie thermique à un objet, un matériau ou à l\'air ambiant.'),(4,'La ventilation','a ventilation est l\'action qui consiste à créer un renouvellement de l\'air, par déplacement dans un lieu clos.');
/*!40000 ALTER TABLE `famille_projet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (1,'822239ef9bb2f711b85b46daef174722.jpeg','2020-06-03 18:43:00'),(2,'b819e9223fe4342d7ff525b3f3078194.jpeg','2020-06-03 18:43:00'),(3,'49f03886833a292f49454a2a27b46903.jpeg','2020-06-04 12:45:00');
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appli_id` int(11) DEFAULT NULL,
  `mencod` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menlib` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menord` int(11) DEFAULT NULL,
  `mencom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mendat` datetime DEFAULT NULL,
  `menphp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mensql` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7D053A931DC59C41` (`appli_id`),
  CONSTRAINT `FK_7D053A931DC59C41` FOREIGN KEY (`appli_id`) REFERENCES `appli` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,1,'travauxelegibles','Travaux éligibles',2,'Travaux éligibles','2020-06-01 13:26:00','test','recherche',1),(2,1,'primesenergie','Les Primes Energie',1,'Les Primes Energie','2020-06-19 07:46:00','php','sql',1),(4,1,'Simulateur','Simulateur',4,'simulateur','2020-06-20 09:31:00','simulateur','simulateur',1),(5,1,'Mon Compte','MonCompte',4,'mon compte','2020-06-21 08:29:00',NULL,NULL,0);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `projet_id` int(11) DEFAULT NULL,
  `destinataire_id` int(11) DEFAULT NULL,
  `emeteur_id` int(11) DEFAULT NULL,
  `typemessage_id` int(11) DEFAULT NULL,
  `sent` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B6BD307FC18272` (`projet_id`),
  KEY `IDX_B6BD307FA4F84F6E` (`destinataire_id`),
  KEY `IDX_B6BD307FC8791E35` (`emeteur_id`),
  KEY `IDX_B6BD307FAA20F324` (`typemessage_id`),
  CONSTRAINT `FK_B6BD307FA4F84F6E` FOREIGN KEY (`destinataire_id`) REFERENCES `user1` (`id`),
  CONSTRAINT `FK_B6BD307FAA20F324` FOREIGN KEY (`typemessage_id`) REFERENCES `type_message` (`id`),
  CONSTRAINT `FK_B6BD307FC18272` FOREIGN KEY (`projet_id`) REFERENCES `projet` (`id`),
  CONSTRAINT `FK_B6BD307FC8791E35` FOREIGN KEY (`emeteur_id`) REFERENCES `user1` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (2,'nvbnvbnv','2015-01-06 00:01:00',NULL,2,1,1,1);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20200527093909','2020-05-27 13:35:31'),('20200608131411','2020-06-08 13:14:31'),('20200608133650','2020-06-08 13:37:05'),('20200608134321','2020-06-08 13:43:29'),('20200608135123','2020-06-08 13:52:03'),('20200609061506','2020-06-09 06:15:23'),('20200609061622','2020-06-09 06:16:30'),('20200609073930','2020-06-09 07:39:52'),('20200609074737','2020-06-09 07:47:50'),('20200609170306','2020-06-09 17:03:22'),('20200609181329','2020-06-09 18:13:47'),('20200609182501','2020-06-09 18:25:09'),('20200611064906','2020-06-11 06:49:20'),('20200611091711','2020-06-11 09:17:21'),('20200611114332','2020-06-11 11:43:46'),('20200613064223','2020-06-13 06:42:37'),('20200613065300','2020-06-13 06:53:18'),('20200613070739','2020-06-13 07:08:10'),('20200613080622','2020-06-13 08:06:30'),('20200613080716','2020-06-13 08:07:23'),('20200613081047','2020-06-13 08:10:56'),('20200613135442','2020-06-13 13:54:53'),('20200613140856','2020-06-13 14:09:03'),('20200613171415','2020-06-13 17:14:24'),('20200617073030','2020-06-17 07:30:48'),('20200617180038','2020-06-17 18:00:52'),('20200617180212','2020-06-17 18:02:21'),('20200617181021','2020-06-17 18:10:30'),('20200620113926','2020-06-20 11:39:42'),('20200623082159','2020-06-23 08:22:09'),('20200626055326','2020-06-26 05:53:39');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `onglet`
--

DROP TABLE IF EXISTS `onglet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `onglet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ssmenu_id` int(11) DEFAULT NULL,
  `ongcod` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `onglib` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ongord` int(11) DEFAULT NULL,
  `onglec` int(11) DEFAULT NULL,
  `ongcre` int(11) DEFAULT NULL,
  `ongupd` int(11) DEFAULT NULL,
  `ongadm` int(11) DEFAULT NULL,
  `ongcom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ongmaj` datetime DEFAULT NULL,
  `ongphp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ongsql` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ongdef` int(11) DEFAULT NULL,
  `ongsqlcre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ongsqlupd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ongsqldel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ongcon` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C6BC02395C434BA1` (`ssmenu_id`),
  CONSTRAINT `FK_C6BC02395C434BA1` FOREIGN KEY (`ssmenu_id`) REFERENCES `ssmenu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `onglet`
--

LOCK TABLES `onglet` WRITE;
/*!40000 ALTER TABLE `onglet` DISABLE KEYS */;
INSERT INTO `onglet` VALUES (3,1,'adresses','adresse',1,1,1,1,1,'tesr','2020-06-01 18:56:00','recherche','adresses',1,'bb','bb','bb',1),(4,3,'user','user',1,1,1,1,1,'users','2020-06-01 19:10:00','recherche','users',1,NULL,NULL,NULL,1),(5,4,'Travaux éligibles','Travaux éligibles',1,1,1,1,1,'&filterByFormula=(%7Bid.cat%7D%3D\'L%E2%80%99isolation\')','2020-06-02 09:41:00','cards','fields',1,NULL,NULL,NULL,NULL),(6,5,'Les primes','Les primes',1,1,1,1,1,NULL,'2020-06-19 08:22:00','cards','fields',NULL,NULL,NULL,NULL,NULL),(7,6,'Les énergies renouvelables','Les énergies renouvelables',1,NULL,NULL,NULL,NULL,'&filterByFormula=(%7Bid.cat%7D%3D\'Les+%C3%A9nergies+renouvelables\')','2020-06-19 12:45:00','fields','cards',1,NULL,NULL,NULL,NULL),(8,7,'Le chauffage et la régulation','Le chauffage et la régulation',1,NULL,NULL,NULL,NULL,'&filterByFormula=(%7Bid.cat%7D%3D\'Le+chauffage+et+la+r%C3%A9gulation\')','2020-06-19 13:19:00','fields','cards',NULL,NULL,NULL,NULL,NULL),(9,8,'La ventilation','La ventilation',1,NULL,NULL,NULL,NULL,'&filterByFormula=(%7Bid.cat%7D%3D\'La+ventilation\')','2020-06-19 13:41:00','fields','cards',NULL,NULL,NULL,NULL,NULL),(10,9,'simulateur','Simulateur',1,NULL,NULL,NULL,NULL,NULL,'2020-06-22 07:21:00',NULL,'noquery',NULL,NULL,NULL,NULL,NULL),(11,10,'Mes Projets','Mes projets',1,NULL,NULL,NULL,NULL,NULL,'2020-06-28 12:08:00','recherche','projets',NULL,NULL,NULL,NULL,NULL),(12,11,'Nouveau Projet','Nouveau Projet',1,NULL,NULL,NULL,NULL,NULL,'2020-06-28 13:52:00',NULL,'noquery',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `onglet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `place`
--

DROP TABLE IF EXISTS `place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeprojet_id` int(11) DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_741D53CDE3FEE0EE` (`typeprojet_id`),
  CONSTRAINT `FK_741D53CDE3FEE0EE` FOREIGN KEY (`typeprojet_id`) REFERENCES `type_projet` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place`
--

LOCK TABLES `place` WRITE;
/*!40000 ALTER TABLE `place` DISABLE KEYS */;
INSERT INTO `place` VALUES (1,5,'draft'),(2,6,'draft'),(3,7,'draft'),(4,9,'draft'),(5,10,'draft'),(6,12,'draft'),(7,13,'draft'),(8,14,'draft'),(9,15,'draft'),(10,16,'draft'),(11,17,'draft'),(12,18,'draft'),(13,19,'draft'),(14,20,'draft'),(15,21,'draft'),(16,5,'reviewed'),(17,5,'rejected'),(18,5,'fini');
/*!40000 ALTER TABLE `place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projet`
--

DROP TABLE IF EXISTS `projet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `projectadmin_id` int(11) DEFAULT NULL,
  `typeprojet_id` int(11) DEFAULT NULL,
  `datedevis` date DEFAULT NULL,
  `datefacture` date DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adress_id` int(11) DEFAULT NULL,
  `place1` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'draft',
  `surface` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_50159CA9A76ED395` (`user_id`),
  KEY `IDX_50159CA9867D6F08` (`projectadmin_id`),
  KEY `IDX_50159CA9E3FEE0EE` (`typeprojet_id`),
  KEY `IDX_50159CA98486F9AC` (`adress_id`),
  CONSTRAINT `FK_50159CA98486F9AC` FOREIGN KEY (`adress_id`) REFERENCES `adress` (`id`),
  CONSTRAINT `FK_50159CA9867D6F08` FOREIGN KEY (`projectadmin_id`) REFERENCES `user1` (`id`),
  CONSTRAINT `FK_50159CA9A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user1` (`id`),
  CONSTRAINT `FK_50159CA9E3FEE0EE` FOREIGN KEY (`typeprojet_id`) REFERENCES `type_projet` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projet`
--

LOCK TABLES `projet` WRITE;
/*!40000 ALTER TABLE `projet` DISABLE KEYS */;
INSERT INTO `projet` VALUES (1,2,1,5,NULL,NULL,'projetmutation',1,'fini',NULL),(2,2,1,6,NULL,NULL,'test13',1,'fini',NULL),(3,3,1,5,NULL,'2020-02-03','test2',1,'fini',NULL),(4,3,1,5,NULL,NULL,'test44',1,'reviewed',NULL),(5,3,1,5,NULL,NULL,'toto',1,'reviewed',NULL),(26,2,1,5,NULL,NULL,'sss',1,'reviewed',NULL),(30,3,1,5,NULL,NULL,'zzzz',1,'reviewed',NULL),(31,3,1,5,NULL,NULL,'vvv',1,'reviewed',NULL),(36,2,1,5,NULL,NULL,'ff',1,'reviewed',NULL),(37,2,1,5,NULL,NULL,'vvv',1,'reviewed',NULL),(40,2,1,5,NULL,NULL,'dd',1,'reviewed',NULL),(41,4,1,10,NULL,NULL,'ddddd',2,'draft',NULL),(44,1,NULL,5,NULL,NULL,'test01dd',NULL,'draft',NULL),(45,1,NULL,5,NULL,NULL,'L2FwaS91c2Vycy8x',5,'draft',NULL),(46,1,NULL,6,NULL,NULL,'L2FwaS91c2Vycgggy8x',5,'draft',NULL),(47,1,NULL,5,NULL,NULL,'L2FwaS91c2Vycy8x',5,'draft',NULL),(48,1,NULL,5,NULL,NULL,'L2FwaS91c2Vycy8x',5,'draft',NULL),(49,1,NULL,5,NULL,NULL,'L2FwaS91c2Vycy8x',5,'draft',NULL),(50,1,NULL,5,NULL,NULL,'L2FwaS91c2Vycy8xZnVuY3Rpb24gdG9TdHJpbmcoKSB7CiAgICBbbmF0aXZlIGNvZGVdCn0=',5,'draft',NULL),(51,1,NULL,14,NULL,NULL,'L2FwaS91c2Vycy8xZnVuY3Rpb24gdG9TdHJpbmcoKSB7CiAgICBbbmF0aXZlIGNvZGVdCn0=',5,'draft',NULL),(52,1,NULL,14,NULL,NULL,'L2FwaS91c2Vycy8xZnVuY3Rpb24gdG9TdHJpbmcoKSB7CiAgICBbbmF0aXZlIGNvZGVdCn0=',5,'draft',NULL),(53,1,NULL,13,NULL,NULL,'L2FwaS91c2Vycy8xZnVuY3Rpb24gdG9TdHJpbmcoKSB7CiAgICBbbmF0aXZlIGNvZGVdCn0=',5,'draft',NULL),(54,1,NULL,5,NULL,NULL,'L2FwaS91c2Vycy8xZnVuY3Rpb24gdG9TdHJpbmcoKSB7CiAgICBbbmF0aXZlIGNvZGVdCn0=',5,'draft',NULL),(55,3,NULL,6,NULL,NULL,'Proj-L2FwaS91c2Vycy8zdW5kZWZpbmVk',2,'draft',NULL);
/*!40000 ALTER TABLE `projet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ssmenu`
--

DROP TABLE IF EXISTS `ssmenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ssmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `ssmcod` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ssmlib` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ssmord` int(11) DEFAULT NULL,
  `ssmcom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ssmmaj` datetime DEFAULT NULL,
  `ssmphp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DE47A15CCCD7E912` (`menu_id`),
  CONSTRAINT `FK_DE47A15CCCD7E912` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ssmenu`
--

LOCK TABLES `ssmenu` WRITE;
/*!40000 ALTER TABLE `ssmenu` DISABLE KEYS */;
INSERT INTO `ssmenu` VALUES (1,5,'Adresse','Adresse',3,'2','2020-06-01 13:26:00','recherche'),(3,5,'Coordonéés','Coordonéés',2,'2','2020-06-01 19:09:00','recherche'),(4,1,'L’isolation','L’isolation',3,'3','2020-06-02 09:00:00','cards'),(5,2,'Les Primes Energie','Les Primes Energie',1,'4','2020-06-19 08:15:00','cards'),(6,1,'Les énergies renouvelables','Les énergies renouvelables',2,'3','2020-06-19 12:44:00','cards'),(7,1,'Le chauffage et la régulation','Le chauffage et la régulation',1,'3','2020-06-19 13:19:00','cards'),(8,1,'La ventilation','La ventilation',5,'3','2020-06-19 13:39:00','cards'),(9,4,'Simuler projet','Simuler  projet',4,'2','2020-06-22 07:17:00','form'),(10,5,'Mes Projets','Mes Projets',3,'2','2020-06-28 12:06:00','recherche'),(11,5,'Créer projet','Créer projet',NULL,'2','2020-06-28 13:33:00','form');
/*!40000 ALTER TABLE `ssmenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taille_surface`
--

DROP TABLE IF EXISTS `taille_surface`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taille_surface` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taille_surface`
--

LOCK TABLES `taille_surface` WRITE;
/*!40000 ALTER TABLE `taille_surface` DISABLE KEYS */;
INSERT INTO `taille_surface` VALUES (1,'moins de 30 m',0,30),(2,'entre 30 m et 60 m',31,60),(3,'entre 60 m et 70 m',61,70),(4,'entre 70 m et 90 m',71,90),(5,'entre 110 m et 130 m',111,130),(6,'plus de 130 m',131,500);
/*!40000 ALTER TABLE `taille_surface` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_habitation`
--

DROP TABLE IF EXISTS `type_habitation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_habitation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_habitation`
--

LOCK TABLES `type_habitation` WRITE;
/*!40000 ALTER TABLE `type_habitation` DISABLE KEYS */;
INSERT INTO `type_habitation` VALUES (1,'maison'),(2,'appartement chauffage individuel'),(3,'appartement chauffage collectif');
/*!40000 ALTER TABLE `type_habitation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_message`
--

DROP TABLE IF EXISTS `type_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typemessage` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_message`
--

LOCK TABLES `type_message` WRITE;
/*!40000 ALTER TABLE `type_message` DISABLE KEYS */;
INSERT INTO `type_message` VALUES (1,'sms'),(2,'mail');
/*!40000 ALTER TABLE `type_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_place`
--

DROP TABLE IF EXISTS `type_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_place`
--

LOCK TABLES `type_place` WRITE;
/*!40000 ALTER TABLE `type_place` DISABLE KEYS */;
/*!40000 ALTER TABLE `type_place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_projet`
--

DROP TABLE IF EXISTS `type_projet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_projet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `familleprojet_id` int(11) DEFAULT NULL,
  `contientsuraface` tinyint(1) NOT NULL,
  `priseencharge` double NOT NULL,
  `plafondbool` tinyint(1) NOT NULL,
  `montantplafond` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_73C2F791697F6267` (`familleprojet_id`),
  CONSTRAINT `FK_73C2F791697F6267` FOREIGN KEY (`familleprojet_id`) REFERENCES `famille_projet` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_projet`
--

LOCK TABLES `type_projet` WRITE;
/*!40000 ALTER TABLE `type_projet` DISABLE KEYS */;
INSERT INTO `type_projet` VALUES (5,'Pompe à chaleur eau/eau ou air/eau','La pompe à chaleur eau/eau est un système de chauffage qui utilise la géothermie : elle capte la chaleur contenue dans les sols situés à proximité de votre habitation, pour la restituer dans vos radiateurs basse température ou votre plancher chauffant par un circuit d’eau à l’intérieur. En hiver, la température du sol ne diminue que faiblement par rapport à l’air, ce qui permet une récupération optimale de la chaleur.  La pompe à chaleur air/eau utilise les calories contenues dans l’air ambiant pour chauffer l’eau d’un circuit de chauffage et alimenter les radiateurs et plancher chauffant.',1,0,33,1,2500),(6,'Pompe à chaleur air/air','Les pompes à chaleur air/air n’ont qu’un rôle de chauffage : elles ne produisent pas d’eau chaude sanitaire. Pour cela, elles utilisent les calories contenues dans l’air extérieur pour les restituer en pulsant de l’air chaud dans votre habitation.  Certaines pompes à chaleur air/air sont capables de rafraîchir le logement l’été, ce sont les pompes à chaleur air-air réversibles.  Le mono split ne réchauffe (ou ne rafraîchi) qu’une seule pièce. Elle est constituée d’une unité extérieure (qui absorbe la chaleur de l’air extérieur) et d’une unité intérieure qui la restitue. Le multi split est capa',1,0,33,1,2500),(7,'Appareil indépendant de chauffage au bois','Appareil indépendant de chauffage au bois  L’on classe tout système de chauffage fonctionnant à l’énergie bois, et ce, sous ses différentes formes : granulés, pellets, bûches, bois sous le terme « d’appareil indépendant de chauffage au bois ». Cela correspond ainsi aux poêles à bois, aux foyers fermés, aux cheminées avec insert, ainsi qu’aux cuisinières utilisées comme mode de chauffage.  Grâce au développement de cette source de chaleur et aux progrès techniques, les appareils proposés aujourd’hui sont bien plus simples d’utilisation, plus efficaces du point de vue énergétique et plus fiable',1,0,30,1,4000),(9,'Chaudière biomasse individuelle','Chaudière biomasse individuelle  La chaudière biomasse est un système de chauffage alimenté par des combustibles naturels : granulés, pellets, bûches.  Grâce aux radiateurs auxquels elle est raccordée, la chaudière biomasse chauffe toute la maison dans laquelle elle est installée.  Ce chauffage très efficace avec peu d’émissions de CO2 peut être alimenté soit automatiquement par un système de silo par exemple, soit manuellement de la même façon qu’un poêle à bois.',1,0,30,1,3500),(10,'Chauffe-eau solaire individuel','Le chauffe-eau solaire est un système de production d’eau chaude performant et économique fonctionnant grâce à l’énergie récupérée par des panneaux solaires thermiques. L’énergie solaire ainsi captée est transmise au ballon d’eau chaude par un fluide caloporteur afin de chauffer l’eau chaude sanitaire de l’habitation. Aujourd’hui, selon l’ADEME, environ 100 000 maisons en France sont équipées de ce produit qui permet de couvrir 50 à 70% des besoins en eau chaude d’une famille.',1,0,30,1,4000),(12,'Chauffe-eau thermodynamique à accumulation','Chauffe-eau thermodynamique à accumulation  Un chauffe-eau thermodynamique est composé de deux éléments :      Une pompe à chaleur : qui capte les calories contenues dans l’air et les transforme en énergie pour chauffer l’eau sanitaire,     Un ballon d’eau chaude.  Le COP ou « coefficient de performance énergétique » correspond à l’efficacité du chauffe-eau thermodynamique. En effet, il représente la quantité d’énergie produite par rapport à la quantité d’énergie consommée pour la produire.',1,0,30,1,3800),(13,'Isolation de combles ou de toitures','Isolation de combles ou de toitures  Sachant que 20 à 35 %* de la chaleur s’échappe par le toit et les combles, il est indispensable de les isoler avec soin. C’est en effet le poste de déperdition de chaleur le plus important de la maison.  Deux facteurs permettent d’expliquer ce phénomène :      La chaleur monte et le toit est la dernière barrière avant l’extérieur ;     Le toit est la partie de votre habitation la plus exposée aux variations climatiques.  En privilégiant une isolation de qualité pour vos combles et votre toiture, vos besoins en termes de chauffage l’hiver.',2,1,6.5,0,0),(14,'Isolation des murs','Isolation des murs  20 à 25%* de la chaleur d’une habitation s’échappe par les murs, il s’agit donc de la deuxième source de déperdition énergétique après la toiture. Améliorez les performances énergétiques de votre habitation et économisez jusqu’à 25% d’économies d’énergie grâce à une isolation de qualité.  Isolez en priorité les façades nord et ouest qui sont davantage exposées aux intempéries et au froid. L’isolation des murs par l’extérieur est plus performante que celle par l’intérieur, mais également plus coûteuse.',2,1,7.5,0,0),(15,'Isolation du plancher','Isolation du plancher  Le plancher laisse s’échapper 7 à 10% de la chaleur d’une habitation (source ADEME).',2,1,7.5,0,0),(16,'Isolation des toitures terrasses','Isolation des toitures terrasses  Une toiture-terrasse est un toit plat, par opposition aux traditionnelles toitures en pente. Ce type de toit est de plus en plus utilisé dans les bâtiments contemporains pour son aspect pratique ; votre toiture peut ainsi être aménagée et parfois accueillir des équipements techniques.  Avec 25 à 30% des déperditions thermiques, la toiture est le plus gros poste de déperdition de chaleur d’un logement non isolé. Ainsi, comme pour les toitures traditionnelles en pente, l’isolation de votre toiture en terrasse doit être réalisée avec soin.',2,1,8.5,0,0),(17,'Fenêtre ou porte-fenêtre complète avec vitrage isolant','Fenêtre ou porte-fenêtre complète avec vitrage isolant  Les fenêtres provoquent 10 à 15%* de déperdition de chaleur d’une habitation. L’installation de fenêtres et porte-fenêtres isolantes réduira significativement les déperditions de chaleur provoquées par des fenêtres vétustes et contribuera à l’amélioration de l’efficacité énergétique de votre habitation tout en améliorant les aspects esthétique et acoustique.',2,0,0,0,0),(18,'Chaudière individuelle à haute performance énergétique','Chaudière individuelle à haute performance énergétique  La chaudière à condensation individuelle a une consommation de combustible plus faible que les autres, et ceci grâce à son système de récupération de l’énergie produite par la condensation de la vapeur des gaz de combustion. Cela permet également de réduire les émissions de CO2.  A savoir : Le raccordement de l’évacuation des produits de condensation au réseau d’eaux usées est nécessaire lors de l’installation. La technologie employée permet d’atteindre en conditions optimales des rendements supérieurs à 100%',3,0,30,1,2500),(19,'Radiateurs basse température pour chauffage central','Radiateurs basse température pour chauffage central  Dans un radiateur basse température, l’eau circule en moyenne à 45 - 50°C, au lieu de 70 - 90°C pour un radiateur classique, l’appareil de production de chaleur est donc moins sollicité et consomme alors moins d’énergie.  A savoir : Les radiateurs basse température sont couplés à des systèmes de chauffage central ayant un fonctionnement optimisé à basse température (40/ 50°C) tels que les chaudières à condensation ou les pompes à chaleur. En termes de confort pour l’utilisateur',3,0,30,1,300),(20,'Plancher chauffant hydraulique à basse température','Plancher chauffant hydraulique à basse température  Le plancher chauffant hydraulique à basse température est un système de chauffage par le sol ayant pour principe de faire circuler de l’eau chaude dans des canalisations en matériaux de synthèse ou en cuivre incorporés au plancher. Par la diffusion de sa chaleur, le plancher permet de chauffer tout ou partie de votre habitation, remplaçant ainsi les autres émetteurs de chaleur. Ce réseau est fixé sur une couche d’isolant thermique afin que la chaleur puisse s’échapper vers le haut. Une dalle de béton est ensuite coulée sur le réseau de .',3,0,30,1,3000),(21,'Système de régulation par programmation d’intermittence','Système de régulation par programmation d’intermittence  Un programmateur d’intermittence permet de programmer à l’avance la température de votre logement selon différentes périodes. Cela évite de chauffer des locaux inoccupés.',3,0,30,1,3000),(22,'Régulation par sonde de température extérieure','Régulation par sonde de température extérieure  A savoir : Grâce à ses capteurs, la sonde de température enregistre la température extérieure afin d’anticiper les variations de températures dans la maison. Elle permet ainsi une optimisation du fonctionnement du dispositif de chauffage en fonction de l’information reçue.',3,0,30,1,2500),(23,'Robinet thermostatique','Robinet thermostatique  Les robinets thermostatiques permettent de moduler la température d’un logement en fonction des besoins de ses habitants. Ils peuvent être installés sur chaque radiateur pour gérer la température de manière indépendante dans chaque pièce du logement.  A savoir : Il s’agit d’une régulation d’appoint qui ne peut se substituer à un thermostat, équipement de régulation qui gère le fonctionnement intermittent de la chaudière, modulant la température du logement selon différentes périodes.',3,0,30,1,600),(24,'Système de ventilation double flux autoréglable ou modulé','Système de ventilation double flux autoréglable ou modulé  La VMC, ventilation mécanique contrôlée permet de renouveler l’air à l’intérieur des pièces de votre habitation et d’en assurer la qualité. La VMC double flux fonctionne par extraction et insufflation d’air. Elle extrait de l’air extérieur, neuf mais froid et le réchauffe grâce à la chaleur de l’air « pollué », aspiré dans les pièces de service (cuisine, salle de bain ...) puis l’envoie dans les pièces de confort (chambre, séjour...) de la maison.',4,0,30,1,600),(25,'Ventilation Mécanique Contrôlée simple flux hygroréglable','Ventilation Mécanique Contrôlée simple flux hygroréglable  La VMC, ventilation mécanique contrôlée permet de renouveler l’air à l’intérieur des pièces de votre habitation et d’en assurer la qualité. Les VMC fonctionnent par extraction et par insufflation d’air.  La VMC est dite « simple flux » lorsqu’elle extrait uniquement l’air « pollué » des pièces de service (cuisine, salle de bain ...). L’activité humaine, par la respiration, la transpiration, la cuisine ou les douches, génère de l’humidité, révélatrice de la pollution de votre habitation. C’est sur cet indicateur que se base la.',4,0,30,1,400);
/*!40000 ALTER TABLE `type_projet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user1`
--

DROP TABLE IF EXISTS `user1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appli_id` int(11) DEFAULT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datenaissance` datetime NOT NULL,
  `lieunaissance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apitoken` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8C518555E7927C74` (`email`),
  KEY `IDX_8C5185551DC59C41` (`appli_id`),
  CONSTRAINT `FK_8C5185551DC59C41` FOREIGN KEY (`appli_id`) REFERENCES `appli` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user1`
--

LOCK TABLES `user1` WRITE;
/*!40000 ALTER TABLE `user1` DISABLE KEYS */;
INSERT INTO `user1` VALUES (1,NULL,'admin@admin.com','[\"ROLE_ADMIN\"]','$2y$13$BAqQmxY/i4B6mIKaX5A0Mudy/RSUJe7dPauB0jqT1/bTb4gtEfas2','admin','admin','1597830','2015-05-12 19:15:00','bogota',NULL),(2,NULL,'zetta86@prosacco.org','[\"ROLE_USER\"]','$argon2i$v=19$m=1024,t=2,p=2$Sk52T3FraVF5Qmw3NzBJTQ$ZjjjC0WyC544bKemykxhjT0KcZ8TozAGtF2M2HTjzko','Dr. Suzanne Moen','Cordelia','1-734-948-4191 x945','2015-11-10 04:37:00','South Justus',NULL),(3,NULL,'mwolf@gmail.com','[\"ROLE_USER\"]','$2y$13$BAqQmxY/i4B6mIKaX5A0Mudy/RSUJe7dPauB0jqT1/bTb4gtEfas2','Heloise Littel III','Kaley','972-379-1995 x61054','2015-07-23 23:10:00','New Serenahaven',NULL),(4,NULL,'eno31o5qmu5yziu@pipedream.net','[\"ROLE_USER\"]','$argon2i$v=19$m=1024,t=2,p=2$Sk52T3FraVF5Qmw3NzBJTQ$ZjjjC0WyC544bKemykxhjT0KcZ8TozAGtF2M2HTjzko','Clifford Beier','Brook','946.495.4645 x147','2015-11-19 08:44:00','West Betty',NULL),(5,NULL,'cummings.wilber@barton.com','[\"ROLE_USER\",\"ROLE_ADMIN\"]','$2y$13$BAqQmxY/i4B6mIKaX5A0Mudy/RSUJe7dPauB0jqT1/bTb4gtEfas2','Yoshiko Hayes','Nikko','748-380-5478 x3323','2015-01-12 23:27:00','Port Bradleychester',NULL),(6,NULL,'ledner.bennett@hane.org','[\"ROLE_USER\"]','$argon2i$v=19$m=1024,t=2,p=2$Sk52T3FraVF5Qmw3NzBJTQ$ZjjjC0WyC544bKemykxhjT0KcZ8TozAGtF2M2HTjzko','Ted Gislason','Maynard','606.568.9565','1987-11-11 22:10:55','Deehaven',NULL),(7,NULL,'marta.kulas@yahoo.com','[\"ROLE_USER\"]','$argon2i$v=19$m=1024,t=2,p=2$Sk52T3FraVF5Qmw3NzBJTQ$ZjjjC0WyC544bKemykxhjT0KcZ8TozAGtF2M2HTjzko','Allison Runolfsson','Jon','1-784-809-5865 x55038','1974-01-01 17:42:53','South Jackyland',NULL),(8,NULL,'mosciski.kaylin@sipes.com','[\"ROLE_USER\"]','$argon2i$v=19$m=1024,t=2,p=2$Sk52T3FraVF5Qmw3NzBJTQ$ZjjjC0WyC544bKemykxhjT0KcZ8TozAGtF2M2HTjzko','Lydia Hegmann V','Derick','1-787-466-7509 x424','1989-05-10 11:11:25','East Freddie',NULL),(9,NULL,'dmarvin@hotmail.com','[\"ROLE_USER\"]','$argon2i$v=19$m=1024,t=2,p=2$Sk52T3FraVF5Qmw3NzBJTQ$ZjjjC0WyC544bKemykxhjT0KcZ8TozAGtF2M2HTjzko','Madison Kunze','Geovanny','+1 (270) 243-4161','1972-07-14 05:21:55','West Neva',NULL),(10,NULL,'marvin.zelma@fay.com','[\"ROLE_USER\"]','$argon2i$v=19$m=1024,t=2,p=2$Sk52T3FraVF5Qmw3NzBJTQ$ZjjjC0WyC544bKemykxhjT0KcZ8TozAGtF2M2HTjzko','Mariano Mayert','Jaleel','+1-926-507-6233','1984-04-29 14:57:35','Rempelton',NULL),(11,NULL,'ada.weber@hotmail.com','[\"ROLE_USER\"]','$argon2i$v=19$m=1024,t=2,p=2$Sk52T3FraVF5Qmw3NzBJTQ$ZjjjC0WyC544bKemykxhjT0KcZ8TozAGtF2M2HTjzko','Bessie Roberts','Arnold','759.325.2438 x0381','1993-11-16 10:48:27','Beattychester',NULL),(12,NULL,'test1@aol.com','[]','$2y$13$BAqQmxY/i4B6mIKaX5A0Mudy/RSUJe7dPauB0jqT1/bTb4gtEfas2','toto','toto','0491050505','2015-01-01 00:00:00','bogota',NULL),(13,NULL,'test12@aol.com','[]','$2y$13$ETmI2z2EJab4TO9TG2SRCe79FjbwcRp8x0.Gu7FGcvT7GhSpw9GaW','dd','dddd','0491050505','2015-01-01 00:00:00','bogota',NULL);
/*!40000 ALTER TABLE `user1` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-29 17:04:48
