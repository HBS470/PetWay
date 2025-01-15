<?php
// Connexion a la base de donnée
require_once './modules/connexionBD/connexionBD.php';

class CguModel extends ConnexionBD
{
    public function getSections($type)
    {
        // Prépare la requête avec un paramètre
        $query = self::$bdd->prepare("SELECT titre, nom FROM cgu WHERE type = :type");

        // Lie le paramètre à la valeur du type
        $query->bindParam(':type', $type, PDO::PARAM_INT);

        // Exécute la requête
        $query->execute();

        // Récupère et retourne les résultats sous forme de tableau associatif
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
