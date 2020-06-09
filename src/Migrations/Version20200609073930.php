<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200609073930 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE type_place (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, projectadmin_id INT DEFAULT NULL, typeprojet_id INT DEFAULT NULL, place_id INT DEFAULT NULL, datedevis DATE DEFAULT NULL, datefacture DATE DEFAULT NULL, INDEX IDX_50159CA9A76ED395 (user_id), INDEX IDX_50159CA9867D6F08 (projectadmin_id), INDEX IDX_50159CA9E3FEE0EE (typeprojet_id), INDEX IDX_50159CA9DA6A219 (place_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `condition` (id INT AUTO_INCREMENT NOT NULL, place_id INT DEFAULT NULL, nom VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_BDD68843DA6A219 (place_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_projet (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famille_projet (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, conditionplace_id INT DEFAULT NULL, projet_id INT DEFAULT NULL, nom VARCHAR(100) NOT NULL, fichier VARCHAR(100) DEFAULT NULL, valide TINYINT(1) NOT NULL, INDEX IDX_D8698A76A76ED395 (user_id), INDEX IDX_D8698A763D7DF015 (conditionplace_id), INDEX IDX_D8698A76C18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, typeprojet_id INT DEFAULT NULL, nom VARCHAR(100) NOT NULL, INDEX IDX_741D53CDE3FEE0EE (typeprojet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9A76ED395 FOREIGN KEY (user_id) REFERENCES `user1` (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9867D6F08 FOREIGN KEY (projectadmin_id) REFERENCES `user1` (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9E3FEE0EE FOREIGN KEY (typeprojet_id) REFERENCES type_projet (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9DA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE `condition` ADD CONSTRAINT FK_BDD68843DA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76A76ED395 FOREIGN KEY (user_id) REFERENCES `user1` (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A763D7DF015 FOREIGN KEY (conditionplace_id) REFERENCES `condition` (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76C18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CDE3FEE0EE FOREIGN KEY (typeprojet_id) REFERENCES type_projet (id)');
        $this->addSql('ALTER TABLE menu CHANGE appli_id appli_id INT DEFAULT NULL, CHANGE mencod mencod VARCHAR(255) DEFAULT NULL, CHANGE menlib menlib VARCHAR(255) DEFAULT NULL, CHANGE menord menord INT DEFAULT NULL, CHANGE mencom mencom VARCHAR(255) DEFAULT NULL, CHANGE mendat mendat DATETIME DEFAULT NULL, CHANGE menphp menphp VARCHAR(255) DEFAULT NULL, CHANGE mensql mensql VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user1 CHANGE appli_id appli_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL, CHANGE apitoken apitoken VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE champ CHANGE onglet_id onglet_id INT DEFAULT NULL, CHANGE chpcha chpcha VARCHAR(255) DEFAULT NULL, CHANGE chpord chpord INT DEFAULT NULL, CHANGE chplon chplon INT DEFAULT NULL, CHANGE chpsai chpsai INT DEFAULT NULL, CHANGE chpsel chpsel VARCHAR(255) DEFAULT NULL, CHANGE chprec chprec INT DEFAULT NULL, CHANGE chplib chplib VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE adress CHANGE user_id user_id INT DEFAULT NULL, CHANGE energie_id energie_id INT DEFAULT NULL, CHANGE taillesurface_id taillesurface_id INT DEFAULT NULL, CHANGE typehabitation_id typehabitation_id INT DEFAULT NULL, CHANGE dep_id dep_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE message ADD projet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FC18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FC18272 ON message (projet_id)');
        $this->addSql('ALTER TABLE ssmenu CHANGE ssmcod ssmcod VARCHAR(255) DEFAULT NULL, CHANGE ssmlib ssmlib VARCHAR(255) DEFAULT NULL, CHANGE ssmord ssmord INT DEFAULT NULL, CHANGE ssmcom ssmcom VARCHAR(255) DEFAULT NULL, CHANGE ssmmaj ssmmaj DATETIME DEFAULT NULL, CHANGE ssmphp ssmphp VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE onglet CHANGE ssmenu_id ssmenu_id INT DEFAULT NULL, CHANGE ongcod ongcod VARCHAR(255) DEFAULT NULL, CHANGE onglib onglib VARCHAR(255) DEFAULT NULL, CHANGE ongord ongord INT DEFAULT NULL, CHANGE onglec onglec INT DEFAULT NULL, CHANGE ongcre ongcre INT DEFAULT NULL, CHANGE ongupd ongupd INT DEFAULT NULL, CHANGE ongadm ongadm INT DEFAULT NULL, CHANGE ongcom ongcom VARCHAR(255) DEFAULT NULL, CHANGE ongmaj ongmaj DATETIME DEFAULT NULL, CHANGE ongphp ongphp VARCHAR(255) DEFAULT NULL, CHANGE ongsql ongsql VARCHAR(255) DEFAULT NULL, CHANGE ongdef ongdef INT DEFAULT NULL, CHANGE ongsqlcre ongsqlcre VARCHAR(255) DEFAULT NULL, CHANGE ongsqlupd ongsqlupd VARCHAR(255) DEFAULT NULL, CHANGE ongsqldel ongsqldel VARCHAR(255) DEFAULT NULL, CHANGE ongcon ongcon INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image CHANGE updated updated DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FC18272');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A76C18272');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A763D7DF015');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9E3FEE0EE');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CDE3FEE0EE');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9DA6A219');
        $this->addSql('ALTER TABLE `condition` DROP FOREIGN KEY FK_BDD68843DA6A219');
        $this->addSql('DROP TABLE type_place');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE `condition`');
        $this->addSql('DROP TABLE type_projet');
        $this->addSql('DROP TABLE famille_projet');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE place');
        $this->addSql('ALTER TABLE adress CHANGE user_id user_id INT DEFAULT NULL, CHANGE energie_id energie_id INT DEFAULT NULL, CHANGE taillesurface_id taillesurface_id INT DEFAULT NULL, CHANGE typehabitation_id typehabitation_id INT DEFAULT NULL, CHANGE dep_id dep_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE champ CHANGE onglet_id onglet_id INT DEFAULT NULL, CHANGE chpcha chpcha VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE chpord chpord INT DEFAULT NULL, CHANGE chplon chplon INT DEFAULT NULL, CHANGE chpsai chpsai INT DEFAULT NULL, CHANGE chpsel chpsel VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE chprec chprec INT DEFAULT NULL, CHANGE chplib chplib VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE image CHANGE updated updated DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE menu CHANGE appli_id appli_id INT DEFAULT NULL, CHANGE mencod mencod VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE menlib menlib VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE menord menord INT DEFAULT NULL, CHANGE mencom mencom VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE mendat mendat DATETIME DEFAULT \'NULL\', CHANGE menphp menphp VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE mensql mensql VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`');
        $this->addSql('DROP INDEX IDX_B6BD307FC18272 ON message');
        $this->addSql('ALTER TABLE message DROP projet_id');
        $this->addSql('ALTER TABLE onglet CHANGE ssmenu_id ssmenu_id INT DEFAULT NULL, CHANGE ongcod ongcod VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE onglib onglib VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE ongord ongord INT DEFAULT NULL, CHANGE onglec onglec INT DEFAULT NULL, CHANGE ongcre ongcre INT DEFAULT NULL, CHANGE ongupd ongupd INT DEFAULT NULL, CHANGE ongadm ongadm INT DEFAULT NULL, CHANGE ongcom ongcom VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE ongmaj ongmaj DATETIME DEFAULT \'NULL\', CHANGE ongphp ongphp VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE ongsql ongsql VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE ongdef ongdef INT DEFAULT NULL, CHANGE ongsqlcre ongsqlcre VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE ongsqlupd ongsqlupd VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE ongsqldel ongsqldel VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE ongcon ongcon INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ssmenu CHANGE ssmcod ssmcod VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE ssmlib ssmlib VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE ssmord ssmord INT DEFAULT NULL, CHANGE ssmcom ssmcom VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE ssmmaj ssmmaj DATETIME DEFAULT \'NULL\', CHANGE ssmphp ssmphp VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE `user1` CHANGE appli_id appli_id INT DEFAULT NULL, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE apitoken apitoken VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`');
    }
}
