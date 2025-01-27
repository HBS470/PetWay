<?php
require_once './modules/connexionBD/connexionBD.php';

class FormulaireAnimalModel extends ConnexionBD {
    public function ajouterAnimal($animal, $poids, $nom, $race, $age, $taille, $frequence, $quantite, $type, $restrictions, $habitudes, $exercice, $maladies, $medicaments, $caractere, $horaires, $instructions, $photoPath,$id_user) {
        try {
            $query = "INSERT INTO animal (id_type, poids, nom, race, age, taille, frequence, quantite, type, maladies, Habitudes, Caractere, horaires, instructions, photo,id_utilisateur)
                      VALUES (:id_type, :poids, :nom, :race, :age, :taille, :frequence, :quantite, :type, :maladies, :habitudes, :caractere, :horaires, :instructions, :photo,:id_user)";

            $stmt = self::$bdd->prepare($query);
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
                ':maladies' => $maladies,
                ':habitudes' => $habitudes,
                ':caractere' => $caractere,
                ':horaires' => $horaires,
                ':instructions' => $instructions,
                ':photo' => $photoPath,
                ':id_user' => $id_user
            ]);

            return true;
        } catch (PDOException $e) {
            $_SESSION['ereeee']="Erreur lors de l'ajout de l'animal : " . $e->getMessage();
            return false;
        }
    }

    private function getTypeId($typeAnimal) {
        // Récupère l'id du type d'animal
        $query = "SELECT id_type FROM type_animal WHERE nom = :nom";
        $stmt = self::$bdd->prepare($query);
        $stmt->execute([':nom' => $typeAnimal]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['id_type'];
        } else {
            // Crée un nouveau type s'il n'existe pas
            $query = "INSERT INTO type_animal (nom) VALUES (:nom)";
            $stmt = self::$bdd->prepare($query);
            $stmt->execute([':nom' => $typeAnimal]);

            return self::$bdd->lastInsertId();
        }
    }
}
?>
