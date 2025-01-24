<?php

require_once './modules/connexionBD/connexionBD.php';

class InfosModel extends ConnexionBD {

    // Récupérer les informations utilisateur
    public function getProfil($id_utilisateur) {
        $query = self::$bdd->prepare("
            SELECT u.*
            FROM utilisateur u
            WHERE u.id_utilisateur = :id_utilisateur
        ");
        $query->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour les informations utilisateur
    public function updateProfil($userId, $nom, $prenom, $ville, $email, $photo = null) {
        $query = "UPDATE utilisateur
              SET nom = ?, prenom = ?, ville = ?, email = ?"
            . ($photo ? ", photo = ?" : "") // Ajoute le champ photo uniquement si nécessaire
            . " WHERE id_utilisateur = ?";
        $params = [$nom, $prenom, $ville, $email];
        if ($photo) {
            $params[] = $photo;
        }
        $params[] = $userId;

        $stmt = self::$bdd->prepare($query);
        return $stmt->execute($params);
    }

}
?>
