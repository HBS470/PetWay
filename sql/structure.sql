DROP TABLE IF EXISTS utilisateur;
DROP TABLE IF EXISTS droit;
DROP TABLE IF EXISTS a_le_droit;
DROP TABLE IF EXISTS langue;
DROP TABLE IF EXISTS parler;
DROP TABLE IF EXISTS animal;
DROP TABLE IF EXISTS type_animal;
DROP TABLE IF EXISTS activite;
DROP TABLE IF EXISTS fait;
DROP TABLE IF EXISTS annonce;
DROP TABLE IF EXISTS service;
DROP TABLE IF EXISTS rend;
DROP TABLE IF EXISTS envoyer;
DROP TABLE IF EXISTS avis;
DROP TABLE IF EXISTS cgu;
DROP TABLE IF EXISTS faq;
DROP TABLE IF EXISTS password_resets;

-- Table utilisateur (1)
CREATE TABLE utilisateur (
                             id_utilisateur INT PRIMARY KEY AUTO_INCREMENT,
                             nom VARCHAR(255),
                             prenom VARCHAR(255),
                             pseudo VARCHAR(255),
                             passw_hash TEXT,
                             email VARCHAR(255),
                             ville VARCHAR(255),
                             photo VARCHAR(255)
);

-- Table droit (1)
CREATE TABLE droit (
                       id_droit INT PRIMARY KEY AUTO_INCREMENT,
                       nom VARCHAR(255)
);

-- Table a_le_droit (1,N relation entre utilisateur et droit)
CREATE TABLE a_le_droit (
                            id_aledroit INT PRIMARY KEY AUTO_INCREMENT,
                            id_utilisateur INT,
                            id_droit INT,
                            FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur),
                            FOREIGN KEY (id_droit) REFERENCES droit(id_droit)
);

-- Table langue (1)
CREATE TABLE langue (
                        id_langue INT PRIMARY KEY AUTO_INCREMENT,
                        nom VARCHAR(255)
);

-- Relation "parle" (1,1 relation entre utilisateur et langue)
CREATE TABLE parle (
                       id_parle INT PRIMARY KEY AUTO_INCREMENT,
                       id_user INT,
                       id_langue INT,
                       FOREIGN KEY (id_user) REFERENCES utilisateur(id_utilisateur),
                       FOREIGN KEY (id_langue) REFERENCES langue(id_langue)
);

-- Table animal (1)
CREATE TABLE animal (
                        id_animal INT PRIMARY KEY AUTO_INCREMENT,
                        nom VARCHAR(255),
                        poids FLOAT,
                        race VARCHAR(255),
                        age INT,
                        taille FLOAT,
                        bio TEXT,
                        vaccin BOOLEAN,
                        photo VARCHAR(255)
);

-- Table type_animal (1)
CREATE TABLE type_animal (
                             id_type INT PRIMARY KEY AUTO_INCREMENT,
                             nom VARCHAR(255)
);

-- Table est (1,1 relation entre animal et type_animal)
-- Un animal appartient à un seul type d'animal
ALTER TABLE animal ADD COLUMN id_type INT;
ALTER TABLE animal
    ADD FOREIGN KEY (id_type) REFERENCES type_animal(id_type);

-- Table activite (1)
CREATE TABLE activite (
                          id_activite INT PRIMARY KEY AUTO_INCREMENT,
                          nom VARCHAR(255)
);

-- Table fait (relation N:M entre animal et activite)
CREATE TABLE activité_animal (
                                 id_activité_animal INT PRIMARY KEY AUTO_INCREMENT,
                                 id_animal INT,
                                 id_activite INT,
                                 FOREIGN KEY (id_animal) REFERENCES animal(id_animal),
                                 FOREIGN KEY (id_activite) REFERENCES activite(id_activite)
);

-- Table annonce (1)
CREATE TABLE annonce (
                         id_annonce INT PRIMARY KEY AUTO_INCREMENT,
                         titre VARCHAR(255),
                         prix FLOAT,
                         description TEXT,
                         disponibilite DATE
);

-- Table creer (relation 1,N entre utilisateur et annonce)
-- Un utilisateur peut créer plusieurs annonces, mais une annonce appartient à un seul utilisateur
ALTER TABLE annonce ADD COLUMN id_utilisateur INT;
ALTER TABLE annonce
    ADD FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur);

-- Table service (1)
CREATE TABLE service (
                         id_service INT PRIMARY KEY AUTO_INCREMENT,
                         nom VARCHAR(255)
);

-- Table annonce_service (relation N:M entre annonce et service)
CREATE TABLE annonce_service (
                                 id_annonce_service INT PRIMARY KEY AUTO_INCREMENT,
                                 id_annonce INT,
                                 id_service INT,
                                 FOREIGN KEY (id_annonce) REFERENCES annonce(id_annonce),
                                 FOREIGN KEY (id_service) REFERENCES service(id_service)
);

-- Table envoyer (relation 1,N entre utilisateur et message)
-- Un utilisateur peut envoyer plusieurs messages
CREATE TABLE envoyer (
                         id_envoyer INT PRIMARY KEY AUTO_INCREMENT,
                         destinataire INT,
                         expediteur INT,
                         message TEXT,
                         FOREIGN KEY (destinataire) REFERENCES utilisateur(id_utilisateur),
                         FOREIGN KEY (expediteur) REFERENCES utilisateur(id_utilisateur)
);

-- Table avis (relation 1,N entre utilisateur et annonce pour les avis)
-- Un utilisateur peut laisser plusieurs avis sur différentes annonces
CREATE TABLE avis (
                      id_avis INT PRIMARY KEY AUTO_INCREMENT,
                      id_utilisateur INT,
                      id_annonce INT,
                      etoile INT,
                      commentaires TEXT,
                      FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur),
                      FOREIGN KEY (id_annonce) REFERENCES annonce(id_annonce)
);

-- Table FAQ (1)
CREATE TABLE faq (
                     id_faq INT PRIMARY KEY AUTO_INCREMENT,
                     question TEXT,
                     reponse TEXT
);

-- Table CGU (1)
CREATE TABLE cgu (
                     id_cgu INT PRIMARY KEY AUTO_INCREMENT,
                     nom VARCHAR(255)
);

CREATE TABLE `password_resets` (
                                                 `id` int NOT NULL AUTO_INCREMENT,
                                                 `email` varchar(255) NOT NULL,
                                                 `token` varchar(255) NOT NULL,
                                                 `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                                                 `expires_at` timestamp GENERATED ALWAYS AS (created_at + INTERVAL 1 HOUR) STORED,
                                                 PRIMARY KEY (`id`)
);
