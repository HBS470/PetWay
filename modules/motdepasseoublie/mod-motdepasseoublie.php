<?php
//if (!defined('MY_APP')) {
//    exit('Accès non authorisé');
//}
require_once './modules/connexionBD/connexionBD.php';

class MotDePasseOublieModel extends ConnexionBD
{
    public function emailExists($email)
    {
//        if ($this->checkCSRFToken()) {
        $stmt = self::$bdd->prepare('SELECT email FROM Utilisateur WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch() ? true : false;
//        }
    }

    public function storeResetToken($email, string $token)
    {
//      if ($this->checkCSRFToken()) {
        $stmt = self::$bdd->prepare('DELETE FROM password_resets WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $stmt2 = self::$bdd->prepare("INSERT INTO password_resets (email,token) VALUES (:email, :token)");
        return $stmt2->execute(([
            ':email' => $email,
            ':token' => $token,
        ]));
//      }
    }


}