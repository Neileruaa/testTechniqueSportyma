<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210714090400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE logo (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, start DATE NOT NULL, end DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player_season_club (id INT AUTO_INCREMENT NOT NULL, player_id INT NOT NULL, season_id INT NOT NULL, club_id INT DEFAULT NULL, number INT NOT NULL, goals INT NOT NULL, INDEX IDX_66904D7999E6F5DF (player_id), INDEX IDX_66904D794EC001D1 (season_id), INDEX IDX_66904D7961190A32 (club_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, start DATE NOT NULL, end DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE player_season_club ADD CONSTRAINT FK_66904D7999E6F5DF FOREIGN KEY (player_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE player_season_club ADD CONSTRAINT FK_66904D794EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
        $this->addSql('ALTER TABLE player_season_club ADD CONSTRAINT FK_66904D7961190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_season_club DROP FOREIGN KEY FK_66904D7961190A32');
        $this->addSql('ALTER TABLE player_season_club DROP FOREIGN KEY FK_66904D7999E6F5DF');
        $this->addSql('ALTER TABLE player_season_club DROP FOREIGN KEY FK_66904D794EC001D1');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE logo');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE player_season_club');
        $this->addSql('DROP TABLE season');
    }
}
