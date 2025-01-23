<?php
//if (!defined('MY_APP')) {
//    exit('Accès non authorisé');
//}
require_once './modules/connexionBD/connexionBD.php';

class RechercheModel extends ConnexionBD {
    public function search($adresse, $arrivee,$depart, $service, $animalTypes, $poids) {
        // Créer une chaîne de caractères pour les types d'animaux
        $animalTypesStr = implode("','", $animalTypes);
        $sql = "SELECT 
            u.id_utilisateur,
            CONCAT(u.prenom,' ',LEFT(u.nom,1),'.') AS Prenom,
            u.ville AS Ville,
            GROUP_CONCAT(DISTINCT langue.nom SEPARATOR ', ') AS Langues,
            AVG(avis.etoile) AS MoyenneAvis,
            annonce.prix AS Prix,
            annonce.disponibilite AS Disponibilite,
            service.nom,
            u.photo,
            EXISTS(SELECT 1 FROM favoris f WHERE f.utilisateur_id = :currentUserId AND f.favori_id = u.id_utilisateur) AS isFavori
        FROM 
            utilisateur u
        LEFT JOIN parle ON u.id_utilisateur = parle.id_user
        LEFT JOIN langue ON parle.id_langue = langue.id_langue
        INNER JOIN annonce ON u.id_utilisateur = annonce.id_utilisateur
        LEFT JOIN avis ON annonce.id_annonce = avis.id_annonce
        INNER JOIN annonce_service ass ON ass.id_annonce = annonce.id_annonce
        INNER JOIN service ON ass.id_service = service.id_service
        INNER JOIN type_animal ta USING (id_type)
        INNER JOIN animal USING (id_type)
        WHERE ville = :ville
        AND disponibilite BETWEEN :arrivee AND :depart
        AND service.nom = :service
        
        GROUP BY 
            u.id_utilisateur, annonce.prix, annonce.disponibilite, service.nom;";

        $stmt = self::$bdd->prepare($sql);
        $stmt->bindParam(':ville', $adresse);
        $stmt->bindParam(':arrivee', $arrivee);
        $stmt->bindParam(':depart', $depart);
        $stmt->bindParam(':service', $service);
        $stmt->bindParam(':currentUserId', $_SESSION['user_id']);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}