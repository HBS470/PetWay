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
            case 'profil' :
                include_once "modules/profil/cont-profil.php";
                $controller = new ProfilController();
                $controller -> handle();
                break;
            case 'formulaireanimal' :
                include_once "modules/formulaireanimal/cont-formulaireanimal.php";
                $controller = new FormulaireAnmialController();
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
            default:
                echo 'Aucun module detecté !';
                break;
        }

    }
    else {
        include_once "accueil.php";
    }

    include_once "footer.php";
    function generateCSRFToken() {
        return bin2hex(random_bytes(32));
    }

    ?>

    </body>
</html>