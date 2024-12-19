<?php
class FaqController {
    public function handle() {

        include_once "./modules/faq/view-faq.php";
        $view = new FaqView();
        $view->render();
    }
}

?>