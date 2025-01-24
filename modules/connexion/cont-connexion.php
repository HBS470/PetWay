<?php


//if (!defined('MY_APP')) {
//    exit('Accès non autorisé');
//}

require_once './modules/connexion/mod-connexion.php';
require_once './modules/connexion/view-connexion.php';

class ConnexionController
{
    public function handle() {
        unset($_SESSION['error_message']); // Effacer le message d'erreur après l'affichage
        unset($_SESSION['role']);

        $model = new ConnexionModel();
        $view = new ConnexionView();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = $_POST['pseudo'] ?? '';
            $password = $_POST['password'] ?? '';
            $_SESSION['active_tab'] = 'login';

            if (empty($pseudo) && empty($password)) {
                $_SESSION['error_message'] = 'Veuillez remplir tous les champs !';
                $view->render();
                exit;
            } elseif (empty($password)) {
                $_SESSION['error_message'] = 'Veuillez saisir un mot de passe !';
                $view->render();
                exit;
            } elseif(empty($pseudo)) {
                $_SESSION['error_message'] = 'Veuillez saisir un pseudo !';
                $view->render();
                exit;
            }

            if ($model->checkCredentials($pseudo, $password)) {

                // régénérer l'ID de session pour eviter les attaques de fixation d'ID
                session_regenerate_id(true);

                $_SESSION['user'] = $pseudo;
                $_SESSION['role'] = $model->getRole($pseudo);
                $_SESSION['user_id'] = $model->getId($pseudo);
                $_SESSION['url_photo'] = $model->getPhoto($pseudo) ;
                $_SESSION['success_message'] =  'Connexion réussie !';
                $view->render();
                header('Refresh:1; url=index.php');
            } else {
                $_SESSION['error_message'] = 'Identifiants incorrects !';
                $view->render();
            }
            exit;
        } else {
            $view->render();
        }
    }
}

