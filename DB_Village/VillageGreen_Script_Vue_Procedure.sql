-- Mettre un coefficient fixe pour les particuliers
UPDATE Client
SET Coefficient = 1.00
WHERE Type_client = 'Particulier';

-- Mettre à jour les coefficients spécifiques pour certains professionnels
UPDATE Client
SET Coefficient = CASE
    WHEN Ref_Client = 'C-2001' THEN 1.50 -- Exemple : Durand, Paul
    WHEN Ref_Client = 'C-2002' THEN 1.60 -- Exemple : Lemoine, Alice
    WHEN Ref_Client = 'C-2003' THEN 1.70 -- Exemple : Bernard, Jacques
    WHEN Ref_Client = 'C-2004' THEN 1.80 -- Exemple : Faure, Lucie
    WHEN Ref_Client = 'C-2005' THEN 1.90 -- Exemple : Lemoine, Michel
    WHEN Ref_Client = 'C-2006' THEN 1.40 -- Exemple : Simon, Henri
    WHEN Ref_Client = 'C-2007' THEN 1.30 -- Exemple : Martins, Victor
    WHEN Ref_Client = 'C-2008' THEN 1.80 -- Exemple : Thompson, James
    WHEN Ref_Client = 'C-2009' THEN 2.00 -- Exemple : Benoit, Christophe
    WHEN Ref_Client = 'C-2010' THEN 1.75 -- Exemple : Caron, Éric
    ELSE NULL -- Aucun coefficient défini pour d'autres professionnels
END
WHERE Type_client = 'Professionnel';

-- Mettre un coefficient par défaut pour les professionnels sans règle spécifique
UPDATE Client
SET Coefficient = 1.50
WHERE Type_client = 'Professionnel' 
  AND Coefficient IS NULL;


-- Chiffre_Affaire_Mois
SELECT 
    EXTRACT(MONTH FROM d.Date_Document) AS Mois,
    SUM(d.Montant_Total_TTC) AS Chiffre_Affaires
FROM 
    Document d
JOIN 
    Commande c ON d.Id_Commande = c.Id_Commande
WHERE 
    EXTRACT(YEAR FROM d.Date_Document) = 2025  -- Remplacez 2025 par l'année souhaitée
GROUP BY 
    EXTRACT(MONTH FROM d.Date_Document)
ORDER BY 
    Mois;

-- Chiffre_Affaire_Fourisseur
SELECT 
    f.Nom_Fournisseur, 
    SUM(d.Montant_Total_TTC) AS Chiffre_Affaires
FROM 
    Fournisseur f
JOIN 
    Produit p ON f.Id_Fournisseur = p.Id_Fournisseur
JOIN 
    Contient c ON p.Id_Produit = c.Id_Produit
JOIN 
    Commande cdr ON c.Id_Commande = cdr.Id_Commande
JOIN 
    Document d ON cdr.Id_Commande = d.Id_Commande
GROUP BY 
    f.Nom_Fournisseur;

-- TOP 10 Produit 2025
SELECT
        p.Id_Produit,
        p.Libelle_court AS Nom_Produit,
        SUM(c.Quantite) AS Quantite_Commandee,
        p.Id_Fournisseur,
        f.Nom_Fournisseur
    FROM
        Contient c
    JOIN
        Produit p ON c.Id_Produit = p.Id_Produit
    JOIN
        Commande o ON c.Id_Commande = o.Id_Commande
    LEFT JOIN
        Fournisseur f ON p.Id_Fournisseur = f.Id_Fournisseur
    WHERE
        YEAR(o.Date_commande) = 2025  -- Sélection de l'année 2025
    GROUP BY
        p.Id_Produit, p.Libelle_court, p.Id_Fournisseur, f.Nom_Fournisseur
    ORDER BY
        Quantite_Commandee DESC
    LIMIT 10;

-- TOP 10 des produits les plus rémunérateurs
SELECT 
    p.Id_Produit, 
    p.Libelle_court AS Nom_Produit, 
    (p.Prix_Vente_HT - p.Prix_Achat_HT) AS Marge, 
    f.Nom_Fournisseur
FROM 
    Produit p
JOIN 
    Fournisseur f ON p.Id_Fournisseur = f.Id_Fournisseur
JOIN 
    Contient c ON p.Id_Produit = c.Id_Produit
JOIN 
    Commande cdr ON c.Id_Commande = cdr.Id_Commande
JOIN 
    Document d ON cdr.Id_Commande = d.Id_Commande
WHERE 
    EXTRACT(YEAR FROM d.Date_Document) = 2025  -- Remplacez 2025 par l'année souhaitée
ORDER BY 
    Marge DESC
LIMIT 10;

-- Top 10 des clients en chiffre d'affaires
SELECT 
    c.Id_Client, 
    cl.Nom AS Nom_Client, 
    SUM(d.Montant_Total_TTC) AS Chiffre_Affaires
FROM 
    Commande c
JOIN 
    Client cl ON c.Id_Client = cl.Id_Client
JOIN 
    Document d ON c.Id_Commande = d.Id_Commande
GROUP BY 
    c.Id_Client
ORDER BY 
    Chiffre_Affaires DESC
LIMIT 10;

-- Répartition du chiffre d'affaires par type de client
SELECT 
    cl.Type_Client, 
    SUM(d.Montant_Total_TTC) AS Chiffre_Affaires
FROM 
    Commande c
JOIN 
    Client cl ON c.Id_Client = cl.Id_Client
JOIN 
    Document d ON c.Id_Commande = d.Id_Commande
GROUP BY 
    cl.Type_Client;

-- Nombre de commandes en cours de livraison
SELECT 
    COUNT(c.Id_Commande) AS Nombre_Commandes
FROM 
    Commande c
WHERE 
    c.Etat_Commande = 'En cours'
    AND c.Date_Livraison > CURRENT_DATE;

-- Commande_En_Cours(a Passer en Procedure)
SELECT 
        c.Id_Commande,
        c.Date_Commande,
        c.Date_Livraison,
        c.Etat_Commande,
        cl.Nom AS Nom_Client,
        cl.Prenom AS Prenom_Client
    FROM 
        Commande c
    JOIN 
        Client cl ON c.Id_Client = cl.Id_Client
    WHERE 
        c.Etat_Commande = 'En cours'
        AND c.Date_Livraison > CURRENT_DATE
    ORDER BY 
        c.Date_Livraison ASC;

-- Delai_Moyen_Livraison(a Passer en Procedure)
  SELECT 
        AVG(DATEDIFF(c.Date_Livraison, c.Date_Commande)) AS Delai_Moyen
    FROM 
        Commande c
    WHERE 
        c.Date_Livraison IS NOT NULL;

-- Vue Produit-Fournisseur (SELECT * FROM Vue_Produits_Fournisseurs;)
CREATE VIEW Vue_Produits_Fournisseurs AS
SELECT
p.Id_Produit,
p.Libelle_court AS Produit,
p.Libelle_Long AS Description,
p.Prix_Achat_HT,
p.Prix_Vente_HT,
p.Stock_Disponible,
p.Produit_Actif,
f.Id_Fournisseur,
f.Nom_Fournisseur,
f.Adresse_Fournisseur,
f.Telephone_Fournisseur,
f.Email_Fournisseur
FROM
Produit p 
JOIN
Fournisseur f ON p.Id_Fournisseur = f.Id_Fournisseur;

-- Afficher uniquement les produits actifs et leur fournisseur (La vue doit etre cree avant)
SELECT 
    Produit, 
    Nom_Fournisseur, 
    Prix_Vente_HT 
FROM 
    Vue_Produits_Fournisseurs
WHERE 
    Produit_Actif = 1;

-- Vue Produit - Rubrique/Sous_Rubrique(SELECT * FROM Vue_Produits_Rubriques;)
CREATE VIEW Vue_Produits_Rubriques AS
SELECT
p.Id_Produit,
p.Libelle_court AS Produit,
p.Libelle_long AS Description,
p.Prix_Achat_HT,
p.Prix_Vente_HT,
p.Stock_Disponible,
p.Produit_Actif,
sr.Id_Sous_Rubrique,
sr.Libelle AS Sous_Rubrique,
r.Id_Rubrique,
r.Libelle AS Rubrique
FROM
Produit p
JOIN
Sous_Rubrique sr ON p.Id_Sous_Rubrique = sr.Id_Sous_Rubrique
JOIN
Rubrique r ON sr.Id_Rubrique = r.Id_Rubrique;

-- Filtre Produit - Rubriques/Sous_Rubriques Par Produit actif
SELECT 
    Produit, 
    Sous_Rubrique, 
    Rubrique, 
    Prix_Vente_HT 
FROM 
    Vue_Produits_Rubriques
WHERE 
    Produit_Actif = 1;

-- Filtre Produit - Rubriques/Sous_Rubriques Par Rubrique
SELECT 
    Produit, 
    Rubrique, 
    Sous_Rubrique 
FROM 
    Vue_Produits_Rubriques
WHERE 
    Rubrique = 'Instruments à cordes';


