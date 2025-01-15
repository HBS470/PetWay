<?php
require_once "./modules/reinitialisation/mod-reinitialisation.php";
require_once "./modules/reinitialisation/view-reinitialisation.php";


class ReinitialisationController {
    public function handle() {
        $model = new ReinitialisationModel();
        $view = new ReinitialisationView();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['token'] ?? '';
            $newPassword = $_POST['new_password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            if ($newPassword !== $confirmPassword) {
                echo "Les mots de passe ne correspondent pas.";
                return;
            }

            $email = $model->getEmailByToken($token);

            if ($email) {
                if ($model->validateToken($token, $email)) {
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    $model->updatePassword($email, $hashedPassword);
                    $model->deleteResetToken($token);

                    $_SESSION['success_message'] = "Votre mot de passe a été réinitialisé.";
                    header("Location: index.php?module=connexion");
                } else {
                    $_SESSION['error_message'] = "Token invalide ou expiré.";
                }
            } else {
                $_SESSION['error_message'] = 'L\'email n\'est pas associé à ce token';
            }
        } else {
            $view->render();
        }
    }

}
