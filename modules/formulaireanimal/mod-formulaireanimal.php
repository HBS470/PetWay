<?php
class FormulaireAnimalModel {
    private $db;

    public function __construct() {
        // Connexion à la base de données
        $host = 'localhost';
        $dbname = 'petway';
        $username = 'root';
        $password = '';

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function ajouterAnimal($animal, $poids, $nom, $race, $age, $taille, $frequence, $quantite, $type, $restrictions, $habitudes, $exercice, $maladies, $medicaments, $caractere, $horaires, $instructions, $photoPath) {
        try {
            $query = "INSERT INTO animal (id_type, poids, nom, race, age, taille, frequence, quantite, type, maladies, Habitudes, Caractere, horaires, instructions, photo)
                      VALUES (:id_type, :poids, :nom, :race, :age, :taille, :frequence, :quantite, :type, :maladies, :habitudes, :caractere, :horaires, :instructions, :photo)";

            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ':id_type' => $this->getTypeId($animal),
                ':poids' => $poids,
                ':nom' => $nom,
                ':race' => $race,
                ':age' => $age,
                ':taille' => $taille,
                ':frequence' => $frequence,
                ':quantite' => $quantite,
                ':type' => $type,
                ':maladies' => $restrictions,
                ':habitudes' => $habitudes,
                ':caractere' => $caractere,
                ':horaires' => $horaires,
                ':instructions' => $instructions,
                ':photo' => $photoPath,
            ]);

            return true;
        } catch (PDOException $e) {
            error_log("Erreur lors de l'ajout de l'animal : " . $e->getMessage());
            return false;
        }
    }

    private function getTypeId($typeAnimal) {
        // Récupère l'id du type d'animal
        $query = "SELECT id_type FROM type_animal WHERE nom = :nom";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':nom' => $typeAnimal]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['id_type'];
        } else {
            // Crée un nouveau type s'il n'existe pas
            $query = "INSERT INTO type_animal (nom) VALUES (:nom)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([':nom' => $typeAnimal]);

            return $this->db->lastInsertId();
        }
    }
}
?>
