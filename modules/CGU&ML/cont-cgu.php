<?php
class CguController {

    public function handle () {
        include_once "view-cgu.php";
        $view = new CguView();
        $view ->render();
    }
}
?>