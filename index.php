<!DOCTYPE html>
<html>
	<head>
		<meta charset= "UTF-8"/>
		<title>PetWay</title>
		<!-- UTILISATION DE BOOTSTRAP-->
		<link rel="stylesheet" href="css+js/bootstrap.min.css">
		<link rel="stylesheet" href="css+js/style.css">
		<script src="css+js/bootstrap.min.js"></script>
	</head>
	<body>
	<?php
	require_once './modules/connexionBD/connexionBD.php';
		$bdd = ConnexionBD::connexion();
		try {
			$stmt = $bdd->prepare('SELECT nom FROM utilisateur');
			$stmt->execute();
			$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

			// Afficher les résultats
			foreach ($resultats as $resultat) {
			echo '<p>' . htmlspecialchars($resultat['nom']) . '</p>';
			}
		}
			catch (PDOException $e) {
			die('Erreur lors de la recuperation du classement : ' . $e->getMessage());
			}

		
	?>

    </body>

    <footer>
        
    </footer>
</html>