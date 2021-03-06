<?php
namespace TYPO3\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Add the two additional fields lastsuccessfulauthenticationdate and failedauthenticationcount to
 * table typo3_flow_security_account
 */
class Version20151110113650 extends AbstractMigration
{

    /**
     * @param Schema $schema
     * @return void
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql');

        $this->addSql('ALTER TABLE typo3_flow_security_account ADD lastsuccessfulauthenticationdate DATETIME DEFAULT NULL, ADD failedauthenticationcount INT DEFAULT 0');
    }

    /**
     * @param Schema $schema
     * @return void
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql');

        $this->addSql('ALTER TABLE typo3_flow_security_account DROP lastsuccessfulauthenticationdate, DROP failedauthenticationcount');
    }
}