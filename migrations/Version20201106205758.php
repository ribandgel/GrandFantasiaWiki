<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201106205758 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE talent_combination_item (talent_combination_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_B36CF45BF68FC0E0 (talent_combination_id), INDEX IDX_B36CF45B126F525E (item_id), PRIMARY KEY(talent_combination_id, item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE talent_combination_item ADD CONSTRAINT FK_B36CF45BF68FC0E0 FOREIGN KEY (talent_combination_id) REFERENCES talent_combination (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE talent_combination_item ADD CONSTRAINT FK_B36CF45B126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stats ADD item_id INT NOT NULL');
        $this->addSql('ALTER TABLE stats ADD CONSTRAINT FK_574767AA126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_574767AA126F525E ON stats (item_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE talent_combination_item');
        $this->addSql('ALTER TABLE stats DROP FOREIGN KEY FK_574767AA126F525E');
        $this->addSql('DROP INDEX UNIQ_574767AA126F525E ON stats');
        $this->addSql('ALTER TABLE stats DROP item_id');
    }
}
