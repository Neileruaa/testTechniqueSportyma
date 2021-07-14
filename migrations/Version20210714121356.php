<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210714121356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE logo ADD club_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE logo ADD CONSTRAINT FK_E48E9A1361190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E48E9A1361190A32 ON logo (club_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE logo DROP FOREIGN KEY FK_E48E9A1361190A32');
        $this->addSql('DROP INDEX UNIQ_E48E9A1361190A32 ON logo');
        $this->addSql('ALTER TABLE logo DROP club_id');
    }
}
