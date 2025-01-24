<?php
require_once './modules/connexionBD/connexionBD.php';

class ChangePasswordModel extends ConnexionBD {
    public function updatePassword($userId, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = self::$bdd->prepare("UPDATE utilisateur SET passw_hash = ? WHERE id_utilisateur = ?");
        return $stmt->execute([$hashedPassword, $userId]);
    }
    public function getUserbyId($userId) {
        $stmt = self::$bdd->prepare("SELECT * FROM utilisateur WHERE id_utilisateur = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
