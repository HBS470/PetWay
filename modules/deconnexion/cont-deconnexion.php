<?php


//if (!defined('MY_APP')) {
//    exit('Accès non autorisé');
//}


require_once './modules/deconnexion/mod-deconnexion.php';


class DeconnexionController {
    public function handle() {
        $model = new DeconnexionModel();
        $model->cleanUp();

        // Détruire la session et rediriger l'utilisateur.
        $_SESSION = array();
        session_destroy();
        header('Location: index.php');
        exit;
    }
}


?>