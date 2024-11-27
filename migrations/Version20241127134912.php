<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241127134912 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agence (id INT AUTO_INCREMENT NOT NULL, directeur_id INT NOT NULL, siege_id INT NOT NULL, numero_agence DOUBLE PRECISION NOT NULL, adresse VARCHAR(255) NOT NULL, INDEX IDX_64C19AA9E82E7EE8 (directeur_id), INDEX IDX_64C19AA9BF006E8B (siege_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, client_id INT NOT NULL, agence_id INT NOT NULL, employe_id INT NOT NULL, titre VARCHAR(255) NOT NULL, adresse LONGTEXT NOT NULL, images VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, surface DOUBLE PRECISION NOT NULL, prix INT NOT NULL, owner VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_23A0E66BCF5E72D (categorie_id), INDEX IDX_23A0E6619EB6921 (client_id), INDEX IDX_23A0E66D725330D (agence_id), INDEX IDX_23A0E661B65292 (employe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, employe_id INT DEFAULT NULL, agence_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, date_naissance DATETIME NOT NULL, email VARCHAR(255) NOT NULL, INDEX IDX_C74404551B65292 (employe_id), INDEX IDX_C7440455D725330D (agence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE directeur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, revenus DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employe (id INT AUTO_INCREMENT NOT NULL, agence_id INT DEFAULT NULL, directeur_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_F804D3B9D725330D (agence_id), INDEX IDX_F804D3B9E82E7EE8 (directeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE siege (id INT AUTO_INCREMENT NOT NULL, directeur_id INT DEFAULT NULL, capital DOUBLE PRECISION NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_6706B4F7E82E7EE8 (directeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenoms VARCHAR(255) NOT NULL, adresse LONGTEXT NOT NULL, email VARCHAR(255) NOT NULL, login VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, phone INT NOT NULL, age INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agence ADD CONSTRAINT FK_64C19AA9E82E7EE8 FOREIGN KEY (directeur_id) REFERENCES directeur (id)');
        $this->addSql('ALTER TABLE agence ADD CONSTRAINT FK_64C19AA9BF006E8B FOREIGN KEY (siege_id) REFERENCES siege (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6619EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66D725330D FOREIGN KEY (agence_id) REFERENCES agence (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E661B65292 FOREIGN KEY (employe_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404551B65292 FOREIGN KEY (employe_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455D725330D FOREIGN KEY (agence_id) REFERENCES agence (id)');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B9D725330D FOREIGN KEY (agence_id) REFERENCES agence (id)');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B9E82E7EE8 FOREIGN KEY (directeur_id) REFERENCES directeur (id)');
        $this->addSql('ALTER TABLE siege ADD CONSTRAINT FK_6706B4F7E82E7EE8 FOREIGN KEY (directeur_id) REFERENCES directeur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agence DROP FOREIGN KEY FK_64C19AA9E82E7EE8');
        $this->addSql('ALTER TABLE agence DROP FOREIGN KEY FK_64C19AA9BF006E8B');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66BCF5E72D');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6619EB6921');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66D725330D');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E661B65292');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404551B65292');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455D725330D');
        $this->addSql('ALTER TABLE employe DROP FOREIGN KEY FK_F804D3B9D725330D');
        $this->addSql('ALTER TABLE employe DROP FOREIGN KEY FK_F804D3B9E82E7EE8');
        $this->addSql('ALTER TABLE siege DROP FOREIGN KEY FK_6706B4F7E82E7EE8');
        $this->addSql('DROP TABLE agence');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE directeur');
        $this->addSql('DROP TABLE employe');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE siege');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
