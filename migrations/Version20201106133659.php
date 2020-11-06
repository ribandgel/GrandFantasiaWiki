<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201106133659 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quest DROP FOREIGN KEY FK_4317F8172B4667EB');
        $this->addSql('ALTER TABLE quest DROP FOREIGN KEY FK_4317F817959D25A6');
        $this->addSql('DROP TABLE quest_description');
        $this->addSql('DROP INDEX UNIQ_4317F8172B4667EB ON quest');
        $this->addSql('DROP INDEX UNIQ_4317F817959D25A6 ON quest');
        $this->addSql('ALTER TABLE quest ADD accept_pnj_id INT NOT NULL, ADD finish_pnj_id INT NOT NULL, ADD accept_description LONGTEXT NOT NULL, ADD finish_description LONGTEXT NOT NULL, DROP accept_id, DROP finish_id');
        $this->addSql('ALTER TABLE quest ADD CONSTRAINT FK_4317F81790BACEE5 FOREIGN KEY (accept_pnj_id) REFERENCES pnj (id)');
        $this->addSql('ALTER TABLE quest ADD CONSTRAINT FK_4317F817C4CF95F4 FOREIGN KEY (finish_pnj_id) REFERENCES pnj (id)');
        $this->addSql('CREATE INDEX IDX_4317F81790BACEE5 ON quest (accept_pnj_id)');
        $this->addSql('CREATE INDEX IDX_4317F817C4CF95F4 ON quest (finish_pnj_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE quest_description (id INT AUTO_INCREMENT NOT NULL, pnj_id INT DEFAULT NULL, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_5AB4D5D151796E0B (pnj_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE quest_description ADD CONSTRAINT FK_5AB4D5D151796E0B FOREIGN KEY (pnj_id) REFERENCES pnj (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE quest DROP FOREIGN KEY FK_4317F81790BACEE5');
        $this->addSql('ALTER TABLE quest DROP FOREIGN KEY FK_4317F817C4CF95F4');
        $this->addSql('DROP INDEX IDX_4317F81790BACEE5 ON quest');
        $this->addSql('DROP INDEX IDX_4317F817C4CF95F4 ON quest');
        $this->addSql('ALTER TABLE quest ADD accept_id INT DEFAULT NULL, ADD finish_id INT DEFAULT NULL, DROP accept_pnj_id, DROP finish_pnj_id, DROP accept_description, DROP finish_description');
        $this->addSql('ALTER TABLE quest ADD CONSTRAINT FK_4317F8172B4667EB FOREIGN KEY (finish_id) REFERENCES quest_description (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE quest ADD CONSTRAINT FK_4317F817959D25A6 FOREIGN KEY (accept_id) REFERENCES quest_description (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4317F8172B4667EB ON quest (finish_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4317F817959D25A6 ON quest (accept_id)');
    }
}
