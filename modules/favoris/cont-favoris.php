<?php
require_once './modules/favoris/mod-favoris.php';
require_once './modules/favoris/view-favoris.php';

class FavorisController
{
    public function handle()
    {
        $model = new FavorisModel();
        $view = new FavorisView();


    }

    public function toggleFavori()
    {
        $model = new FavorisModel();

        $userId = $_SESSION['user_id'];
        $favoriId = $_POST['favori_id'];

        if ($model->isFavori($userId, $favoriId)) {
            $model->removeFavori($userId, $favoriId);
            echo json_encode(['status' => 'removed']);
        } else {
            $model->addFavori($userId, $favoriId);
            echo json_encode(['status' => 'added']);
        }
    }

    // Afficher la liste des favoris
    public function showFavoris() {
        $model = new FavorisModel();
        $userId = $_SESSION['user_id'];
        $favoris = $model->getFavoris($userId);

    }
}