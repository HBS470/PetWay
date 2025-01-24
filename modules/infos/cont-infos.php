<?php
require_once "./modules/infos/mod-infos.php";
require_once "./modules/infos/view-infos.php";
class InfosController {
    public function handle() {
        $model = new InfosModel();
        $view = new InfosView();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'] ?? '';
            $prenom = $_POST['prenom'] ?? '';
            $ville = $_POST['ville'] ?? '';
            $email = $_POST['email'] ?? '';

            $this->update($nom, $prenom, $ville, $email);

            $results = $model->getProfil($_SESSION['user_id']);
            $view->render($results);
        }
        else {
            $results = $model->getProfil($_SESSION['user_id']);
            $view->render($results);
        }
    }

    public function update($nom, $prenom, $ville, $email) {
        $model = new InfosModel();

        // Gestion de l'image
        $photo = null;
        if (!empty($_FILES['photo']['tmp_name'])) {
            $target_dir = "uploads/";
            $file_extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $target_file = $target_dir . basename($_SESSION['user'] . "." . $file_extension);

            // Vérifier s'il existe déjà une ancienne photo pour cet utilisateur
            $existing_file = glob($target_dir . $_SESSION['user'] . ".*");
            if (!empty($existing_file)) {
                foreach ($existing_file as $file) {
                    unlink($file);
                }
            }

            // Déplace le fichier uploadé
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
                $photo = basename($target_file);
            } else {
                // En cas d'erreur lors de l'upload
                die("Erreur lors de l'upload de l'image.");
            }
        }

        // Mise à jour des informations utilisateur dans la base de données
        if ($model->updateProfil($_SESSION['user_id'], $nom, $prenom, $ville, $email, $photo)) {
            header("Location: ?module=infos");
            exit;
        } else {
            die("Erreur lors de la mise à jour des informations.");
        }
    }


}
?>
