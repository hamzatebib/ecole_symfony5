<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210829144043 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bulltein ADD classe_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bulltein ADD CONSTRAINT FK_DE3C70FF3633CA6F FOREIGN KEY (classe_id_id) REFERENCES classe (id)');
        $this->addSql('CREATE INDEX IDX_DE3C70FF3633CA6F ON bulltein (classe_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bulltein DROP FOREIGN KEY FK_DE3C70FF3633CA6F');
        $this->addSql('DROP INDEX IDX_DE3C70FF3633CA6F ON bulltein');
        $this->addSql('ALTER TABLE bulltein DROP classe_id_id');
    }
}
