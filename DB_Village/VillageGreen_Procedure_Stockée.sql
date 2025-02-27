-- Creation Procedure Commande En Cours
DELIMITER $$

CREATE PROCEDURE GetCommandesEnCours()
BEGIN
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
END $$

DELIMITER ;

-- Appel Commande En Cours
-- CALL GetCommandesEnCours();

-- Creation Procedure Delai Moyen
DELIMITER $$

CREATE PROCEDURE GetDelaiMoyen()
BEGIN
    SELECT 
        AVG(DATEDIFF(c.Date_Livraison, c.Date_Commande)) AS Delai_Moyen
    FROM 
        Commande c
    WHERE 
        c.Date_Livraison IS NOT NULL;
END $$

DELIMITER ;

-- Appel Procedure Delai
 -- CALL GetDelaiMoyen();
