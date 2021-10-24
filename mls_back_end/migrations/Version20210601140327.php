<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210601140327 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tutorial_sub_domain (tutorial_id INT NOT NULL, sub_domain_id INT NOT NULL, PRIMARY KEY(tutorial_id, sub_domain_id))');
        $this->addSql('CREATE INDEX IDX_A973BAC089366B7B ON tutorial_sub_domain (tutorial_id)');
        $this->addSql('CREATE INDEX IDX_A973BAC0352485B ON tutorial_sub_domain (sub_domain_id)');
        $this->addSql('ALTER TABLE tutorial_sub_domain ADD CONSTRAINT FK_A973BAC089366B7B FOREIGN KEY (tutorial_id) REFERENCES "tutorial" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tutorial_sub_domain ADD CONSTRAINT FK_A973BAC0352485B FOREIGN KEY (sub_domain_id) REFERENCES sub_domain (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE tutorial_sub_domain');
    }
}
