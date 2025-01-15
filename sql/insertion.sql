-- Insertion de données dans la table utilisateur
INSERT INTO utilisateur (nom, prenom, pseudo, passw_hash, email, ville, photo)
VALUES 
('Dupont', 'Jean', 'jdupont', 'hash1', 'jean.dupont@example.com', 'Paris', 'photo1.jpg'),
('Martin', 'Sophie', 'smartin', 'hash2', 'sophie.martin@example.com', 'Lyon', 'photo2.jpg'),
('Durand', 'Pierre', 'pdurand', 'hash3', 'pierre.durand@example.com', 'Marseille', 'photo3.jpg');

-- Insertion de données dans la table droit
INSERT INTO droit (nom)
VALUES 
('Admin'), 
('Utilisateur'), 
('Modérateur');

-- Insertion de données dans la table a_le_droit
INSERT INTO a_le_droit (id_utilisateur, id_droit)
VALUES 
(1, 1), 
(2, 2), 
(3, 2);

-- Insertion de données dans la table langue
INSERT INTO langue (nom)
VALUES 
('Français'),
('Anglais'),
('Espagnol');

-- Insertion de données dans la table parle (relation utilisateur-langue)
INSERT INTO parle (id_user, id_langue)
VALUES 
(1, 1),
(2, 2),
(3, 1);

-- Insertion de données dans la table type_animal
INSERT INTO type_animal (nom)
VALUES 
('Chien'),
('Chat'),
('Oiseau');

-- Insertion de données dans la table animal
INSERT INTO animal (nom, poids, race, age, taille, bio, vaccin, photo, id_type)
VALUES 
('Rex', 30.5, 'Berger Allemand', 5, 60.0, 'Un chien fidèle et protecteur', TRUE, 'rex.jpg', 1),
('Mimi', 4.2, 'Persan', 3, 25.0, 'Chat calme et affectueux', TRUE, 'mimi.jpg', 2),
('Tweety', 0.2, 'Canari', 2, 10.0, 'Petit oiseau joyeux', FALSE, 'tweety.jpg', 3);

-- Insertion de données dans la table activite
INSERT INTO activite (nom)
VALUES 
('Course'),
('Jeux de balle'),
('Vol');

-- Insertion de données dans la table activité_animal (relation N:M animal-activite)
INSERT INTO activité_animal (id_animal, id_activite)
VALUES 
(1, 1),
(1, 2),
(2, 2),
(3, 3);

-- Insertion de données dans la table annonce
INSERT INTO annonce (titre, prix, description, disponibilite, id_utilisateur)
VALUES 
('Garde de chien', 50.0, 'Garde de chien pour une journée', TRUE, 1),
('Cours d éducation canine', 100.0, 'Éducation pour chiots et chiens adultes', TRUE, 2),
('Promenade de chien', 20.0, 'Service de promenade pour chiens', TRUE, 3);

-- Insertion de données dans la table service
INSERT INTO service (nom)
VALUES 
('Garde d animaux'),
('Éducation canine'),
('Promenade');

-- Insertion de données dans la table annonce_service (relation N:M annonce-service)
INSERT INTO annonce_service (id_annonce, id_service)
VALUES 
(1, 1),
(2, 2),
(3, 3);

-- Insertion de données dans la table envoyer (messages entre utilisateurs)
INSERT INTO envoyer (destinataire, expediteur, message)
VALUES 
(2, 1, 'Bonjour, je suis intéressé par votre service de garde.'),
(3, 1, 'Je souhaite plus d informations sur vos services.'),
(1, 2, 'Merci pour votre intérêt, je serai disponible ce week-end.');

-- Insertion de données dans la table avis
INSERT INTO avis (id_utilisateur, id_annonce, etoile, commentaires)
VALUES 
(1, 1, 5, 'Service impeccable, très satisfait.'),
(2, 2, 4, 'Très bon éducateur, mais un peu cher.'),
(3, 3, 5, 'Mon chien adore les promenades avec lui !');

-- Insertion de données dans la table FAQ
INSERT INTO faq (question, reponse)
VALUES 
('Comment créer une annonce ?', 'Allez sur votre profil et cliquez sur "Créer une annonce".'),
('Quels sont les modes de paiement ?', 'Nous acceptons les paiements par carte de crédit et PayPal.');

-- Insertion de données dans la table CGU
INSERT INTO `cgu` (`id_cgu`, `titre`, `nom`, `type`) VALUES
(1, '1. Présentation', 'Bienvenue sur Petway ! En utilisant notre plateforme, vous acceptez les présentes conditions générales d\'utilisation.\r\n\r\n', 0),
(2, '2. Objets du site', 'Notre site met en relation des particuliers cherchant des services de garde d\'animaux avec des petsitters.', 0),
(3, '3. Présentation', 'Utilisateurs: Vous êtes responsable des informations que vous fournissez sur le site.\r\nSite: Nous fournissons la plateforme mais ne garantissons pas la qualité des services rendus par les petsitters.', 0),
(4, '4. Propriété intellectuelle', 'Tous les contenus du site (textes, images, logos) sont protégés par les lois sur la propriété intellectuelle. Toute reproduction est interdite sans autorisation.\r\n\r\n', 0),
(5, '5. Données personnelles', 'Vos données sont collectées conformément à notre politique de confidentialité et ne sont partagées qu\'avec votre consentement.\r\n\r\n', 0),
(6, '6. Modification des CGU', 'Nous nous réservons le droit de modifier ces CGU à tout moment. Les changements seront publiés sur cette page.\r\n\r\n', 0),
(7, '7. Contact', 'Pour toutes questions, merci de consulter la page de contact.', 0),
(8, '1. Éditeur du site', 'Nom du site: Petway.com\r\nResponsable de la publication: G3E', 1),
(9, '2. Hébergeur', 'Nom de l\'hébergeur: G3E neuille-land\r\nAdresse de l\'hébergeur: 15 rue du G3E, Neuille-land\r\nContact: neuille-land@nl.com', 1),
(10, '3. Déclaration des CNIL', 'Conformément à la loi Informatique et Libertés, le site a fait l\'objet d\'une déclaration à la CNIL sous le numéro 123.\r\n\r\n', 1),
(11, '4. Limitation de responsabilité', 'Nous ne sommes pas responsables des dommages directs ou indirects liés à l\'utilisation du site.\r\n\r\n', 1);


