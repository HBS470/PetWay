<?php
//if (!defined('MY_APP')) {
//    exit('Accès non autorisé');
//}

require_once './modules/recherche/mod-recherche.php';
require_once './modules/recherche/view-recherche.php';

class RechercheController {
    public function handle() {
        $model = new RechercheModel();
        $view = new RechercheView();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $animalTypes = [];
            if (isset($_POST['chien'])) $animalTypes[] = 'chien';
            if (isset($_POST['chat'])) $animalTypes[] = 'chat';
            if (isset($_POST['lapin'])) $animalTypes[] = 'lapin';

            if ($_POST['hebergement'] = 1) {
                $serviceType = 'hebergement';

            }
            else {
                $serviceType = 'garde';
            }

            $adresse = $_POST['adresse'] ?? '';
            $arrivee = $_POST['arrivee'] ?? '';
            $depart = $_POST['depart'] ?? '';
            $tailleDuChien = $_POST['taille_chien'] ?? '';

            var_dump($serviceType);
            var_dump($tailleDuChien);
            var_dump($animalTypes);

            // Traitement des données
            // $resultats = $model->rechercherServices($animalTypes, $serviceType, $adresse, $arrivee, $depart, $tailleDuChien);

            // Affichage des résultats
            $view->render();
        } else {
            // Affichage du formulaire initial
            $view->render();
        }
    }
}
