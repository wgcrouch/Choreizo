<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131013012244 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE Vote (id INT AUTO_INCREMENT NOT NULL, chore_id INT DEFAULT NULL, user_id INT DEFAULT NULL, positive TINYINT(1) NOT NULL, created DATETIME NOT NULL, INDEX IDX_FA222A5A6C576F80 (chore_id), INDEX IDX_FA222A5AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE Vote ADD CONSTRAINT FK_FA222A5A6C576F80 FOREIGN KEY (chore_id) REFERENCES chore (id)");
        $this->addSql("ALTER TABLE Vote ADD CONSTRAINT FK_FA222A5AA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE Vote");
    }
}
