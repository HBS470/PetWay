<?php
//if (!defined('MY_APP')) {
//    exit('Accès non autorisé');
//}

require_once './modules/connexionBD/connexionBD.php';

class ConnexionModel extends ConnexionBD {

    public function checkCredentials($pseudo, $password) {
        $stmt = self::$bdd->prepare('SELECT pseudo, passw_hash FROM utilisateur WHERE pseudo = :pseudo');
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['passw_hash'])) {
//            if ($this->checkCSRFToken()){
                return true;
//            }
        }

        return false;
    }

    public function getRole($name) {
            $stmt = self::$bdd->prepare("SELECT droit.nom FROM droit INNER JOIN a_le_droit USING (id_droit) INNER JOIN utilisateur USING (id_utilisateur) WHERE pseudo=:name");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);

            return $stmt->execute();
    }

    public function getId($pseudo)
    {
        $stmt = self::$bdd->prepare("SELECT id_utilisateur FROM Utilisateur WHERE pseudo=:nom");
        $stmt->bindParam(':nom',$pseudo);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['id_utilisateur'];
    }
}
?>