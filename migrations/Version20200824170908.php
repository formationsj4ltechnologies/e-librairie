<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200824170908 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auteur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, livre_id INT NOT NULL, contenu LONGTEXT NOT NULL, note SMALLINT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, INDEX IDX_67F068BC37D925CB (livre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editeur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre (id INT AUTO_INCREMENT NOT NULL, rayon_id INT NOT NULL, editeur_id INT NOT NULL, titre VARCHAR(255) NOT NULL, isbn VARCHAR(255) NOT NULL, parution DATE NOT NULL, prix DOUBLE PRECISION NOT NULL, dispo TINYINT(1) NOT NULL, resumer LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, tags LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_AC634F99D3202E52 (rayon_id), INDEX IDX_AC634F993375BD21 (editeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre_theme (livre_id INT NOT NULL, theme_id INT NOT NULL, INDEX IDX_4767F6E37D925CB (livre_id), INDEX IDX_4767F6E59027487 (theme_id), PRIMARY KEY(livre_id, theme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre_auteur (livre_id INT NOT NULL, auteur_id INT NOT NULL, INDEX IDX_A11876B537D925CB (livre_id), INDEX IDX_A11876B560BB6FE6 (auteur_id), PRIMARY KEY(livre_id, auteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rayon (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, slug VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, INDEX IDX_D5E5BC3C727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC37D925CB FOREIGN KEY (livre_id) REFERENCES livre (id)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F99D3202E52 FOREIGN KEY (rayon_id) REFERENCES rayon (id)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F993375BD21 FOREIGN KEY (editeur_id) REFERENCES editeur (id)');
        $this->addSql('ALTER TABLE livre_theme ADD CONSTRAINT FK_4767F6E37D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livre_theme ADD CONSTRAINT FK_4767F6E59027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livre_auteur ADD CONSTRAINT FK_A11876B537D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livre_auteur ADD CONSTRAINT FK_A11876B560BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rayon ADD CONSTRAINT FK_D5E5BC3C727ACA70 FOREIGN KEY (parent_id) REFERENCES rayon (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livre_auteur DROP FOREIGN KEY FK_A11876B560BB6FE6');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F993375BD21');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC37D925CB');
        $this->addSql('ALTER TABLE livre_theme DROP FOREIGN KEY FK_4767F6E37D925CB');
        $this->addSql('ALTER TABLE livre_auteur DROP FOREIGN KEY FK_A11876B537D925CB');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F99D3202E52');
        $this->addSql('ALTER TABLE rayon DROP FOREIGN KEY FK_D5E5BC3C727ACA70');
        $this->addSql('ALTER TABLE livre_theme DROP FOREIGN KEY FK_4767F6E59027487');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE editeur');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE livre_theme');
        $this->addSql('DROP TABLE livre_auteur');
        $this->addSql('DROP TABLE rayon');
        $this->addSql('DROP TABLE theme');
    }
}
