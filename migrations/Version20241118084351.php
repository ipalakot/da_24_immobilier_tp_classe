<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241118084351 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agence ADD CONSTRAINT FK_64C19AA9E82E7EE8 FOREIGN KEY (directeur_id) REFERENCES directeur (id)');
        $this->addSql('ALTER TABLE agence ADD CONSTRAINT FK_64C19AA9BF006E8B FOREIGN KEY (siege_id) REFERENCES siege (id)');
        $this->addSql('CREATE INDEX IDX_64C19AA9E82E7EE8 ON agence (directeur_id)');
        $this->addSql('CREATE INDEX IDX_64C19AA9BF006E8B ON agence (siege_id)');
        $this->addSql('ALTER TABLE client ADD agence_id INT NOT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455D725330D FOREIGN KEY (agence_id) REFERENCES agence (id)');
        $this->addSql('CREATE INDEX IDX_C7440455D725330D ON client (agence_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agence DROP FOREIGN KEY FK_64C19AA9E82E7EE8');
        $this->addSql('ALTER TABLE agence DROP FOREIGN KEY FK_64C19AA9BF006E8B');
        $this->addSql('DROP INDEX IDX_64C19AA9E82E7EE8 ON agence');
        $this->addSql('DROP INDEX IDX_64C19AA9BF006E8B ON agence');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455D725330D');
        $this->addSql('DROP INDEX IDX_C7440455D725330D ON client');
        $this->addSql('ALTER TABLE client DROP agence_id');
    }
}
