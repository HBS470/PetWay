<?php
require_once './modules/formulaireanimal/mod-formulaireanimal.php';
require_once './modules/formulaireanimal/view-formulaireanimal.php';

class FormulaireAnimalController {
    public function handle() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $animal = $_POST['animal'];
            $poids = $_POST['poids'];
            $nom = $_POST['nom'];
            $race = $_POST['race'];
            $age = $_POST['age'];
            $taille = $_POST['taille'];
            $frequence = $_POST['frequence'];
            $quantite = $_POST['quantite'];
            $type = $_POST['type'];
            $restrictions = $_POST['restrictions'];
            $habitudes = $_POST['habitudes'];
            $exercice = $_POST['exercice'];
            $maladies = $_POST['maladies'];
            $medicaments = $_POST['medicaments'];
            $caractere = $_POST['caractere'];
            $horaires = $_POST['horaires'];
            $instructions = $_POST['instructions'];
            $photo = $_FILES['photo'];

            
            if ($photo['error'] === UPLOAD_ERR_OK) {
                $allowedExtensions = ['jpeg', 'jpg', 'png'];
                $fileExtension = strtolower(pathinfo($photo['name'], PATHINFO_EXTENSION));

                if (in_array($fileExtension, $allowedExtensions) && $photo['size'] <= 5 * 1024 * 1024) {
                    $photoPath = 'uploads/' . uniqid() . '.' . $fileExtension;
                    if (!move_uploaded_file($photo['tmp_name'], $photoPath)) {
                        die("Erreur : Impossible de sauvegarder l'image.");
                    }
                } else {
                    die("Erreur : Format ou taille de fichier non valide.");
                }
            } else {
                die("Erreur lors du téléchargement de l'image.");
            }

           
            $model = new FormulaireAnimalModel();
            $result = $model->ajouterAnimal(
                $animal, $poids, $nom, $race, $age, $taille, $frequence,
                $quantite, $type, $restrictions, $habitudes, $exercice, 
                $maladies, $medicaments, $caractere, $horaires, $instructions, $photoPath
            );

            if ($result) {
                echo "Animal ajouté avec succès.";
            } else {
                echo "Erreur lors de l'ajout de l'animal.";
            }
        }
        $view = new FormulaireAnimalView();
        $view->render();
    }
}
?>
