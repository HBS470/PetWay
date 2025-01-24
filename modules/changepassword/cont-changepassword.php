<?php
require_once "./modules/changepassword/mod-changepassword.php";
require_once "./modules/changepassword/view-changepassword.php";

class ChangePasswordController {
    public function handle() {
        $model = new ChangePasswordModel();
        $view = new ChangePasswordView();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $currentPassword = $_POST['current_password'] ?? '';
            $newPassword = $_POST['new_password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            // Validation des champs
            if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
                $view->render("Veuillez remplir tous les champs.");
                return;
            }

            if ($newPassword !== $confirmPassword) {
                $view->render("Les nouveaux mots de passe ne correspondent pas.");
                return;
            }

            // Vérification du mot de passe actuel
            $userId = $_SESSION['user_id'];
            $userData = $model->getUserById($userId); // Implémentez une méthode `getUserById`

            if (!password_verify($currentPassword, $userData['passw_hash'])) {
                $view->render("Le mot de passe actuel est incorrect.");
                return;
            }

            // Mise à jour du mot de passe
            if ($model->updatePassword($userId, $newPassword)) {
                $view->render("Mot de passe changé avec succès.");
            } else {
                $view->render("Une erreur est survenue. Veuillez réessayer.");
            }
        } else {
            $view->render();
        }
    }
}
?>
