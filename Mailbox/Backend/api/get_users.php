<?php
require 'db.php';

try {
    $stmt = $pdo->prepare("SELECT id_utilisateur, nom, prenom, email FROM utilisateur");
    $stmt->execute();
    $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($utilisateurs) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                </tr>";
        foreach ($utilisateurs as $utilisateur) {
            echo "<tr>
                    <td>" . htmlspecialchars($utilisateur['id_utilisateur']) . "</td>
                    <td>" . htmlspecialchars($utilisateur['nom']) . "</td>
                    <td>" . htmlspecialchars($utilisateur['prenom']) . "</td>
                    <td>" . htmlspecialchars($utilisateur['email']) . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Aucun utilisateur trouvé.";
    }
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des utilisateurs : " . $e->getMessage();
}
?>
