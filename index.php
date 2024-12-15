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



    define('MY_APP', true);

    // Force l'utilisation des cookies uniquement pour les ID de session, Active HttpOnly
    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', 1);
    ini_set('session.use_only_cookies', 1);

    session_start();
    if(!isset($_SESSION['csrf_token'])){
        $_SESSION['csrf_token'] = generateCSRFToken();
    }


    // Detruit la session après 1min d'inactivité
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 3600)) {
        session_unset();
        session_destroy();
    }
    $_SESSION['LAST_ACTIVITY'] = time();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);



    include_once "header.php";

    if (isset($_GET['module'])) {
        $module = $_GET['module'];

        switch ($module) {
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

            default:
                echo "Aucun module détecté";
                break;
        }

    }
    else {


    }

    include_once "footer.php";
    function generateCSRFToken() {
        return bin2hex(random_bytes(32));
    }

    //    require_once './modules/connexionBD/connexionBD.php';
//
//        $connexion = new ConnexionBD();
//		try {
//			$stmt = $connexion::$bdd->prepare('SELECT nom FROM utilisateur;');
//			$stmt->execute();
//			$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//			// Afficher les résultats
//			foreach ($resultats as $resultat) {
//			echo '<p>' . htmlspecialchars($resultat['nom']) . '</p>';
//			}
//		}
//			catch (PDOException $e) {
//			die('Erreur lors de la recuperation des noms : ' . $e->getMessage());
//			}





    ?>

    </body>
</html>