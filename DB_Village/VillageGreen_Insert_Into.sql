USE VillageGreen;

-- Insertion des données dans les tables
INSERT INTO Rubrique (Libelle) 
VALUES
('Instruments à cordes'),
('Instruments à vent'),
('Percussions'),
('Claviers et pianos'),
('Équipement de studio'),
('Accessoires');

-- Insertion des Sous_Rubriques
INSERT INTO Sous_Rubrique (Libelle, Id_Rubrique) 
VALUES
('Guitares acoustiques', 1),
('Guitares électriques', 1),
('Violons', 1),
('Flûtes', 2),
('Saxophones', 2),
('Batteries acoustiques', 3),
('Batteries électroniques', 3),
('Claviers MIDI', 4),
('Pianos numériques', 4),
('Microphones', 5),
('Casques audio', 5),
('Tables de mixage', 5),
('Cordes pour guitares', 6),
('Supports et pieds', 6),
('Housses et étuis', 6);

-- Insertion des Clients
INSERT INTO Client (Nom, Prenom, Email, Telephone, Type_client, Coefficient, Adresse_Facturation, Adresse_Livraison, Ref_Client, Mots_De_Passe, Numero_Siret) 
VALUES
('Dupont', 'Jean', 'jean.dupont@email.com', '0123456789', 'Particulier', 1.00, '123 Rue de Paris, 75000 Paris', '123 Rue de Paris, 75000 Paris', 'C-1001', 'password123', NULL),
('Martin', 'Claire', 'claire.martin@email.com', '0987654321', 'Particulier', 1.00, '45 Rue du Centre, 69000 Lyon', '45 Rue du Centre, 69000 Lyon', 'C-1002', 'securepass456', NULL),
('Durand', 'Paul', 'paul.durand@email.com', '0678452310', 'Professionnel', 1.80, '22 Avenue des Champs, 75008 Paris', '22 Avenue des Champs, 75008 Paris', 'C-2001', 'propass789', '12345678901234'),
('Lemoine', 'Alice', 'alice.lemoine@email.com', '0612345678', 'Professionnel', 1.80, '78 Rue Lafayette, 31000 Toulouse', '78 Rue Lafayette, 31000 Toulouse', 'C-2002', 'businesskey987', '56789012345678'),
('Petit', 'Marc', 'marc.petit@email.com', '0754321987', 'Particulier', 1.00, '67 Rue Nationale, 59000 Lille', '67 Rue Nationale, 59000 Lille', 'C-1003', 'mypassword321', NULL),
('Rousseau', 'Sophie', 'sophie.rousseau@email.com', '0611223344', 'Particulier', 1.00, '11 Boulevard Saint-Germain, 75005 Paris', '11 Boulevard Saint-Germain, 75005 Paris', 'C-1004', 'safeword456', NULL),
('Leclerc', 'Emilie', 'emilie.leclerc@email.com', '0765432109', 'Particulier', 1.00, '33 Rue de la République, 13001 Marseille', '33 Rue de la République, 13001 Marseille', 'C-1005', 'userpass654', NULL),
('Bernard', 'Jacques', 'jacques.bernard@email.com', '0676543210', 'Professionnel', 1.80, '15 Rue de la Liberté, 67000 Strasbourg', '15 Rue de la Liberté, 67000 Strasbourg', 'C-2003', 'prosecure321', '09876543210987'),
('Faure', 'Lucie', 'lucie.faure@email.com', '0611224455', 'Professionnel', 1.80, '89 Rue de la Gare, 54000 Nancy', '89 Rue de la Gare, 54000 Nancy', 'C-2004', 'luciekey654', '23456789012345'),
('Giraud', 'Louis', 'louis.giraud@email.com', '0703456789', 'Particulier', 1.00, '21 Rue des Lilas, 75019 Paris', '21 Rue des Lilas, 75019 Paris', 'C-1006', 'randompass321', NULL),
('Lemoine', 'Michel', 'michel.lemoine@email.com', '0623456789', 'Professionnel', 1.80, '56 Boulevard Victor Hugo, 35000 Rennes', '56 Boulevard Victor Hugo, 35000 Rennes', 'C-2005', 'michel123key', '87654321098765'),
('Nicolas', 'Charlotte', 'charlotte.nicolas@email.com', '0627654321', 'Particulier', 1.00, '13 Rue de la Mer, 60000 Beauvais', '13 Rue de la Mer, 60000 Beauvais', 'C-1007', 'secureword654', NULL),
('Simon', 'Henri', 'henri.simon@email.com', '0656789012', 'Professionnel', 1.80, '8 Rue de l’Industrie, 33000 Bordeaux', '8 Rue de l’Industrie, 33000 Bordeaux', 'C-2006', 'business123', '98765432109876'),
('Lefevre', 'Isabelle', 'isabelle.lefevre@email.com', '0622123345', 'Particulier', 1.00, '102 Avenue de la Paix, 76000 Rouen', '102 Avenue de la Paix, 76000 Rouen', 'C-1008', 'mypassword987', NULL),
('Martins', 'Victor', 'victor.martins@email.com', '0654321098', 'Professionnel', 1.80, '24 Rue de l’Eglise, 92000 Nanterre', '24 Rue de l’Eglise, 92000 Nanterre', 'C-2007', 'victor321pass', '56789012345678'),
('Pires', 'Ana', 'ana.pires@email.com', '0698765432', 'Particulier', 1.00, '19 Rue de la Fontaine, 75012 Paris', '19 Rue de la Fontaine, 75012 Paris', 'C-1009', 'ana456word', NULL),
('Robert', 'Géraldine', 'geraldine.robert@email.com', '0623445567', 'Particulier', 1.40, '2 Place du Marché, 34000 Montpellier', '2 Place du Marché, 34000 Montpellier', 'C-1010', 'robert123key', NULL),
('Thompson', 'James', 'james.thompson@email.com', '0734567890', 'Professionnel', 1.80, '45 Boulevard de la Villette, 75019 Paris', '45 Boulevard de la Villette, 75019 Paris', 'C-2008', 'jamespro654', '67890123456789'),
('Benoit', 'Christophe', 'christophe.benoit@email.com', '0654332211', 'Professionnel', 1.80, '38 Rue de l’Annonciation, 75016 Paris', '38 Rue de l’Annonciation, 75016 Paris', 'C-2009', 'chrispass123', '12345098765432'),
('Vidal', 'Laura', 'laura.vidal@email.com', '0669876543', 'Particulier', 1.00, '18 Rue de la Croix, 47000 Agen', '18 Rue de la Croix, 47000 Agen', 'C-1011', 'laura789pass', NULL),
('Lemoine', 'Pierre', 'pierre.lemoine@email.com', '0645678901', 'Particulier', 1.00, '51 Boulevard de la Concorde, 75008 Paris', '51 Boulevard de la Concorde, 75008 Paris', 'C-1012', 'lemoinepass456', NULL),
('Girard', 'Emmanuelle', 'emmanuelle.girard@email.com', '0656234789', 'Particulier', 1.00, '65 Rue de la Forêt, 69000 Lyon', '65 Rue de la Forêt, 69000 Lyon', 'C-1013', 'girardword654', NULL),
('Caron', 'Éric', 'eric.caron@email.com', '0622564789', 'Professionnel', 1.80, '77 Rue du Général Leclerc, 83000 Toulon', '77 Rue du Général Leclerc, 83000 Toulon', 'C-2010', 'caron123pro', '23456765432109'),
('Fournier', 'Monique', 'monique.fournier@email.com', '0602345678', 'Particulier', 1.00, '44 Rue de la Liberté, 67000 Strasbourg', '44 Rue de la Liberté, 67000 Strasbourg', 'C-1014', 'moniquekey321', NULL),
('Sauvage', 'Luc', 'luc.sauvage@email.com', '0698765431', 'Particulier', 1.00, '12 Rue de la Mare, 44000 Nantes', '12 Rue de la Mare, 44000 Nantes', 'C-1015', 'lucpass123', NULL);

-- Insertion des Commandes
INSERT INTO Commande (Id_Client, Date_commande, Montant_Total_HT, Etat_Commande, Mode_Paiement, Date_Livraison)
VALUES
(1, '2025-01-15 10:30:00', 120.50, 'En cours', 'Carte bancaire', '2025-01-20 15:00:00'),
(2, '2025-02-03 14:45:00', 89.90, 'Livrée', 'PayPal', '2025-02-08 12:30:00'),
(3, '2025-03-10 09:00:00', 450.75, 'En attente de paiement', 'Virement bancaire', NULL),
(4, '2025-04-14 11:15:00', 320.00, 'En cours', 'Carte bancaire', '2025-04-19 16:00:00'),
(5, '2025-05-18 16:00:00', 59.99, 'Annulée', 'Carte bancaire', NULL),
(6, '2025-06-19 13:20:00', 789.50, 'Livrée', 'Virement bancaire', '2025-06-24 14:00:00'),
(7, '2025-07-20 15:30:00', 145.80, 'Livrée', 'Carte bancaire', '2025-07-25 17:00:00'),
(8, '2025-08-25 16:45:00', 220.00, 'En cours', 'PayPal', '2025-08-30 14:00:00'),
(9, '2025-09-28 09:00:00', 310.50, 'Annulée', 'Virement bancaire', NULL),
(10, '2025-10-30 10:30:00', 55.00, 'Livrée', 'Carte bancaire', '2025-11-05 13:00:00'),
(11, '2025-11-01 08:00:00', 98.60, 'En attente de paiement', 'PayPal', NULL),
(12, '2025-11-03 14:10:00', 123.45, 'En cours', 'Carte bancaire', '2025-11-08 10:00:00'),
(13, '2025-12-05 12:20:00', 450.00, 'Livrée', 'Virement bancaire', '2025-12-10 14:30:00'),
(14, '2025-01-08 11:40:00', 225.00, 'En cours', 'Carte bancaire', '2025-01-13 12:00:00'),
(15, '2025-02-12 17:05:00', 321.20, 'Livrée', 'Virement bancaire', '2025-02-17 13:00:00'),
(16, '2025-03-15 10:00:00', 230.00, 'Livrée', 'Carte bancaire', '2025-03-20 14:30:00'),
(17, '2025-04-03 18:00:00', 150.50, 'En attente de paiement', 'PayPal', NULL),
(18, '2025-05-10 11:30:00', 189.75, 'Annulée', 'Virement bancaire', NULL),
(19, '2025-06-23 14:15:00', 275.60, 'En cours', 'Carte bancaire', '2025-06-28 16:00:00'),
(20, '2025-07-14 09:40:00', 349.99, 'Livrée', 'Carte bancaire', '2025-07-19 12:30:00');

-- Insertion des Documents
INSERT INTO Document (Id_Commande, Date_Document, Montant_Total_HT, Montant_TVA, Montant_Total_TTC, Mode_Paiement, Type) 
VALUES
(1, '2025-01-15 11:00:00', 120.50, 24.10, 144.60, 'Carte bancaire', 'Facture'),
(2, '2025-02-03 15:00:00', 89.90, 17.98, 107.88, 'PayPal', 'Facture'),
(3, '2025-03-10 09:30:00', 450.75, 90.15, 540.90, 'Virement bancaire', 'Devis'),
(4, '2025-04-14 11:30:00', 320.00, 64.00, 384.00, 'Carte bancaire', 'Facture'),
(5, '2025-05-18 16:30:00', 59.99, 12.00, 71.99, 'Carte bancaire', 'Avoir'),
(6, '2025-06-19 13:30:00', 789.50, 157.90, 947.40, 'Virement bancaire', 'Facture'),
(7, '2025-07-20 15:00:00', 145.80, 29.16, 174.96, 'Carte bancaire', 'Facture'),
(8, '2025-08-25 16:45:00', 220.00, 44.00, 264.00, 'PayPal', 'Devis'),
(9, '2025-09-28 09:00:00', 310.50, 62.10, 372.60, 'Virement bancaire', 'Facture'),
(10, '2025-10-30 10:30:00', 55.00, 11.00, 66.00, 'Carte bancaire', 'Facture'),
(11, '2025-11-01 08:00:00', 98.60, 19.72, 118.32, 'PayPal', 'Avoir'),
(12, '2025-11-03 14:10:00', 123.45, 24.69, 148.14, 'Carte bancaire', 'Devis'),
(13, '2025-12-05 12:20:00', 450.00, 90.00, 540.00, 'Virement bancaire', 'Facture'),
(14, '2025-01-08 11:40:00', 225.00, 45.00, 270.00, 'Carte bancaire', 'Facture'),
(15, '2025-02-12 17:05:00', 321.20, 64.24, 385.44, 'Virement bancaire', 'Facture'),
(16, '2025-03-15 10:00:00', 230.00, 46.00, 276.00, 'Carte bancaire', 'Facture'),
(17, '2025-04-03 18:00:00', 150.50, 30.10, 180.60, 'PayPal', 'Devis'),
(18, '2025-05-10 11:30:00', 189.75, 37.95, 227.70, 'Virement bancaire', 'Avoir'),
(19, '2025-06-23 14:15:00', 275.60, 55.12, 330.72, 'Carte bancaire', 'Facture'),
(20, '2025-07-14 09:40:00', 349.99, 70.00, 419.99, 'Carte bancaire', 'Facture');

-- Insertion dans la table Fournisseur
INSERT INTO Fournisseur (Nom_Fournisseur, Adresse_Fournisseur, Telephone_Fournisseur, Email_Fournisseur) 
VALUES
('Music Pro', '12 Rue des Instruments, 75001 Paris', '0145236789', 'contact@musicpro.fr'),
('Studio Gear', '45 Avenue des Arts, 69002 Lyon', '0478529631', 'info@studiogear.com'),
('Percu World', '78 Boulevard des Sons, 13006 Marseille', '0498352467', 'sales@percuworld.fr'),
('Clavier et Piano', '22 Place Harmonique, 31000 Toulouse', '0564871290', 'support@clavierpiano.com'),
('Guitare Passion', '34 Route du Son, 59000 Lille', '0320418796', 'contact@guitarepassion.fr'),
('AudioMax', '56 Allée des Studios, 44000 Nantes', '0254478963', 'service@audiomax.fr');

-- Insertion dans la table Produit
INSERT INTO Produit (Libelle_court, Libelle_long, Id_Fournisseur, Prix_Achat_HT, Prix_Vente_HT, Stock_Disponible, Photo, Id_Sous_Rubrique, Produit_Actif)
VALUES
('Guitare acoustique', 'Guitare acoustique 6 cordes en bois de rose, idéale pour débutants et professionnels', 1, 120.50, 199.99, 25, 'images/guitare_acoustique.jpg', 1, TRUE),
('Guitare électrique', 'Guitare électrique avec corps en aulne, micros puissants et finition brillante', 2, 180.00, 299.99, 20, 'images/guitare_electrique.jpg', 1, TRUE),
('Violon', 'Violon en bois massif avec archet et étui rigide, idéal pour les musiciens professionnels', 3, 250.00, 399.99, 15, 'images/violon.jpg', 1, TRUE),
('Flûte traversière', 'Flûte traversière en métal avec clé en argent, son clair et brillant', 4, 100.00, 179.99, 30, 'images/flute_traversiere.jpg', 2, TRUE),
('Saxophone alto', 'Saxophone alto en laiton, idéal pour débutants et intermédiaires', 5, 350.00, 549.99, 10, 'images/saxophone.jpg', 2, TRUE),
('Batterie acoustique', 'Kit de batterie acoustique 5 pièces avec cymbales et pédales', 6, 450.00, 799.99, 5, 'images/batterie_acoustique.jpg', 3, TRUE),
('Batterie électronique', 'Batterie électronique avec 8 pads et connectivité USB, idéale pour un enregistrement à domicile', 1, 400.00, 699.99, 12, 'images/batterie_electronique.jpg', 3, TRUE),
('Clavier MIDI', 'Clavier MIDI 49 touches avec connectivité USB pour production musicale', 2, 150.00, 249.99, 15, 'images/clavier_midi.jpg', 4, TRUE),
('Piano numérique', 'Piano numérique 88 touches, son authentique, avec effets intégrés', 3, 600.00, 999.99, 8, 'images/piano_numerique.jpg', 4, TRUE),
('Microphone de studio', 'Microphone à condensateur cardioïde avec filtre anti-pop et pied', 4, 75.00, 129.99, 30, 'images/microphone_studio.jpg', 5, TRUE),
('Casque audio', 'Casque audio de studio avec réduction de bruit pour mixage professionnel', 5, 50.00, 99.99, 50, 'images/casque_audio.jpg', 5, TRUE),
('Table de mixage', 'Table de mixage 8 pistes avec égaliseur intégré et effets numériques', 6, 300.00, 499.99, 10, 'images/table_mixage.jpg', 5, TRUE),
('Cordes pour guitare', 'Jeu de cordes pour guitare acoustique en acier inoxydable, pack de 6', 1, 10.00, 15.99, 50, 'images/cordes_guitare.jpg', 6, TRUE),
('Support pour guitare', 'Support réglable pour guitare avec base en caoutchouc pour éviter les rayures', 2, 15.00, 24.99, 40, 'images/support_guitare.jpg', 6, TRUE),
('Housse pour guitare', 'Housse de protection rembourrée pour guitare acoustique, avec sangle de transport', 3, 25.00, 49.99, 30, 'images/housse_guitare.jpg', 6, TRUE),
('Support pour clavier', 'Support en métal pour clavier MIDI, ajustable pour différents modèles', 4, 30.00, 55.00, 20, 'images/support_clavier.jpg', 6, TRUE),
('Pédale d\'effet pour guitare', 'Pédale d\'effet pour guitare électrique avec effets de distorsion et reverb', 5, 40.00, 75.99, 25, 'images/pedale_effet.jpg', 6, TRUE),
('Câble audio', 'Câble audio 3m pour connexion entre guitare et ampli, robuste et fiable', 6, 8.00, 15.99, 60, 'images/cable_audio.jpg', 6, TRUE);

-- Insertion dans la table Commercial
INSERT INTO Commercial (Nom, Prenom, Email, Telephone) 
VALUES
('Bernard', 'Laura', 'laura.bernard@email.com', '0654321987'),
('Girard', 'Lucas', 'lucas.girard@email.com', '0789452310'),
('Morel', 'Emma', 'emma.morel@email.com', '0623456789'),
('Roche', 'Thomas', 'thomas.roche@email.com', '0698451237'),
('Fontaine', 'Sophie', 'sophie.fontaine@email.com', '0641237890'),
('Lemoine', 'Antoine', 'antoine.lemoine@email.com', '0712345698');

INSERT INTO Contient (Id_Commande, Id_Produit, Quantite, Prix_Unitaire_HT) VALUES
(1, 11, 1, 99.99),
(2, 1, 2, 199.99),
(2, 3, 3, 399.99),
(2, 14, 3, 24.99),
(2, 16, 3, 55.00),
(3, 2, 2, 299.99),
(4, 3, 5, 399.99),
(4, 4, 1, 179.99),
(4, 9, 5, 999.99),
(4, 13, 4, 15.99),
(4, 18, 5, 15.99),
(5, 5, 5, 549.99),
(5, 15, 1, 49.99),
(5, 18, 5, 15.99),
(6, 18, 4, 15.99);

