<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131012225731 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE fos_user ADD habitat_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE fos_user ADD CONSTRAINT FK_957A6479AFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id)");
        $this->addSql("CREATE INDEX IDX_957A6479AFFE2D26 ON fos_user (habitat_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE fos_user DROP FOREIGN KEY FK_957A6479AFFE2D26");
        $this->addSql("DROP INDEX IDX_957A6479AFFE2D26 ON fos_user");
        $this->addSql("ALTER TABLE fos_user DROP habitat_id");
    }
}
