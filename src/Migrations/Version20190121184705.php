<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190121184705 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ocena ADD uczen_id INT NOT NULL');
        $this->addSql('ALTER TABLE ocena ADD CONSTRAINT FK_7B045140825E5C6D FOREIGN KEY (uczen_id) REFERENCES uczen (id)');
        $this->addSql('CREATE INDEX IDX_7B045140825E5C6D ON ocena (uczen_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ocena DROP FOREIGN KEY FK_7B045140825E5C6D');
        $this->addSql('DROP INDEX IDX_7B045140825E5C6D ON ocena');
        $this->addSql('ALTER TABLE ocena DROP uczen_id');
    }
}
