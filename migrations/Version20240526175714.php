<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240526175714 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commander_livraison (commander_id INT NOT NULL, livraison_id INT NOT NULL, INDEX IDX_3E5AD0343349A583 (commander_id), INDEX IDX_3E5AD0348E54FB25 (livraison_id), PRIMARY KEY(commander_id, livraison_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livrer (id INT AUTO_INCREMENT NOT NULL, commander VARCHAR(255) DEFAULT NULL, livraison VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commander_livraison ADD CONSTRAINT FK_3E5AD0343349A583 FOREIGN KEY (commander_id) REFERENCES commander (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commander_livraison ADD CONSTRAINT FK_3E5AD0348E54FB25 FOREIGN KEY (livraison_id) REFERENCES livraison (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commander_livraison DROP FOREIGN KEY FK_3E5AD0343349A583');
        $this->addSql('ALTER TABLE commander_livraison DROP FOREIGN KEY FK_3E5AD0348E54FB25');
        $this->addSql('DROP TABLE commander_livraison');
        $this->addSql('DROP TABLE livrer');
    }
}
