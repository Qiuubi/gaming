<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230302205419 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE game_support (game_id INT NOT NULL, support_id INT NOT NULL, INDEX IDX_15C6948AE48FD905 (game_id), INDEX IDX_15C6948A315B405 (support_id), PRIMARY KEY(game_id, support_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE game_support ADD CONSTRAINT FK_15C6948AE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_support ADD CONSTRAINT FK_15C6948A315B405 FOREIGN KEY (support_id) REFERENCES support (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dlc ADD game_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dlc ADD CONSTRAINT FK_AD6CAEA7E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_AD6CAEA7E48FD905 ON dlc (game_id)');
        $this->addSql('ALTER TABLE equipment ADD category_id INT NOT NULL, ADD carried TINYINT(1) DEFAULT NULL, ADD img VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D58312469DE2 FOREIGN KEY (category_id) REFERENCES equipment_category (id)');
        $this->addSql('CREATE INDEX IDX_D338D58312469DE2 ON equipment (category_id)');
        $this->addSql('ALTER TABLE game ADD editor_id INT NOT NULL, ADD category_id INT NOT NULL, ADD status_id INT NOT NULL');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C6995AC4C FOREIGN KEY (editor_id) REFERENCES editor (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('CREATE INDEX IDX_232B318C6995AC4C ON game (editor_id)');
        $this->addSql('CREATE INDEX IDX_232B318C12469DE2 ON game (category_id)');
        $this->addSql('CREATE INDEX IDX_232B318C6BF700BD ON game (status_id)');
        $this->addSql('ALTER TABLE job ADD characterr_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F87FB3694D FOREIGN KEY (characterr_id) REFERENCES `character` (id)');
        $this->addSql('CREATE INDEX IDX_FBD8E0F87FB3694D ON job (characterr_id)');
        $this->addSql('ALTER TABLE quest ADD game_id INT DEFAULT NULL, ADD status_id INT NOT NULL');
        $this->addSql('ALTER TABLE quest ADD CONSTRAINT FK_4317F817E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE quest ADD CONSTRAINT FK_4317F8176BF700BD FOREIGN KEY (status_id) REFERENCES quest_status (id)');
        $this->addSql('CREATE INDEX IDX_4317F817E48FD905 ON quest (game_id)');
        $this->addSql('CREATE INDEX IDX_4317F8176BF700BD ON quest (status_id)');
        $this->addSql('ALTER TABLE skill ADD characterr_id INT NOT NULL, ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE4777FB3694D FOREIGN KEY (characterr_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE47712469DE2 FOREIGN KEY (category_id) REFERENCES skill_category (id)');
        $this->addSql('CREATE INDEX IDX_5E3DE4777FB3694D ON skill (characterr_id)');
        $this->addSql('CREATE INDEX IDX_5E3DE47712469DE2 ON skill (category_id)');
        $this->addSql('ALTER TABLE weapon ADD characterr_id INT DEFAULT NULL, ADD img VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE weapon ADD CONSTRAINT FK_6933A7E67FB3694D FOREIGN KEY (characterr_id) REFERENCES `character` (id)');
        $this->addSql('CREATE INDEX IDX_6933A7E67FB3694D ON weapon (characterr_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game_support DROP FOREIGN KEY FK_15C6948AE48FD905');
        $this->addSql('ALTER TABLE game_support DROP FOREIGN KEY FK_15C6948A315B405');
        $this->addSql('DROP TABLE game_support');
        $this->addSql('ALTER TABLE dlc DROP FOREIGN KEY FK_AD6CAEA7E48FD905');
        $this->addSql('DROP INDEX IDX_AD6CAEA7E48FD905 ON dlc');
        $this->addSql('ALTER TABLE dlc DROP game_id');
        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D58312469DE2');
        $this->addSql('DROP INDEX IDX_D338D58312469DE2 ON equipment');
        $this->addSql('ALTER TABLE equipment DROP category_id, DROP carried, DROP img');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C6995AC4C');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C12469DE2');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C6BF700BD');
        $this->addSql('DROP INDEX IDX_232B318C6995AC4C ON game');
        $this->addSql('DROP INDEX IDX_232B318C12469DE2 ON game');
        $this->addSql('DROP INDEX IDX_232B318C6BF700BD ON game');
        $this->addSql('ALTER TABLE game DROP editor_id, DROP category_id, DROP status_id');
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F87FB3694D');
        $this->addSql('DROP INDEX IDX_FBD8E0F87FB3694D ON job');
        $this->addSql('ALTER TABLE job DROP characterr_id');
        $this->addSql('ALTER TABLE quest DROP FOREIGN KEY FK_4317F817E48FD905');
        $this->addSql('ALTER TABLE quest DROP FOREIGN KEY FK_4317F8176BF700BD');
        $this->addSql('DROP INDEX IDX_4317F817E48FD905 ON quest');
        $this->addSql('DROP INDEX IDX_4317F8176BF700BD ON quest');
        $this->addSql('ALTER TABLE quest DROP game_id, DROP status_id');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE4777FB3694D');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE47712469DE2');
        $this->addSql('DROP INDEX IDX_5E3DE4777FB3694D ON skill');
        $this->addSql('DROP INDEX IDX_5E3DE47712469DE2 ON skill');
        $this->addSql('ALTER TABLE skill DROP characterr_id, DROP category_id');
        $this->addSql('ALTER TABLE weapon DROP FOREIGN KEY FK_6933A7E67FB3694D');
        $this->addSql('DROP INDEX IDX_6933A7E67FB3694D ON weapon');
        $this->addSql('ALTER TABLE weapon DROP characterr_id, DROP img');
    }
}
