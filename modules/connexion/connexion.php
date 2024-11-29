<?php

require_once './modules/connexionBD/connexionBD.php';

class ConnexionModel extends ConnexionBD {

    public function checkCredentials($username, $password) {
        $stmt = self::$bdd->prepare('SELECT nom FROM utilisateur');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['passw_hash'])) {
            if ($this->checkCSRFToken()){
                return true;
            }
        }

        return false;
    }

    public function getRole($name) {
            $stmt = self::$bdd->prepare("SELECT role FROM utilisateur WHERE username=:name");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $result['role'] : null;
    }
}
?>