<?php
class FormulaireAnmialController {
    public function handle () {
        include_once "view-formulaireanimal.php";
        $view = new FormulaireAnimalView();
        $view -> render();
    }
}
?>
