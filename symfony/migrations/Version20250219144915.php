<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250219144915 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Migration to create and modify tables according to the VillageGreen database structure.';
    }

    public function up(Schema $schema): void
    {
        // Création de la table Rubrique
        $this->addSql('CREATE TABLE IF NOT EXISTS Rubrique (
            Id_Rubrique INT AUTO_INCREMENT,
            Libelle VARCHAR(100),
            PRIMARY KEY (Id_Rubrique)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Création de la table Sous_Rubrique
        $this->addSql('CREATE TABLE IF NOT EXISTS Sous_Rubrique (
            Id_Sous_Rubrique INT AUTO_INCREMENT,
            Libelle VARCHAR(100),
            Id_Rubrique INT,
            PRIMARY KEY (Id_Sous_Rubrique),
            FOREIGN KEY (Id_Rubrique) REFERENCES Rubrique(Id_Rubrique) ON DELETE CASCADE
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Création de la table Fournisseur
        $this->addSql('CREATE TABLE IF NOT EXISTS Fournisseur (
            Id_Fournisseur INT AUTO_INCREMENT,
            Nom_Fournisseur VARCHAR(100),
            Adresse_Fournisseur VARCHAR(150),
            Telephone_Fournisseur VARCHAR(15),
            Email_Fournisseur VARCHAR(150),
            PRIMARY KEY (Id_Fournisseur)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Création de la table Produit
        $this->addSql('CREATE TABLE IF NOT EXISTS Produit (
            Id_Produit INT AUTO_INCREMENT,
            Libelle_court VARCHAR(100),
            Libelle_long VARCHAR(250),
            Prix_Achat_HT DECIMAL(10,2),
            Id_Fournisseur INT,
            Prix_Vente_HT DECIMAL(10,2),
            Stock_Disponible INT,
            Photo VARCHAR(255),
            Id_Sous_Rubrique INT,
            Produit_Actif BOOLEAN,
            PRIMARY KEY(Id_Produit),
            FOREIGN KEY (Id_Fournisseur) REFERENCES Fournisseur(Id_Fournisseur) ON DELETE CASCADE,
            FOREIGN KEY (Id_Sous_Rubrique) REFERENCES Sous_Rubrique(Id_Sous_Rubrique) ON DELETE CASCADE
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Création de la table Client
        $this->addSql('CREATE TABLE IF NOT EXISTS Client (
            Id_Client INT AUTO_INCREMENT,
            Nom VARCHAR(100),
            Prenom VARCHAR(100),
            Email VARCHAR(150),
            Telephone VARCHAR(15),
            Type_client VARCHAR(50),
            Coefficient DECIMAL(5,2),
            Adresse_Facturation VARCHAR(150),
            Adresse_Livraison VARCHAR(150),
            Ref_Client VARCHAR(50),
            Nom_Commercial VARCHAR(100),
            Mots_De_Passe VARCHAR(150),
            Numero_Siret VARCHAR(14),
            PRIMARY KEY (Id_Client)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Création de la table Commande
        $this->addSql('CREATE TABLE IF NOT EXISTS Commande (
            Id_Commande INT AUTO_INCREMENT,
            Id_Client INT,
            Date_commande DATETIME,
            Montant_Total_HT DECIMAL(10,2),
            Etat_Commande VARCHAR(50),
            Mode_Paiement VARCHAR(50),
            Date_Livraison DATETIME,
            PRIMARY KEY (Id_Commande),
            FOREIGN KEY (Id_Client) REFERENCES Client(Id_Client) ON DELETE CASCADE
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Création de la table Commercial
        $this->addSql('CREATE TABLE IF NOT EXISTS Commercial (
            Id_Commercial INT AUTO_INCREMENT,
            Nom VARCHAR(100),
            Prenom VARCHAR(100),
            Email VARCHAR(150),
            Telephone VARCHAR(15),
            PRIMARY KEY (Id_Commercial)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Création de la table Gere
        $this->addSql('CREATE TABLE IF NOT EXISTS Gere (
            Id_Gere INT AUTO_INCREMENT,
            Id_Commercial INT,
            Id_Commande INT,
            PRIMARY KEY (Id_Gere),
            FOREIGN KEY (Id_Commercial) REFERENCES Commercial(Id_Commercial) ON DELETE CASCADE,
            FOREIGN KEY (Id_Commande) REFERENCES Commande(Id_Commande) ON DELETE CASCADE
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // Suppression des tables dans l'ordre inverse de leur création
        $this->addSql('DROP TABLE IF EXISTS Gere');
        $this->addSql('DROP TABLE IF EXISTS Commercial');
        $this->addSql('DROP TABLE IF EXISTS Commande');
        $this->addSql('DROP TABLE IF EXISTS Client');
        $this->addSql('DROP TABLE IF EXISTS Produit');
        $this->addSql('DROP TABLE IF EXISTS Fournisseur');
        $this->addSql('DROP TABLE IF EXISTS Sous_Rubrique');
        $this->addSql('DROP TABLE IF EXISTS Rubrique');
    }
}