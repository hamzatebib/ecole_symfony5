<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210829163438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note ADD classe_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA143633CA6F FOREIGN KEY (classe_id_id) REFERENCES classe (id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA143633CA6F ON note (classe_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA143633CA6F');
        $this->addSql('DROP INDEX IDX_CFBDFA143633CA6F ON note');
        $this->addSql('ALTER TABLE note DROP classe_id_id');
    }
}
