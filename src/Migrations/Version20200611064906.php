<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200611064906 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE projet ADD adress_id INT DEFAULT NULL, CHANGE projectadmin_id projectadmin_id INT DEFAULT NULL, CHANGE typeprojet_id typeprojet_id INT DEFAULT NULL, CHANGE place_id place_id INT DEFAULT NULL, CHANGE datedevis datedevis DATE DEFAULT NULL, CHANGE datefacture datefacture DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA98486F9AC FOREIGN KEY (adress_id) REFERENCES adress (id)');
        $this->addSql('CREATE INDEX IDX_50159CA98486F9AC ON projet (adress_id)');
        $this->addSql('ALTER TABLE menu CHANGE appli_id appli_id INT DEFAULT NULL, CHANGE mencod mencod VARCHAR(255) DEFAULT NULL, CHANGE menlib menlib VARCHAR(255) DEFAULT NULL, CHANGE menord menord INT DEFAULT NULL, CHANGE mencom mencom VARCHAR(255) DEFAULT NULL, CHANGE mendat mendat DATETIME DEFAULT NULL, CHANGE menphp menphp VARCHAR(255) DEFAULT NULL, CHANGE mensql mensql VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user1 CHANGE appli_id appli_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL, CHANGE apitoken apitoken VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE champ CHANGE onglet_id onglet_id INT DEFAULT NULL, CHANGE chpcha chpcha VARCHAR(255) DEFAULT NULL, CHANGE chpord chpord INT DEFAULT NULL, CHANGE chplon chplon INT DEFAULT NULL, CHANGE chpsai chpsai INT DEFAULT NULL, CHANGE chpsel chpsel VARCHAR(255) DEFAULT NULL, CHANGE chprec chprec INT DEFAULT NULL, CHANGE chplib chplib VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE adress CHANGE user_id user_id INT DEFAULT NULL, CHANGE energie_id energie_id INT DEFAULT NULL, CHANGE typehabitat_id typehabitat_id INT DEFAULT NULL, CHANGE taillesurface_id taillesurface_id INT DEFAULT NULL, CHANGE departement_id departement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE condition_place CHANGE place_id place_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE message CHANGE projet_id projet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE type_projet CHANGE familleprojet_id familleprojet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE famille_projet CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ssmenu CHANGE ssmcod ssmcod VARCHAR(255) DEFAULT NULL, CHANGE ssmlib ssmlib VARCHAR(255) DEFAULT NULL, CHANGE ssmord ssmord INT DEFAULT NULL, CHANGE ssmcom ssmcom VARCHAR(255) DEFAULT NULL, CHANGE ssmmaj ssmmaj DATETIME DEFAULT NULL, CHANGE ssmphp ssmphp VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE onglet CHANGE ssmenu_id ssmenu_id INT DEFAULT NULL, CHANGE ongcod ongcod VARCHAR(255) DEFAULT NULL, CHANGE onglib onglib VARCHAR(255) DEFAULT NULL, CHANGE ongord ongord INT DEFAULT NULL, CHANGE onglec onglec INT DEFAULT NULL, CHANGE ongcre ongcre INT DEFAULT NULL, CHANGE ongupd ongupd INT DEFAULT NULL, CHANGE ongadm ongadm INT DEFAULT NULL, CHANGE ongcom ongcom VARCHAR(255) DEFAULT NULL, CHANGE ongmaj ongmaj DATETIME DEFAULT NULL, CHANGE ongphp ongphp VARCHAR(255) DEFAULT NULL, CHANGE ongsql ongsql VARCHAR(255) DEFAULT NULL, CHANGE ongdef ongdef INT DEFAULT NULL, CHANGE ongsqlcre ongsqlcre VARCHAR(255) DEFAULT NULL, CHANGE ongsqlupd ongsqlupd VARCHAR(255) DEFAULT NULL, CHANGE ongsqldel ongsqldel VARCHAR(255) DEFAULT NULL, CHANGE ongcon ongcon INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image CHANGE updated updated DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE document CHANGE user_id user_id INT DEFAULT NULL, CHANGE conditionplace_id conditionplace_id INT DEFAULT NULL, CHANGE projet_id projet_id INT DEFAULT NULL, CHANGE fichier fichier VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE place CHANGE typeprojet_id typeprojet_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE adress CHANGE user_id user_id INT DEFAULT NULL, CHANGE energie_id energie_id INT DEFAULT NULL, CHANGE typehabitat_id typehabitat_id INT DEFAULT NULL, CHANGE taillesurface_id taillesurface_id INT DEFAULT NULL, CHANGE departement_id departement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE champ CHANGE onglet_id onglet_id INT DEFAULT NULL, CHANGE chpcha chpcha VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE chpord chpord INT DEFAULT NULL, CHANGE chplon chplon INT DEFAULT NULL, CHANGE chpsai chpsai INT DEFAULT NULL, CHANGE chpsel chpsel VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE chprec chprec INT DEFAULT NULL, CHANGE chplib chplib VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE condition_place CHANGE place_id place_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE document CHANGE user_id user_id INT DEFAULT NULL, CHANGE conditionplace_id conditionplace_id INT DEFAULT NULL, CHANGE projet_id projet_id INT DEFAULT NULL, CHANGE fichier fichier VARCHAR(100) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE famille_projet CHANGE description description VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE image CHANGE updated updated DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE menu CHANGE appli_id appli_id INT DEFAULT NULL, CHANGE mencod mencod VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE menlib menlib VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE menord menord INT DEFAULT NULL, CHANGE mencom mencom VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE mendat mendat DATETIME DEFAULT \'NULL\', CHANGE menphp menphp VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE mensql mensql VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE message CHANGE projet_id projet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE onglet CHANGE ssmenu_id ssmenu_id INT DEFAULT NULL, CHANGE ongcod ongcod VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE onglib onglib VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE ongord ongord INT DEFAULT NULL, CHANGE onglec onglec INT DEFAULT NULL, CHANGE ongcre ongcre INT DEFAULT NULL, CHANGE ongupd ongupd INT DEFAULT NULL, CHANGE ongadm ongadm INT DEFAULT NULL, CHANGE ongcom ongcom VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE ongmaj ongmaj DATETIME DEFAULT \'NULL\', CHANGE ongphp ongphp VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE ongsql ongsql VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE ongdef ongdef INT DEFAULT NULL, CHANGE ongsqlcre ongsqlcre VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE ongsqlupd ongsqlupd VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE ongsqldel ongsqldel VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE ongcon ongcon INT DEFAULT NULL');
        $this->addSql('ALTER TABLE place CHANGE typeprojet_id typeprojet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA98486F9AC');
        $this->addSql('DROP INDEX IDX_50159CA98486F9AC ON projet');
        $this->addSql('ALTER TABLE projet DROP adress_id, CHANGE projectadmin_id projectadmin_id INT DEFAULT NULL, CHANGE typeprojet_id typeprojet_id INT DEFAULT NULL, CHANGE place_id place_id INT DEFAULT NULL, CHANGE datedevis datedevis DATE DEFAULT \'NULL\', CHANGE datefacture datefacture DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE ssmenu CHANGE ssmcod ssmcod VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE ssmlib ssmlib VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE ssmord ssmord INT DEFAULT NULL, CHANGE ssmcom ssmcom VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE ssmmaj ssmmaj DATETIME DEFAULT \'NULL\', CHANGE ssmphp ssmphp VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE type_projet CHANGE familleprojet_id familleprojet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `user1` CHANGE appli_id appli_id INT DEFAULT NULL, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE apitoken apitoken VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`');
    }
}
