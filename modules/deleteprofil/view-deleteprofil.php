<?php
class DeleteProfilView {
    public function render() {
        $sucess = isset($_SESSION['success_delete']) ? $_SESSION['success_delete'] : '';
        displayMessage($sucess);
    }
}
