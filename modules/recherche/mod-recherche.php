<?php
//if (!defined('MY_APP')) {
//    exit('Accès non authorisé');
//}
require_once './modules/connexionBD/connexionBD.php';

class RechercheModel extends ConnexionBD {
    public function search() {
        $stmt = self::$bdd->prepare("SELECT ");

    }



}