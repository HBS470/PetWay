<?php
require_once "./modules/profil/mod-profil.php";
require_once "./modules/profil/view-profil.php";
class ProfilController {
    public function handle() {
        // Traiter les requêtes POST pour mettre à jour le profil ou GET pour afficher
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->updateProfil();
        } else {
            $this->showProfil();
        }
    }

    private function showProfil() {
        $model = new ProfilModel();
        $view = new ProfilView();
        $id_utilisateur = $model->getId($_SESSION['user']);
        if ($id_utilisateur) {
            $profilData = $model->getProfil($id_utilisateur);
            if ($profilData) {
                $view->render($profilData);
            } else {
                echo "<p style='color: red;'>Erreur : Utilisateur introuvable.</p>";
            }
        } else {
            echo "<p style='color: red;'>Erreur : Aucun ID utilisateur spécifié.</p>";
        }
    }

    private function updateProfil() {
        $id_utilisateur = $_POST['id_utilisateur'] ?? null;
        $model = new ProfilModel();
        if ($id_utilisateur) {
            // Données de base utilisateur
            $data = [
                'nom' => $_POST['nom'] ?? '',
                'prenom' => $_POST['prenom'] ?? '',
                'ville' => $_POST['ville'] ?? '',
                'photo' => $_FILES['photo']['name'] ?? null, // Récupération du fichier photo
            ];

            // Gérer le téléchargement de la photo
            if (!empty($_FILES['photo']['tmp_name'])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES['photo']['name']);
                move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);
            }

            // Informations supplémentaires pour le petsitter
            $petsitterData = [
                'daily_routine' => $_POST['daily_routine'] ?? '',
                'additional_info' => $_POST['additional_info'] ?? '',
                'animals' => isset($_POST['animals']) ? implode(',', $_POST['animals']) : '',
                'hosting' => isset($_POST['hosting']) ? implode(',', $_POST['hosting']) : '',
                'price_own' => $_POST['price_own'] ?? null,
                'price_client' => $_POST['price_client'] ?? null,
            ];

            // Informations sur l’environnement
            $environmentData = [
                'children_present' => in_array('children_present', $_POST['environment'] ?? []) ? 1 : 0,
                'non_smoking' => in_array('non_smoking', $_POST['environment'] ?? []) ? 1 : 0,
                'garden' => in_array('garden', $_POST['environment'] ?? []) ? 1 : 0,
                'building' => in_array('building', $_POST['environment'] ?? []) ? 1 : 0,
                'other_animals' => in_array('other_animals', $_POST['environment'] ?? []) ? 1 : 0,
            ];

            // Mettre à jour les données
            if ($model->updateProfil($id_utilisateur, $data, $petsitterData, $environmentData)) {
                // Redirection pour éviter le double affichage de messages
                header("Location: ?module=profil");
                exit;
            } else {
                echo "<p style='color: red;'>Erreur lors de la mise à jour du profil.</p>";
            }
        } else {
            echo "<p style='color: red;'>Erreur : ID utilisateur manquant.</p>";
        }
    }
}
?>
