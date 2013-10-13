<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131013074953 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE fine (id INT AUTO_INCREMENT NOT NULL, source_user_id INT DEFAULT NULL, target_user_id INT DEFAULT NULL, transaction_id INT DEFAULT NULL, chore_id INT DEFAULT NULL, amount INT NOT NULL, settled TINYINT(1) NOT NULL, created DATETIME NOT NULL, INDEX IDX_1E9BFBACEEB16BFD (source_user_id), INDEX IDX_1E9BFBAC6C066AFE (target_user_id), INDEX IDX_1E9BFBAC2FC0CB0F (transaction_id), INDEX IDX_1E9BFBAC6C576F80 (chore_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, amount INT NOT NULL, created DATETIME NOT NULL, processed DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE fine ADD CONSTRAINT FK_1E9BFBACEEB16BFD FOREIGN KEY (source_user_id) REFERENCES fos_user (id)");
        $this->addSql("ALTER TABLE fine ADD CONSTRAINT FK_1E9BFBAC6C066AFE FOREIGN KEY (target_user_id) REFERENCES fos_user (id)");
        $this->addSql("ALTER TABLE fine ADD CONSTRAINT FK_1E9BFBAC2FC0CB0F FOREIGN KEY (transaction_id) REFERENCES Transaction (id)");
        $this->addSql("ALTER TABLE fine ADD CONSTRAINT FK_1E9BFBAC6C576F80 FOREIGN KEY (chore_id) REFERENCES chore (id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE fine DROP FOREIGN KEY FK_1E9BFBAC2FC0CB0F");
        $this->addSql("DROP TABLE fine");
        $this->addSql("DROP TABLE transaction");
    }
}
