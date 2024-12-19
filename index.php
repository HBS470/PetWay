<!DOCTYPE html>
<html>
	<head>
		<meta charset= "UTF-8"/>
		<title>PetWay</title>
		<link rel="stylesheet" href="css+js/style.css">
        <script src="css+js/script.js"></script>
	</head>
	<body>
	<?php
    session_start();

    include_once "header.php";

    if (isset($_GET['module'])) {
        $module = $_GET['module'];

        switch ($module) {
            case 'faq' :
                include_once "modules/faq/cont-faq.php";
                $controller = new FaqController();
                $controller -> handle();

            case 'cgu' :
                include_once "modules/CGU&ML/cont-cgu.php";
                $controller = new CguController();
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

    <footer>
        
    </footer>
</html>