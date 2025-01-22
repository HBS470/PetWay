<?php

require_once './modules/connexionBD/connexionBD.php';

class ProfilModel extends ConnexionBD {

    public function getId($user) {
        $stmt = self::$bdd -> prepare("SELECT id_utilisateur FROM Utilisateur WHERE pseudo = :user");
        $stmt -> bindParam(':user',$user);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['id_utilisateur'];
    }

    // Récupérer les informations utilisateur
    public function getProfil($id_utilisateur) {
        $query = self::$bdd->prepare("
            SELECT u.*, p.journee, p.animaux, p.hebergement, p.informations_sup
            FROM utilisateur u
            LEFT JOIN petsitter p ON u.id_utilisateur = p.id_utilisateur
            WHERE u.id_utilisateur = :id_utilisateur
        ");
        $query->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour les informations utilisateur
    public function updateProfil($id_utilisateur, $data, $petsitterData, $environmentData) {
        try {
            self::$bdd->beginTransaction();

            // Mise à jour de la table utilisateur
            $queryUser = self::$bdd->prepare("
                UPDATE utilisateur 
                SET nom = :nom, prenom = :prenom, ville = :ville, photo = :photo 
                WHERE id_utilisateur = :id_utilisateur
            ");
            $queryUser->execute(array_merge($data, ['id_utilisateur' => $id_utilisateur]));

            // Mise à jour de la table petsitter
            $queryPetsitter = self::$bdd->prepare("
                INSERT INTO petsitter (id_utilisateur, journee, animaux, hebergement, informations_sup)
                VALUES (:id_utilisateur, :daily_routine, :animals, :hosting, :additional_info)
                ON DUPLICATE KEY UPDATE
                journee = :daily_routine, animaux = :animals, hebergement = :hosting, informations_sup = :additional_info
            ");
            $queryPetsitter->execute(array_merge($petsitterData, ['id_utilisateur' => $id_utilisateur]));

            // Mise à jour de la table environnement
            $queryEnvironment = self::$bdd->prepare("
                INSERT INTO environnement (id_petsitter, enfants_presents, foyer_non_fumeur, jardin, immeuble, presence_animaux)
                VALUES (
                    (SELECT id_petsitter FROM petsitter WHERE id_utilisateur = :id_utilisateur LIMIT 1),
                    :children_present, :non_smoking, :garden, :building, :other_animals
                )
                ON DUPLICATE KEY UPDATE
                enfants_presents = :children_present, foyer_non_fumeur = :non_smoking, 
                jardin = :garden, immeuble = :building, presence_animaux = :other_animals
            ");
            $queryEnvironment->execute(array_merge($environmentData, ['id_utilisateur' => $id_utilisateur]));

            self::$bdd->commit();
            return true;
        } catch (Exception $e) {
            self::$bdd->rollBack();
            throw $e;
        }
    }
}
?>
