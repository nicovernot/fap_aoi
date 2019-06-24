<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190624075123 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE appli_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE appli (id INT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE menu ADD appli_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A931DC59C41 FOREIGN KEY (appli_id) REFERENCES appli (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_7D053A931DC59C41 ON menu (appli_id)');
        $this->addSql('ALTER TABLE user1 ADD appli_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user1 ADD CONSTRAINT FK_8C5185551DC59C41 FOREIGN KEY (appli_id) REFERENCES appli (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_8C5185551DC59C41 ON user1 (appli_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE menu DROP CONSTRAINT FK_7D053A931DC59C41');
        $this->addSql('ALTER TABLE "user1" DROP CONSTRAINT FK_8C5185551DC59C41');
        $this->addSql('DROP SEQUENCE appli_id_seq CASCADE');
        $this->addSql('DROP TABLE appli');
        $this->addSql('DROP INDEX IDX_7D053A931DC59C41');
        $this->addSql('ALTER TABLE menu DROP appli_id');
        $this->addSql('DROP INDEX IDX_8C5185551DC59C41');
        $this->addSql('ALTER TABLE "user1" DROP appli_id');
    }
}
