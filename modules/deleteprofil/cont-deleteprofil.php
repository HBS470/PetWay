<?php
require_once "./modules/deleteprofil/mod-deleteprofil.php";
require_once "./modules/deleteprofil/view-deleteprofil.php";

class DeleteProfilController {
    public function handle() {
        $model = new DeleteProfilModel();
        $view = new DeleteProfilView();

        if (isset($_SESSION['user_id'])) {
            if ($model->deleteProfil($_SESSION['user_id'])) {
                // Déconnecter l'utilisateur après suppression
                session_destroy();
                $_SESSION['success_delete'] = 'Utilisateur supprimé !';
                $view->render();
                header('Refresh:1; url=index.php');
                exit;
            } else {
                echo "Erreur lors de la suppression du profil.";
            }
        } else {
            echo "Utilisateur non identifié.";
        }
    }
}
?>
