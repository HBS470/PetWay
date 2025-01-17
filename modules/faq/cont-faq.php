<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//if (!defined('MY_APP')) {
//    exit('Accès non autorisé');
//}

require_once 'mod-faq.php';
require_once 'view-faq.php';


class FAQController {
    
    public static function handle() {
        $model = new FAQModel();
        $view = new FAQView();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = htmlspecialchars($_POST['email'] ?? '');
            $question = htmlspecialchars($_POST['question'] ?? '');


            if (empty($email)) {
                $_SESSION['error_message'] = 'Le mail est obligatoire !';
                $view->render();
                return;
            }elseif (empty($question)) {
                $_SESSION['error_message'] = 'La question est obligatoire !';
                $view->render();
                return;
            }


            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error_message'] = 'L\'adresse e-mail est invalide.';
                $view->render();
                exit;

            }

            if ($model->registerQuestion($question)) {
                $view->render();
                exit;

            } else {
                $_SESSION['error_message'] = 'Une erreur est survenue !';
                $view->render();
                exit;
            }
            exit;
        } else {
            $view->render();
        }
    }
}

?>