<?php
if (!defined('MY_APP')) {
    exit('Accès non authorisé');
}
require_once './modules/connexionBD/connxionBD.php';

class InscriptionModel extends Connexion
{
    public function checkUsernameExists($pseudo)
    {
        // Utilisez $this->bdd qui est hérité de la classe Connexion
        if ($this->checkCSRFToken()) {
            $stmt = self::$bdd->prepare('SELECT id_utilisateur FROM Utilisateur WHERE pseudo = :pseudo');
            $stmt->bindParam(':pseudo', $pseudo);
            $stmt->execute();
            return $stmt->fetch() ? true : false;
        }
    }

    public function registerUser($nom,$prenom,$pseudo, $email, $passwordHash,$ville,$photo)
    {
        if ($this->checkCSRFToken()) {
            $stmt = self::$bdd->prepare("INSERT INTO Utilisateur (nom,prenom,pseudo, email, passw_hash,ville,photo) VALUES (:nom,:prenom,:pseudo, :email, :passw_hash,:ville,:photo)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':pseudo', $pseudo);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':passw_hash', $passwordHash);
            $stmt->bindParam(':ville', $ville);
            $stmt->bindParam(':photo', $photo);
            return $stmt->execute();
        }

    }
}

?>