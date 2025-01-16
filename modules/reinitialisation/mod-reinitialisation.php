<?php
//if (!defined('MY_APP')) {
//    exit('Accès non authorisé');
//}
require_once './modules/connexionBD/connexionBD.php';

class ReinitialisationModel extends ConnexionBD
{
    public function getEmailByToken($token)
    {
//        if ($this->checkCSRFToken()) {
        $stmt = self::$bdd->prepare('SELECT email FROM password_resets WHERE token = :token');
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['email'] : null;
        //        }
    }

    public function updatePassword($email,$newPassword) {
        $stmt = self::$bdd -> prepare('UPDATE utilisateur SET passw_hash = :newpassword WHERE email = :email');
        $stmt->bindParam(':newpassword',$newPassword);
        $stmt->bindParam(':email',$email);
        return $stmt->execute();
    }

    public function deleteResetToken($token)
    {
        $stmt = self::$bdd -> prepare('DELETE FROM password_resets WHERE token = :token');
        $stmt->bindParam(':token',$token);
        return $stmt->execute();
    }

    function validateToken($token, $email) {
        $stmt = self::$bdd->prepare('SELECT token FROM password_resets WHERE email = :email AND expires_at > NOW()');
        $stmt->execute([':email' => $email]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row && $token === $row['token']) {
            return true; // Le token est valide
        }

        return false; // Token invalide ou expiré
    }

}
