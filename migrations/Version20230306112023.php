<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230306112023 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE difficulty (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(128) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, game_id INT NOT NULL, name VARCHAR(128) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_D044D5D4E48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_character (session_id INT NOT NULL, character_id INT NOT NULL, INDEX IDX_D098F53E613FECDF (session_id), INDEX IDX_D098F53E1136BE75 (character_id), PRIMARY KEY(session_id, character_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE session_character ADD CONSTRAINT FK_D098F53E613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_character ADD CONSTRAINT FK_D098F53E1136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game ADD is_finished TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4E48FD905');
        $this->addSql('ALTER TABLE session_character DROP FOREIGN KEY FK_D098F53E613FECDF');
        $this->addSql('ALTER TABLE session_character DROP FOREIGN KEY FK_D098F53E1136BE75');
        $this->addSql('DROP TABLE difficulty');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE session_character');
        $this->addSql('ALTER TABLE game DROP is_finished');
    }
}
