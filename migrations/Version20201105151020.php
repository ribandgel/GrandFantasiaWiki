<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201105151020 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chest (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_class (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, item_category_id INT DEFAULT NULL, weapon_set_id INT DEFAULT NULL, stats_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, icon VARCHAR(255) DEFAULT NULL, tradable TINYINT(1) NOT NULL, usable TINYINT(1) NOT NULL, level INT DEFAULT NULL, INDEX IDX_1F1B251EF22EC5D4 (item_category_id), INDEX IDX_1F1B251E2D0E223F (weapon_set_id), UNIQUE INDEX UNIQ_1F1B251E70AA3482 (stats_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_game_class (item_id INT NOT NULL, game_class_id INT NOT NULL, INDEX IDX_62C9481A126F525E (item_id), INDEX IDX_62C9481A4144F436 (game_class_id), PRIMARY KEY(item_id, game_class_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_monster (item_id INT NOT NULL, monster_id INT NOT NULL, INDEX IDX_2F03E0A0126F525E (item_id), INDEX IDX_2F03E0A0C5FF1223 (monster_id), PRIMARY KEY(item_id, monster_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_chest (item_id INT NOT NULL, chest_id INT NOT NULL, INDEX IDX_D1E3A867126F525E (item_id), INDEX IDX_D1E3A867180955AC (chest_id), PRIMARY KEY(item_id, chest_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_pnj (item_id INT NOT NULL, pnj_id INT NOT NULL, INDEX IDX_1ABC041F126F525E (item_id), INDEX IDX_1ABC041F51796E0B (pnj_id), PRIMARY KEY(item_id, pnj_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_quest (item_id INT NOT NULL, quest_id INT NOT NULL, INDEX IDX_69B0E3C7126F525E (item_id), INDEX IDX_69B0E3C7209E9EF4 (quest_id), PRIMARY KEY(item_id, quest_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_item (item_source INT NOT NULL, item_target INT NOT NULL, INDEX IDX_D72B61E5D9730ABC (item_source), INDEX IDX_D72B61E5C0965A33 (item_target), PRIMARY KEY(item_source, item_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, p_nj_id INT DEFAULT NULL, map_name VARCHAR(255) NOT NULL, x DOUBLE PRECISION NOT NULL, y DOUBLE PRECISION NOT NULL, respawn_time VARCHAR(255) DEFAULT NULL COMMENT \'(DC2Type:dateinterval)\', INDEX IDX_5E9E89CB6745771E (p_nj_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monster (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, level INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monster_location (monster_id INT NOT NULL, location_id INT NOT NULL, INDEX IDX_E85AC547C5FF1223 (monster_id), INDEX IDX_E85AC54764D218E (location_id), PRIMARY KEY(monster_id, location_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pnj (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quest (id INT AUTO_INCREMENT NOT NULL, accept_id INT DEFAULT NULL, finish_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, level INT NOT NULL, rewards_label VARCHAR(255) NOT NULL, exp_reward BIGINT DEFAULT NULL, gold_reward INT DEFAULT NULL, requierement_level SMALLINT NOT NULL, UNIQUE INDEX UNIQ_4317F817959D25A6 (accept_id), UNIQUE INDEX UNIQ_4317F8172B4667EB (finish_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quest_quest (quest_source INT NOT NULL, quest_target INT NOT NULL, INDEX IDX_10AA618BA6601D85 (quest_source), INDEX IDX_10AA618BBF854D0A (quest_target), PRIMARY KEY(quest_source, quest_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quest_description (id INT AUTO_INCREMENT NOT NULL, pnj_id INT DEFAULT NULL, description LONGTEXT NOT NULL, INDEX IDX_5AB4D5D151796E0B (pnj_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `set` (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stats (id INT AUTO_INCREMENT NOT NULL, effects LONGTEXT DEFAULT NULL, sprite_name VARCHAR(255) DEFAULT NULL, sprite_description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stats_line (id INT AUTO_INCREMENT NOT NULL, stats_id INT NOT NULL, label VARCHAR(255) NOT NULL, value DOUBLE PRECISION NOT NULL, INDEX IDX_9078DCB670AA3482 (stats_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE talent_combination (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251EF22EC5D4 FOREIGN KEY (item_category_id) REFERENCES item_category (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E2D0E223F FOREIGN KEY (weapon_set_id) REFERENCES `set` (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E70AA3482 FOREIGN KEY (stats_id) REFERENCES stats (id)');
        $this->addSql('ALTER TABLE item_game_class ADD CONSTRAINT FK_62C9481A126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_game_class ADD CONSTRAINT FK_62C9481A4144F436 FOREIGN KEY (game_class_id) REFERENCES game_class (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_monster ADD CONSTRAINT FK_2F03E0A0126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_monster ADD CONSTRAINT FK_2F03E0A0C5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_chest ADD CONSTRAINT FK_D1E3A867126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_chest ADD CONSTRAINT FK_D1E3A867180955AC FOREIGN KEY (chest_id) REFERENCES chest (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_pnj ADD CONSTRAINT FK_1ABC041F126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_pnj ADD CONSTRAINT FK_1ABC041F51796E0B FOREIGN KEY (pnj_id) REFERENCES pnj (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_quest ADD CONSTRAINT FK_69B0E3C7126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_quest ADD CONSTRAINT FK_69B0E3C7209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_item ADD CONSTRAINT FK_D72B61E5D9730ABC FOREIGN KEY (item_source) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_item ADD CONSTRAINT FK_D72B61E5C0965A33 FOREIGN KEY (item_target) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB6745771E FOREIGN KEY (p_nj_id) REFERENCES pnj (id)');
        $this->addSql('ALTER TABLE monster_location ADD CONSTRAINT FK_E85AC547C5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE monster_location ADD CONSTRAINT FK_E85AC54764D218E FOREIGN KEY (location_id) REFERENCES location (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quest ADD CONSTRAINT FK_4317F817959D25A6 FOREIGN KEY (accept_id) REFERENCES quest_description (id)');
        $this->addSql('ALTER TABLE quest ADD CONSTRAINT FK_4317F8172B4667EB FOREIGN KEY (finish_id) REFERENCES quest_description (id)');
        $this->addSql('ALTER TABLE quest_quest ADD CONSTRAINT FK_10AA618BA6601D85 FOREIGN KEY (quest_source) REFERENCES quest (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quest_quest ADD CONSTRAINT FK_10AA618BBF854D0A FOREIGN KEY (quest_target) REFERENCES quest (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quest_description ADD CONSTRAINT FK_5AB4D5D151796E0B FOREIGN KEY (pnj_id) REFERENCES pnj (id)');
        $this->addSql('ALTER TABLE stats_line ADD CONSTRAINT FK_9078DCB670AA3482 FOREIGN KEY (stats_id) REFERENCES stats (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item_chest DROP FOREIGN KEY FK_D1E3A867180955AC');
        $this->addSql('ALTER TABLE item_game_class DROP FOREIGN KEY FK_62C9481A4144F436');
        $this->addSql('ALTER TABLE item_game_class DROP FOREIGN KEY FK_62C9481A126F525E');
        $this->addSql('ALTER TABLE item_monster DROP FOREIGN KEY FK_2F03E0A0126F525E');
        $this->addSql('ALTER TABLE item_chest DROP FOREIGN KEY FK_D1E3A867126F525E');
        $this->addSql('ALTER TABLE item_pnj DROP FOREIGN KEY FK_1ABC041F126F525E');
        $this->addSql('ALTER TABLE item_quest DROP FOREIGN KEY FK_69B0E3C7126F525E');
        $this->addSql('ALTER TABLE item_item DROP FOREIGN KEY FK_D72B61E5D9730ABC');
        $this->addSql('ALTER TABLE item_item DROP FOREIGN KEY FK_D72B61E5C0965A33');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251EF22EC5D4');
        $this->addSql('ALTER TABLE monster_location DROP FOREIGN KEY FK_E85AC54764D218E');
        $this->addSql('ALTER TABLE item_monster DROP FOREIGN KEY FK_2F03E0A0C5FF1223');
        $this->addSql('ALTER TABLE monster_location DROP FOREIGN KEY FK_E85AC547C5FF1223');
        $this->addSql('ALTER TABLE item_pnj DROP FOREIGN KEY FK_1ABC041F51796E0B');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CB6745771E');
        $this->addSql('ALTER TABLE quest_description DROP FOREIGN KEY FK_5AB4D5D151796E0B');
        $this->addSql('ALTER TABLE item_quest DROP FOREIGN KEY FK_69B0E3C7209E9EF4');
        $this->addSql('ALTER TABLE quest_quest DROP FOREIGN KEY FK_10AA618BA6601D85');
        $this->addSql('ALTER TABLE quest_quest DROP FOREIGN KEY FK_10AA618BBF854D0A');
        $this->addSql('ALTER TABLE quest DROP FOREIGN KEY FK_4317F817959D25A6');
        $this->addSql('ALTER TABLE quest DROP FOREIGN KEY FK_4317F8172B4667EB');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E2D0E223F');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E70AA3482');
        $this->addSql('ALTER TABLE stats_line DROP FOREIGN KEY FK_9078DCB670AA3482');
        $this->addSql('DROP TABLE chest');
        $this->addSql('DROP TABLE game_class');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE item_game_class');
        $this->addSql('DROP TABLE item_monster');
        $this->addSql('DROP TABLE item_chest');
        $this->addSql('DROP TABLE item_pnj');
        $this->addSql('DROP TABLE item_quest');
        $this->addSql('DROP TABLE item_item');
        $this->addSql('DROP TABLE item_category');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE monster');
        $this->addSql('DROP TABLE monster_location');
        $this->addSql('DROP TABLE pnj');
        $this->addSql('DROP TABLE quest');
        $this->addSql('DROP TABLE quest_quest');
        $this->addSql('DROP TABLE quest_description');
        $this->addSql('DROP TABLE `set`');
        $this->addSql('DROP TABLE stats');
        $this->addSql('DROP TABLE stats_line');
        $this->addSql('DROP TABLE talent_combination');
        $this->addSql('DROP TABLE user');
    }
}
