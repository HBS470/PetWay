<?php
require_once './modules/connexionBD/connexionBD.php';

class DeleteProfilModel extends ConnexionBD {

    // Méthode pour supprimer le profil utilisateur
    public function deleteProfil($userId) {
        // Récupérer le chemin de la photo avant suppression
        $stmt = self::$bdd->prepare("SELECT photo FROM utilisateur WHERE id_utilisateur = ?");
        $stmt->execute([$userId]);
        $photo = $stmt->fetchColumn();

        // Supprimer l'utilisateur de la base de données
        $stmt = self::$bdd->prepare("DELETE FROM utilisateur WHERE id_utilisateur = ?");
        $result = $stmt->execute([$userId]);

        // Si suppression réussie et photo existante, supprimer la photo
        if ($result && $photo && file_exists("uploads/" . $photo)) {
            unlink("uploads/" . $photo);
        }

        return $result;
    }
}
?>
