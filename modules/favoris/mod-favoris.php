<?php
require_once './modules/connexionBD/connexionBD.php';

class FavorisModel extends ConnexionBD {

    // Ajouter un profil aux favoris
    public function addFavori($userId, $favoriId) {
        $stmt = $this->bdd->prepare("INSERT INTO favoris (utilisateur_id, favori_id) VALUES (:userId, :favoriId)");
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':favoriId', $favoriId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Retirer un profil des favoris
    public function removeFavori($userId, $favoriId) {
        $stmt = $this->bdd->prepare("DELETE FROM favoris WHERE utilisateur_id = :userId AND favori_id = :favoriId");
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':favoriId', $favoriId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Vérifier si un profil est en favori
    public function isFavori($userId, $favoriId) {
        $stmt = $this->bdd->prepare("SELECT 1 FROM favoris WHERE utilisateur_id = :userId AND favori_id = :favoriId");
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':favoriId', $favoriId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() !== false;
    }

    // Récupérer tous les favoris d'un utilisateur
    public function getFavoris($userId) {
        $stmt = $this->bdd->prepare("SELECT u.* FROM utilisateur u
                                     INNER JOIN favoris f ON u.id_utilisateur = f.favori_id
                                     WHERE f.utilisateur_id = :userId");
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

