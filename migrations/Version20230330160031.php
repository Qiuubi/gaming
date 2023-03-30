<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230330160031 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dlc DROP date_start, DROP date_ending');
        $this->addSql('ALTER TABLE game DROP date_start, DROP date_ending');
        $this->addSql('ALTER TABLE session ADD date_start DATE DEFAULT NULL, ADD date_ending DATE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dlc ADD date_start DATE DEFAULT NULL, ADD date_ending DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE game ADD date_start DATE DEFAULT NULL, ADD date_ending DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE session DROP date_start, DROP date_ending');
    }
}
