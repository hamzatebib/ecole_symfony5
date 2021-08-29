<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210823191819 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE matiere_classe (id INT AUTO_INCREMENT NOT NULL, matiere_id_id INT DEFAULT NULL, classe_id_id INT DEFAULT NULL, INDEX IDX_AF649A8BF3E43022 (matiere_id_id), INDEX IDX_AF649A8B3633CA6F (classe_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE matiere_classe ADD CONSTRAINT FK_AF649A8BF3E43022 FOREIGN KEY (matiere_id_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE matiere_classe ADD CONSTRAINT FK_AF649A8B3633CA6F FOREIGN KEY (classe_id_id) REFERENCES classe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE matiere_classe');
    }
}
