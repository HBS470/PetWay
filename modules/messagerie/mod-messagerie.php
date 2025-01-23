<?php
require_once './modules/connexionBD/connexionBD.php';

class MessagerieModel extends ConnexionBD {
    public function getMessage($id,$otherid) {
        $query = "
                SELECT * FROM envoyer
                WHERE (expediteur = :userId AND destinataire = :otherUserId)
                OR (expediteur = :otherUserId AND destinataire = :userId)
                ORDER BY id_envoyer ASC
            ";
        $stmt = self::$bdd->prepare($query);
        $stmt->bindParam(':userId',$id);
        $stmt->bindParam(':otherUserIs',$otherid);
        $stmt->execute();
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUser(){
        $stmt = self::$bdd->prepare("SELECT id_utilisateur, nom, prenom, email FROM utilisateur");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function send($exp,$des,$message){
        $query = "INSERT INTO envoyer (expediteur, destinataire, message) VALUES (:senderId, :receiverId, :message)";
        $stmt = self::$bdd->prepare($query);
        $stmt->bindParam(':senderId',$exp);
        $stmt->bindParam(':receiverId',$des);
        $stmt->bindParam(':message',$message);
        $stmt->execute();
    }

}