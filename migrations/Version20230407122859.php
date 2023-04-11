<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230407122859 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE session_quest (id INT AUTO_INCREMENT NOT NULL, status_id INT DEFAULT NULL, quest_id INT DEFAULT NULL, session_id INT DEFAULT NULL, name VARCHAR(128) NOT NULL, date_start DATE DEFAULT NULL, date_ending DATE DEFAULT NULL, unlocked TINYINT(1) NOT NULL, notes LONGTEXT DEFAULT NULL, INDEX IDX_986A40C16BF700BD (status_id), INDEX IDX_986A40C1209E9EF4 (quest_id), INDEX IDX_986A40C1613FECDF (session_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE session_quest ADD CONSTRAINT FK_986A40C16BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE session_quest ADD CONSTRAINT FK_986A40C1209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id)');
        $this->addSql('ALTER TABLE session_quest ADD CONSTRAINT FK_986A40C1613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE session_detail DROP FOREIGN KEY FK_416D75CA6BF700BD');
        $this->addSql('ALTER TABLE session_detail DROP FOREIGN KEY FK_416D75CA613FECDF');
        $this->addSql('ALTER TABLE session_detail DROP FOREIGN KEY FK_416D75CA209E9EF4');
        $this->addSql('DROP TABLE session_detail');
        $this->addSql('ALTER TABLE quest DROP unlocked');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE session_detail (id INT AUTO_INCREMENT NOT NULL, status_id INT DEFAULT NULL, quest_id INT DEFAULT NULL, session_id INT DEFAULT NULL, name VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_start DATE DEFAULT NULL, date_ending DATE DEFAULT NULL, unlocked TINYINT(1) NOT NULL, notes LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_416D75CA6BF700BD (status_id), INDEX IDX_416D75CA209E9EF4 (quest_id), INDEX IDX_416D75CA613FECDF (session_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE session_detail ADD CONSTRAINT FK_416D75CA6BF700BD FOREIGN KEY (status_id) REFERENCES status (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE session_detail ADD CONSTRAINT FK_416D75CA613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE session_detail ADD CONSTRAINT FK_416D75CA209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE session_quest DROP FOREIGN KEY FK_986A40C16BF700BD');
        $this->addSql('ALTER TABLE session_quest DROP FOREIGN KEY FK_986A40C1209E9EF4');
        $this->addSql('ALTER TABLE session_quest DROP FOREIGN KEY FK_986A40C1613FECDF');
        $this->addSql('DROP TABLE session_quest');
        $this->addSql('ALTER TABLE quest ADD unlocked TINYINT(1) DEFAULT NULL');
    }
}
