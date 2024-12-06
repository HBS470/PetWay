<?php



if (!defined('MY_APP')) {
    exit('Accès non autorisé');
}

require_once './modules/inscription/mod-inscription.php';
require_once './modules/inscription/view-inscription.php';

class InscriptionController {
    public function handle() {
        $model = new InscriptionModel();
        $view = new InscriptionView();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'] ?? '';
            $prenom = $_POST['prenom'] ?? '';
            $pseudo = $_POST['pseudo'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';
            $ville = $_POST['ville'] ?? '';
            $photo = $_POST['photo'] ?? '';

            if (empty($nom) || empty($prenom)  || empty($pseudo) || empty($email) || empty($password)) {
                $_SESSION['error_message'] = 'Les champs ne doivent pas être vides.';
                $view->render();
                return;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error_message'] = 'L\'adresse e-mail est invalide.';
                $view->render();
                return;
            }

            if ($password !== $confirm_password) {
                $_SESSION['error_message'] = 'Les mots de passe ne correspondent pas.';
                $view->render();
                return;
            }

            if (strlen($password) < 5) {
                $_SESSION['error_message'] = 'Le mot de passe doit contenir au moins 5 caractères.';
                $view->render();
                return;
            }

            if ($model->checkUsernameExists($pseudo)) {
                $_SESSION['error_message'] = 'Ce pseudo est déjà pris, veuillez en choisir un autre.';
                $view->render();
                return;
            }

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            if ($model->registerUser($nom,$prenom,$pseudo, $email, $passwordHash,$ville,$photo)) {
                $_SESSION['success_message'] = 'Inscription réussie. Vous pouvez maintenant vous connecter.';
                header('Location: index.php?module=connexion');
                exit;
            } else {
                $_SESSION['error_message'] = 'Une erreur est survenue lors de l\'inscription.';
                $view->render();
                return;
            }
        } else {
            $view->render();
        }
    }
}

?>