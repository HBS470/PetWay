<?php
class ProfilController {
    public function handle () {
        include_once "view-profil.php";
        $view = new ProfilView();
        $view -> render();
    }
}
?>