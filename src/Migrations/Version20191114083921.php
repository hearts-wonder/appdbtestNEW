<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191114083921 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE actus_grid ADD actus_article_id INT NOT NULL');
        $this->addSql('ALTER TABLE actus_grid ADD CONSTRAINT FK_169AFBE155451F1C FOREIGN KEY (actus_article_id) REFERENCES actus_article (id)');
        $this->addSql('CREATE INDEX IDX_169AFBE155451F1C ON actus_grid (actus_article_id)');
        $this->addSql('ALTER TABLE aidants_grid ADD aidants_article_id INT NOT NULL');
        $this->addSql('ALTER TABLE aidants_grid ADD CONSTRAINT FK_957818B77FE36593 FOREIGN KEY (aidants_article_id) REFERENCES aidants_article (id)');
        $this->addSql('CREATE INDEX IDX_957818B77FE36593 ON aidants_grid (aidants_article_id)');
        $this->addSql('ALTER TABLE patients_grid ADD patients_article_id INT NOT NULL');
        $this->addSql('ALTER TABLE patients_grid ADD CONSTRAINT FK_965DB7AE3CE7DFD2 FOREIGN KEY (patients_article_id) REFERENCES patients_article (id)');
        $this->addSql('CREATE INDEX IDX_965DB7AE3CE7DFD2 ON patients_grid (patients_article_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE actus_grid DROP FOREIGN KEY FK_169AFBE155451F1C');
        $this->addSql('DROP INDEX IDX_169AFBE155451F1C ON actus_grid');
        $this->addSql('ALTER TABLE actus_grid DROP actus_article_id');
        $this->addSql('ALTER TABLE aidants_grid DROP FOREIGN KEY FK_957818B77FE36593');
        $this->addSql('DROP INDEX IDX_957818B77FE36593 ON aidants_grid');
        $this->addSql('ALTER TABLE aidants_grid DROP aidants_article_id');
        $this->addSql('ALTER TABLE patients_grid DROP FOREIGN KEY FK_965DB7AE3CE7DFD2');
        $this->addSql('DROP INDEX IDX_965DB7AE3CE7DFD2 ON patients_grid');
        $this->addSql('ALTER TABLE patients_grid DROP patients_article_id');
    }
}
