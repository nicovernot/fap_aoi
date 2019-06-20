<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190618070802 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE magazine_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE image_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE menu_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE onglet_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE type_message_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user1_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE champ_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE ssmenu_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE message_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE abonnement_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE magazine (id INT NOT NULL, image_id INT NOT NULL, titre VARCHAR(255) NOT NULL, numerosparan INT NOT NULL, presentation VARCHAR(255) NOT NULL, prixann DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_378C2FE43DA5256D ON magazine (image_id)');
        $this->addSql('CREATE TABLE image (id INT NOT NULL, filename VARCHAR(255) NOT NULL, updated TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE menu (id INT NOT NULL, mencod VARCHAR(255) DEFAULT NULL, menlib VARCHAR(255) DEFAULT NULL, menord INT DEFAULT NULL, mencom VARCHAR(255) DEFAULT NULL, mendat TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, menphp VARCHAR(255) DEFAULT NULL, mensql VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE onglet (id INT NOT NULL, ssmenu_id INT DEFAULT NULL, ongcod VARCHAR(255) DEFAULT NULL, onglib VARCHAR(255) DEFAULT NULL, ongord INT DEFAULT NULL, onglec INT DEFAULT NULL, ongcre INT DEFAULT NULL, ongupd INT DEFAULT NULL, ongadm INT DEFAULT NULL, ongcom VARCHAR(255) DEFAULT NULL, ongmaj TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, ongphp VARCHAR(255) DEFAULT NULL, ongsql VARCHAR(255) DEFAULT NULL, ongdef INT DEFAULT NULL, ongsqlcre VARCHAR(255) DEFAULT NULL, ongsqlupd VARCHAR(255) DEFAULT NULL, ongsqldel VARCHAR(255) DEFAULT NULL, ongcon INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C6BC02395C434BA1 ON onglet (ssmenu_id)');
        $this->addSql('CREATE TABLE type_message (id INT NOT NULL, typemessage VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user1" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, date_naissance TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, lieu_naissance VARCHAR(255) NOT NULL, rue VARCHAR(255) NOT NULL, numero_rue INT NOT NULL, ville VARCHAR(255) NOT NULL, codepostal INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8C518555E7927C74 ON "user1" (email)');
        $this->addSql('CREATE TABLE champ (id INT NOT NULL, onglet_id INT DEFAULT NULL, chpcha VARCHAR(255) DEFAULT NULL, chpord INT DEFAULT NULL, chplon INT DEFAULT NULL, chptyp VARCHAR(255) NOT NULL, chpsai INT DEFAULT NULL, chpsel VARCHAR(255) DEFAULT NULL, chprec INT DEFAULT NULL, chplib VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2F61E0ADBD1A86CC ON champ (onglet_id)');
        $this->addSql('CREATE TABLE ssmenu (id INT NOT NULL, menu_id INT NOT NULL, ssmcod VARCHAR(255) DEFAULT NULL, ssmlib VARCHAR(255) DEFAULT NULL, ssmord INT DEFAULT NULL, ssmcom VARCHAR(255) DEFAULT NULL, ssmmaj TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, ssmphp VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DE47A15CCCD7E912 ON ssmenu (menu_id)');
        $this->addSql('CREATE TABLE message (id INT NOT NULL, typemessage_id INT NOT NULL, message TEXT NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B6BD307FAA20F324 ON message (typemessage_id)');
        $this->addSql('CREATE TABLE message_user (message_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(message_id, user_id))');
        $this->addSql('CREATE INDEX IDX_24064D90537A1329 ON message_user (message_id)');
        $this->addSql('CREATE INDEX IDX_24064D90A76ED395 ON message_user (user_id)');
        $this->addSql('CREATE TABLE abonnement (id INT NOT NULL, client_id INT NOT NULL, magazine_id INT NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_351268BB19EB6921 ON abonnement (client_id)');
        $this->addSql('CREATE INDEX IDX_351268BB3EB84A1D ON abonnement (magazine_id)');
        $this->addSql('ALTER TABLE magazine ADD CONSTRAINT FK_378C2FE43DA5256D FOREIGN KEY (image_id) REFERENCES image (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE onglet ADD CONSTRAINT FK_C6BC02395C434BA1 FOREIGN KEY (ssmenu_id) REFERENCES ssmenu (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE champ ADD CONSTRAINT FK_2F61E0ADBD1A86CC FOREIGN KEY (onglet_id) REFERENCES onglet (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ssmenu ADD CONSTRAINT FK_DE47A15CCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FAA20F324 FOREIGN KEY (typemessage_id) REFERENCES type_message (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE message_user ADD CONSTRAINT FK_24064D90537A1329 FOREIGN KEY (message_id) REFERENCES message (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE message_user ADD CONSTRAINT FK_24064D90A76ED395 FOREIGN KEY (user_id) REFERENCES "user1" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BB19EB6921 FOREIGN KEY (client_id) REFERENCES "user1" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BB3EB84A1D FOREIGN KEY (magazine_id) REFERENCES magazine (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE abonnement DROP CONSTRAINT FK_351268BB3EB84A1D');
        $this->addSql('ALTER TABLE magazine DROP CONSTRAINT FK_378C2FE43DA5256D');
        $this->addSql('ALTER TABLE ssmenu DROP CONSTRAINT FK_DE47A15CCCD7E912');
        $this->addSql('ALTER TABLE champ DROP CONSTRAINT FK_2F61E0ADBD1A86CC');
        $this->addSql('ALTER TABLE message DROP CONSTRAINT FK_B6BD307FAA20F324');
        $this->addSql('ALTER TABLE message_user DROP CONSTRAINT FK_24064D90A76ED395');
        $this->addSql('ALTER TABLE abonnement DROP CONSTRAINT FK_351268BB19EB6921');
        $this->addSql('ALTER TABLE onglet DROP CONSTRAINT FK_C6BC02395C434BA1');
        $this->addSql('ALTER TABLE message_user DROP CONSTRAINT FK_24064D90537A1329');
        $this->addSql('DROP SEQUENCE magazine_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE image_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE menu_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE onglet_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_message_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user1_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE champ_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE ssmenu_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE message_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE abonnement_id_seq CASCADE');
        $this->addSql('DROP TABLE magazine');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE onglet');
        $this->addSql('DROP TABLE type_message');
        $this->addSql('DROP TABLE "user1"');
        $this->addSql('DROP TABLE champ');
        $this->addSql('DROP TABLE ssmenu');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE message_user');
        $this->addSql('DROP TABLE abonnement');
    }
}
