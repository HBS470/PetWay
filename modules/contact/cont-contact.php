<?php
class ContactController {

    public function handle () {
        include_once "view-contact.php";
        $view = new ContactView();
        $view ->render();
    }
}
?>