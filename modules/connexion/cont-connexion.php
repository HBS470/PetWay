<?php


if (!defined('MY_APP')) {
    exit('Accès non autorisé');
}

require_once './modules/connexion/mod-connexion.php';
require_once './modules/connexion/view-connexion.php';

class ConnexionController
{
    public function handle()
    {
        $model = new ConnexionModel();
        $view = new ConnexionView();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = $_POST['pseudo'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($pseudo) || empty($password)) {
                $_SESSION['error_message'] = 'Veuillez remplir tous les champs !';
                $view->render();
                return;
            }

            if ($model->checkCredentials($pseudo, $password)) {

                // régénérer l'ID de session pour eviter les attaques de fixation d'ID
                session_regenerate_id(true);

                $_SESSION['user'] = $pseudo;
                $_SESSION['role'] = $model->getRole($pseudo);

                header('Location: index.php');
                exit;
            } else {
                $_SESSION['error_message'] = 'Identifiants incorrects !';
                $view->render();
                return;
            }
        } else {
            $view->render();
        }
    }
}
