<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210217134145 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE autre_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE centre_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE document_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE entretien_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE personne_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE voiture_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE autre (id INT NOT NULL, rien VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE centre (id INT NOT NULL, nom VARCHAR(255) DEFAULT NULL, adresse VARCHAR(2000) DEFAULT NULL, telephone VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE centre_autre (centre_id INT NOT NULL, autre_id INT NOT NULL, PRIMARY KEY(centre_id, autre_id))');
        $this->addSql('CREATE INDEX IDX_2642EB06463CD7C3 ON centre_autre (centre_id)');
        $this->addSql('CREATE INDEX IDX_2642EB06416A67AB ON centre_autre (autre_id)');
        $this->addSql('CREATE TABLE document (id INT NOT NULL, numero_plaque VARCHAR(7) DEFAULT NULL, numero_vin VARCHAR(50) DEFAULT NULL, puissance_fiscale INT DEFAULT NULL, puissance_max INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE entretien (id INT NOT NULL, voiture_id INT DEFAULT NULL, centre_id INT DEFAULT NULL, date_entretien TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2B58D6DA181A8BA ON entretien (voiture_id)');
        $this->addSql('CREATE INDEX IDX_2B58D6DA463CD7C3 ON entretien (centre_id)');
        $this->addSql('CREATE TABLE personne (id INT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, date_naissance DATE DEFAULT NULL, adresse VARCHAR(2000) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE voiture (id INT NOT NULL, document_id INT DEFAULT NULL, personne_id INT DEFAULT NULL, marque VARCHAR(255) DEFAULT NULL, model VARCHAR(255) DEFAULT NULL, couleur VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E9E2810FC33F7837 ON voiture (document_id)');
        $this->addSql('CREATE INDEX IDX_E9E2810FA21BD112 ON voiture (personne_id)');
        $this->addSql('ALTER TABLE centre_autre ADD CONSTRAINT FK_2642EB06463CD7C3 FOREIGN KEY (centre_id) REFERENCES centre (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE centre_autre ADD CONSTRAINT FK_2642EB06416A67AB FOREIGN KEY (autre_id) REFERENCES autre (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE entretien ADD CONSTRAINT FK_2B58D6DA181A8BA FOREIGN KEY (voiture_id) REFERENCES voiture (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE entretien ADD CONSTRAINT FK_2B58D6DA463CD7C3 FOREIGN KEY (centre_id) REFERENCES centre (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810FC33F7837 FOREIGN KEY (document_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810FA21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE centre_autre DROP CONSTRAINT FK_2642EB06416A67AB');
        $this->addSql('ALTER TABLE centre_autre DROP CONSTRAINT FK_2642EB06463CD7C3');
        $this->addSql('ALTER TABLE entretien DROP CONSTRAINT FK_2B58D6DA463CD7C3');
        $this->addSql('ALTER TABLE voiture DROP CONSTRAINT FK_E9E2810FC33F7837');
        $this->addSql('ALTER TABLE voiture DROP CONSTRAINT FK_E9E2810FA21BD112');
        $this->addSql('ALTER TABLE entretien DROP CONSTRAINT FK_2B58D6DA181A8BA');
        $this->addSql('DROP SEQUENCE autre_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE centre_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE document_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE entretien_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE personne_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE voiture_id_seq CASCADE');
        $this->addSql('DROP TABLE autre');
        $this->addSql('DROP TABLE centre');
        $this->addSql('DROP TABLE centre_autre');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE entretien');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE voiture');
    }
}
