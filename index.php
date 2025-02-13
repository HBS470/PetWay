<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset= "UTF-8"/>
		<title>PetWay</title>
        <link rel="stylesheet" href="css+js/style.css">
        <script src="css+js/script.js"></script>
	</head>
	<body>
	<?php
    session_start();
    require_once  'PHPMailer/PHPMailer-master/src/Exception.php';
    require_once  'PHPMailer/PHPMailer-master/src/PHPMailer.php';
    require_once  'PHPMailer/PHPMailer-master/src/SMTP.php';
    include_once "header.php";

    if (isset($_GET['module'])) {
        $module = $_GET['module'];

        switch ($module) {
            case 'profilpetsitter' :
                include_once "modules/profilpetsitter/cont-profilpetsitter.php";
                $controller = new ProfilPetsitterController();
                $controller -> handle();
                break;
            case 'formulaireanimal' :
                include_once "modules/formulaireanimal/cont-formulaireanimal.php";
                $controller = new FormulaireAnimalController();
                $controller -> handle();
                break;
            case 'faq' :
                include_once "modules/faq/cont-faq.php";
                $controller = new FaqController();
                $controller -> handle();
                break;
            case 'cgu' :
                include_once "modules/cgu/cont-cgu.php";
                $controller = new CguController();
                $controller -> handle();
                break;
            case 'contact':
                include_once "modules/contact/cont-contact.php";
                $controller = new ContactController();
                $controller -> handle();
                break;
            case 'inscription':
                include_once "modules/inscription/cont-inscription.php";
                $controller = new InscriptionController();
                $controller->handle();
                break;
            case 'connexion':
                include_once "modules/connexion/cont-connexion.php";
                $controller = new ConnexionController();
                $controller->handle();
                break;
            case 'deconnexion':
                include_once "modules/deconnexion/cont-deconnexion.php";
                $controller = new DeconnexionController();
                $controller->handle();
                break;
            case 'recherche' :
                include_once "modules/recherche/cont-recherche.php";
                $controller = new RechercheController();
                $controller->handle();
                break;
            case 'motdepasseoublie' :
                include_once "modules/motdepasseoublie/cont-motdepasseoublie.php";
                $controller = new MotDePasseOublieController();
                $controller->handle();
                break;
            case 'reinitialisation' :
                include_once "modules/reinitialisation/cont-reinitialisation.php";
                $controller = new ReinitialisationController();
                $controller->handle();
                break;
            case 'messagerie' :
                include_once "modules/messagerie/cont-messagerie.php";
                $controller = new MessagerieController();
                $controller->handle();
                break;
            case 'infos' :
                include_once "modules/infos/cont-infos.php";
                $controller = new InfosController();
                $controller->handle();
                break;
            case 'deleteprofil' :
                include_once "modules/deleteprofil/cont-deleteprofil.php";
                $controller = new DeleteProfilController();
                $controller->handle();
                break;
            case 'changepassword' :
                include_once "modules/changepassword/cont-changepassword.php";
                $controller = new ChangePasswordController();
                $controller->handle();
                break;
            default:
                echo 'Aucun module detecté !';
                break;
        }

    }
    else {
        include_once "accueil.php";
    }

    $request = $_SERVER['REQUEST_URI'];

    switch ($request) {
        case '/messagerie/send':
            $controller = new MessagerieController();
            $controller->sendMessage();
            break;
    }

    include_once "footer.php";
    function generateCSRFToken() {
        return bin2hex(random_bytes(32));
    }

    function displayMessage($message) {
        if (!empty($message)) {
            echo "<div class=\"bloc_table_white\">$message</div>";
        }
    }

    ?>

    </body>
</html>