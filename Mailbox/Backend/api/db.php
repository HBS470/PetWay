<?php
// Informations de connexion
$host = 'localhost';
$dbname = 'Petway'; // Remplace par le nom de ta base de données
$username = 'root'; // Ton utilisateur MySQL
$password = ''; // Ton mot de passe MySQL (laisse vide si c'est le cas)

// Connexion à la base de données avec gestion des erreurs
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
