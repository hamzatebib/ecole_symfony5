<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210829180318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fichenote ADD matiere_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fichenote ADD CONSTRAINT FK_E706516AF3E43022 FOREIGN KEY (matiere_id_id) REFERENCES matiere (id)');
        $this->addSql('CREATE INDEX IDX_E706516AF3E43022 ON fichenote (matiere_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fichenote DROP FOREIGN KEY FK_E706516AF3E43022');
        $this->addSql('DROP INDEX IDX_E706516AF3E43022 ON fichenote');
        $this->addSql('ALTER TABLE fichenote DROP matiere_id_id');
    }
}
