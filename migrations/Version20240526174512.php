<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240526174512 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison_fournisseur ADD fournisseur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livraison_fournisseur ADD CONSTRAINT FK_D1C2143B670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('CREATE INDEX IDX_D1C2143B670C757F ON livraison_fournisseur (fournisseur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison_fournisseur DROP FOREIGN KEY FK_D1C2143B670C757F');
        $this->addSql('DROP INDEX IDX_D1C2143B670C757F ON livraison_fournisseur');
        $this->addSql('ALTER TABLE livraison_fournisseur DROP fournisseur_id');
    }
}
