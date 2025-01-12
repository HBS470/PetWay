<?php
//if (!defined('MY_APP')) {
//    exit('Accès non authorisé');
//}

require_once __DIR__ . '/../connexionBD/connexionBD.php';


class FAQModel extends ConnexionBD
{
    public function registerQuestion($question)
    {
//        if ($this->checkCSRFToken()) {
            $stmt = self::$bdd->prepare("INSERT INTO faq (question) VALUES (:question)");
            $stmt->bindParam(':question', $question);

            return $stmt->execute();
//        }

    }
}

?>