<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200527093909 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, appli_id INT DEFAULT NULL, mencod VARCHAR(255) DEFAULT NULL, menlib VARCHAR(255) DEFAULT NULL, menord INT DEFAULT NULL, mencom VARCHAR(255) DEFAULT NULL, mendat DATETIME DEFAULT NULL, menphp VARCHAR(255) DEFAULT NULL, mensql VARCHAR(255) DEFAULT NULL, INDEX IDX_7D053A931DC59C41 (appli_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE appli (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user1` (id INT AUTO_INCREMENT NOT NULL, appli_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, datenaissance DATETIME NOT NULL, lieunaissance VARCHAR(255) NOT NULL, apitoken VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8C518555E7927C74 (email), INDEX IDX_8C5185551DC59C41 (appli_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE champ (id INT AUTO_INCREMENT NOT NULL, onglet_id INT DEFAULT NULL, chpcha VARCHAR(255) DEFAULT NULL, chpord INT DEFAULT NULL, chplon INT DEFAULT NULL, chptyp VARCHAR(255) NOT NULL, chpsai INT DEFAULT NULL, chpsel VARCHAR(255) DEFAULT NULL, chprec INT DEFAULT NULL, chplib VARCHAR(255) DEFAULT NULL, INDEX IDX_2F61E0ADBD1A86CC (onglet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adress (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, ville VARCHAR(70) NOT NULL, nrue INT NOT NULL, nomrue VARCHAR(70) NOT NULL, codepostal INT NOT NULL, INDEX IDX_5CECC7BEA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, message LONGTEXT NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message_user (message_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_24064D90537A1329 (message_id), INDEX IDX_24064D90A76ED395 (user_id), PRIMARY KEY(message_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_message (id INT AUTO_INCREMENT NOT NULL, typemessage VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_message_message (type_message_id INT NOT NULL, message_id INT NOT NULL, INDEX IDX_D1019E074E79C50C (type_message_id), INDEX IDX_D1019E07537A1329 (message_id), PRIMARY KEY(type_message_id, message_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ssmenu (id INT AUTO_INCREMENT NOT NULL, menu_id INT NOT NULL, ssmcod VARCHAR(255) DEFAULT NULL, ssmlib VARCHAR(255) DEFAULT NULL, ssmord INT DEFAULT NULL, ssmcom VARCHAR(255) DEFAULT NULL, ssmmaj DATETIME DEFAULT NULL, ssmphp VARCHAR(255) DEFAULT NULL, INDEX IDX_DE47A15CCCD7E912 (menu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE onglet (id INT AUTO_INCREMENT NOT NULL, ssmenu_id INT DEFAULT NULL, ongcod VARCHAR(255) DEFAULT NULL, onglib VARCHAR(255) DEFAULT NULL, ongord INT DEFAULT NULL, onglec INT DEFAULT NULL, ongcre INT DEFAULT NULL, ongupd INT DEFAULT NULL, ongadm INT DEFAULT NULL, ongcom VARCHAR(255) DEFAULT NULL, ongmaj DATETIME DEFAULT NULL, ongphp VARCHAR(255) DEFAULT NULL, ongsql VARCHAR(255) DEFAULT NULL, ongdef INT DEFAULT NULL, ongsqlcre VARCHAR(255) DEFAULT NULL, ongsqlupd VARCHAR(255) DEFAULT NULL, ongsqldel VARCHAR(255) DEFAULT NULL, ongcon INT DEFAULT NULL, INDEX IDX_C6BC02395C434BA1 (ssmenu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, filename VARCHAR(255) NOT NULL, updated DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE magazine (id INT AUTO_INCREMENT NOT NULL, image_id INT NOT NULL, titre VARCHAR(255) NOT NULL, numerosparan INT NOT NULL, presentation VARCHAR(255) NOT NULL, prixann DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_378C2FE43DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A931DC59C41 FOREIGN KEY (appli_id) REFERENCES appli (id)');
        $this->addSql('ALTER TABLE `user1` ADD CONSTRAINT FK_8C5185551DC59C41 FOREIGN KEY (appli_id) REFERENCES appli (id)');
        $this->addSql('ALTER TABLE champ ADD CONSTRAINT FK_2F61E0ADBD1A86CC FOREIGN KEY (onglet_id) REFERENCES onglet (id)');
        $this->addSql('ALTER TABLE adress ADD CONSTRAINT FK_5CECC7BEA76ED395 FOREIGN KEY (user_id) REFERENCES `user1` (id)');
        $this->addSql('ALTER TABLE message_user ADD CONSTRAINT FK_24064D90537A1329 FOREIGN KEY (message_id) REFERENCES message (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message_user ADD CONSTRAINT FK_24064D90A76ED395 FOREIGN KEY (user_id) REFERENCES `user1` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE type_message_message ADD CONSTRAINT FK_D1019E074E79C50C FOREIGN KEY (type_message_id) REFERENCES type_message (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE type_message_message ADD CONSTRAINT FK_D1019E07537A1329 FOREIGN KEY (message_id) REFERENCES message (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ssmenu ADD CONSTRAINT FK_DE47A15CCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE onglet ADD CONSTRAINT FK_C6BC02395C434BA1 FOREIGN KEY (ssmenu_id) REFERENCES ssmenu (id)');
        $this->addSql('ALTER TABLE magazine ADD CONSTRAINT FK_378C2FE43DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ssmenu DROP FOREIGN KEY FK_DE47A15CCCD7E912');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A931DC59C41');
        $this->addSql('ALTER TABLE `user1` DROP FOREIGN KEY FK_8C5185551DC59C41');
        $this->addSql('ALTER TABLE adress DROP FOREIGN KEY FK_5CECC7BEA76ED395');
        $this->addSql('ALTER TABLE message_user DROP FOREIGN KEY FK_24064D90A76ED395');
        $this->addSql('ALTER TABLE message_user DROP FOREIGN KEY FK_24064D90537A1329');
        $this->addSql('ALTER TABLE type_message_message DROP FOREIGN KEY FK_D1019E07537A1329');
        $this->addSql('ALTER TABLE type_message_message DROP FOREIGN KEY FK_D1019E074E79C50C');
        $this->addSql('ALTER TABLE onglet DROP FOREIGN KEY FK_C6BC02395C434BA1');
        $this->addSql('ALTER TABLE champ DROP FOREIGN KEY FK_2F61E0ADBD1A86CC');
        $this->addSql('ALTER TABLE magazine DROP FOREIGN KEY FK_378C2FE43DA5256D');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE appli');
        $this->addSql('DROP TABLE `user1`');
        $this->addSql('DROP TABLE champ');
        $this->addSql('DROP TABLE adress');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE message_user');
        $this->addSql('DROP TABLE type_message');
        $this->addSql('DROP TABLE type_message_message');
        $this->addSql('DROP TABLE ssmenu');
        $this->addSql('DROP TABLE onglet');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE magazine');
    }
}
