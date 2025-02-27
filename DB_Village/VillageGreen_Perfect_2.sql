CREATE DATABASE IF NOT EXISTS VillageGreen;
USE VillageGreen;

-- TABLE Rubrique
CREATE TABLE Rubrique (
    Id_Rubrique INT AUTO_INCREMENT,
    Libelle VARCHAR(100),
    PRIMARY KEY (Id_Rubrique)
);

-- TABLE Sous_Rubrique
CREATE TABLE Sous_Rubrique (
    Id_Sous_Rubrique INT AUTO_INCREMENT,
    Libelle VARCHAR(100),
    Id_Rubrique INT,
    PRIMARY KEY (Id_Sous_Rubrique),
    FOREIGN KEY (Id_Rubrique) REFERENCES Rubrique(Id_Rubrique) ON DELETE CASCADE
);

-- TABLE Fournisseur
CREATE TABLE Fournisseur (
    Id_Fournisseur INT AUTO_INCREMENT,
    Nom_Fournisseur VARCHAR(100),
    Adresse_Fournisseur VARCHAR(150),
    Telephone_Fournisseur VARCHAR(15),
    Email_Fournisseur VARCHAR(150),
    PRIMARY KEY (Id_Fournisseur)
);

-- TABLE Produit
CREATE TABLE Produit(
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
);

-- TABLE Client
CREATE TABLE Client(
   Id_Client INT AUTO_INCREMENT,
   Nom VARCHAR(100) ,
   Prenom VARCHAR(100) ,
   Email VARCHAR(150) ,
   Telephone VARCHAR(15) ,
   Type_client VARCHAR(50) ,
   Coefficient DECIMAL(5,2)  ,
   Adresse_Facturation VARCHAR(150) ,
   Adresse_Livraison VARCHAR(150) ,
   Ref_Client VARCHAR(50) ,
   Nom_Commercial VARCHAR(100) ,
   Mots_De_Passe VARCHAR(150) ,
   Numero_Siret VARCHAR(14) ,
    PRIMARY KEY (Id_Client)
);

-- TABLE Commande
CREATE TABLE Commande(
   Id_Commande INT AUTO_INCREMENT,
   Id_Client INT,
   Date_commande DATETIME,
   Montant_Total_HT DECIMAL(10,2)  ,
   Etat_Commande VARCHAR(50) ,
   Mode_Paiement VARCHAR(50) ,
   Date_Livraison DATETIME,
    PRIMARY KEY (Id_Commande),
    FOREIGN KEY (Id_Client) REFERENCES Client(Id_Client) ON DELETE CASCADE
);

-- TABLE Commercial
CREATE TABLE Commercial (
    Id_Commercial INT AUTO_INCREMENT,
    Nom VARCHAR(100),
    Prenom VARCHAR(100),
    Email VARCHAR(150),
    Telephone VARCHAR(15),
    PRIMARY KEY (Id_Commercial)
);

-- TABLE Gere (Relation entre Client et Commercial)
CREATE TABLE Gere (
    Id_Client INT,
    Id_Commercial INT,
    PRIMARY KEY (Id_Client, Id_Commercial),
    FOREIGN KEY (Id_Client) REFERENCES Client(Id_Client) ON DELETE CASCADE,
    FOREIGN KEY (Id_Commercial) REFERENCES Commercial(Id_Commercial) ON DELETE CASCADE
);

-- TABLE Passe (Relation entre Client et Commande)
CREATE TABLE Passe (
    Id_Client INT,
    Id_Commande INT,
    PRIMARY KEY (Id_Client, Id_Commande),
    FOREIGN KEY (Id_Client) REFERENCES Client(Id_Client) ON DELETE CASCADE,
    FOREIGN KEY (Id_Commande) REFERENCES Commande(Id_Commande) ON DELETE CASCADE
);

-- TABLE Contient (Relation entre Commande et Produit)
CREATE TABLE Contient(
   Id_Commande INT,
   Id_Produit INT,
   Quantite INT,
   Prix_Unitaire_HT DECIMAL(10,2),
   PRIMARY KEY(Id_Commande, Id_Produit),
   FOREIGN KEY(Id_Commande) REFERENCES Commande(Id_Commande),
   FOREIGN KEY(Id_Produit) REFERENCES Produit(Id_Produit)
);

-- TABLE Document
CREATE TABLE Document (
    Id_Document INT AUTO_INCREMENT,
    Id_Commande INT,
    Date_Document DATETIME,
    Montant_Total_HT DECIMAL(10,2),
    Montant_TVA DECIMAL(10,2),
    Montant_Total_TTC DECIMAL(10,2),
    Mode_Paiement VARCHAR(50),
    Type VARCHAR(50),
    PRIMARY KEY (Id_Document),
    FOREIGN KEY (Id_Commande) REFERENCES Commande(Id_Commande) ON DELETE CASCADE
);

-- TABLE Genere (Relation entre Commande et Document)
CREATE TABLE Genere (
    Id_Commande INT,
    Id_Document INT,
    PRIMARY KEY (Id_Commande, Id_Document),
    FOREIGN KEY (Id_Commande) REFERENCES Commande(Id_Commande) ON DELETE CASCADE,
    FOREIGN KEY (Id_Document) REFERENCES Document(Id_Document) ON DELETE CASCADE
);

-- TABLE Depend_de_ (Relation entre Rubrique et Sous_Rubrique)
CREATE TABLE Depend_de_ (
    Id_Rubrique INT,
    Id_Sous_Rubrique INT,
    PRIMARY KEY (Id_Rubrique, Id_Sous_Rubrique),
    FOREIGN KEY (Id_Rubrique) REFERENCES Rubrique(Id_Rubrique) ON DELETE CASCADE,
    FOREIGN KEY (Id_Sous_Rubrique) REFERENCES Sous_Rubrique(Id_Sous_Rubrique) ON DELETE CASCADE
);

-- TABLE Classe_dans (Relation entre Produit et Sous_Rubrique)
CREATE TABLE Classe_dans (
    Id_Produit INT,
    Id_Sous_Rubrique INT,
    PRIMARY KEY (Id_Produit, Id_Sous_Rubrique),
    FOREIGN KEY (Id_Produit) REFERENCES Produit(Id_Produit) ON DELETE CASCADE,
    FOREIGN KEY (Id_Sous_Rubrique) REFERENCES Sous_Rubrique(Id_Sous_Rubrique) ON DELETE CASCADE
);
