<?php


//if (!defined('MY_APP')) {
//    exit('Accès non autorisé');
//}




class DeconnexionController {
    public function handle() {
        // Détruire la session et rediriger l'utilisateur.
        $_SESSION = array();
        session_destroy();
        header('Location: index.php');
        exit;
    }
}


?>