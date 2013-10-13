<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131013094222 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE chore DROP FOREIGN KEY FK_857827D2AFFE2D26");
        $this->addSql("DROP INDEX IDX_857827D2AFFE2D26 ON chore");
        $this->addSql("ALTER TABLE chore CHANGE habitat_id target_user_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE chore ADD CONSTRAINT FK_857827D26C066AFE FOREIGN KEY (target_user_id) REFERENCES fos_user (id)");
        $this->addSql("CREATE INDEX IDX_857827D26C066AFE ON chore (target_user_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE chore DROP FOREIGN KEY FK_857827D26C066AFE");
        $this->addSql("DROP INDEX IDX_857827D26C066AFE ON chore");
        $this->addSql("ALTER TABLE chore CHANGE target_user_id habitat_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE chore ADD CONSTRAINT FK_857827D2AFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id)");
        $this->addSql("CREATE INDEX IDX_857827D2AFFE2D26 ON chore (habitat_id)");
    }
}
