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
                $_SESSION['error_reinitialisation'] = "Les mots de passe ne correspondent pas.";
                $view->render();
                exit;
            }

            $email = $model->getEmailByToken($token);

            if ($email) {
                if ($model->validateToken($token, $email)) {
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    $model->updatePassword($email, $hashedPassword);
                    $model->deleteResetToken($token);

                    $_SESSION['sucess_reinitialisation'] = "Votre mot de passe a été réinitialisé.";
                } else {
                    $_SESSION['error_reinitialisation'] = "Token invalide ou expiré.";
                }
            } else {
                $_SESSION['error_reinitialisation'] = 'L\'email n\'est pas associé à ce token';
            }
            $view->render();
            exit;
        } else {
            $view->render();
        }
    }

}
