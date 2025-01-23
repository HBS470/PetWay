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
            CONCAT(utilisateur.prenom,' ',LEFT(utilisateur.nom,1),'.') AS Prenom,
            utilisateur.ville AS Ville,
            GROUP_CONCAT(DISTINCT langue.nom SEPARATOR ', ') AS Langues,
            AVG(avis.etoile) AS MoyenneAvis,
            annonce.prix AS Prix,
            annonce.disponibilite AS Disponibilite,
            service.nom,
            utilisateur.photo
        FROM 
            utilisateur
        LEFT JOIN parle ON utilisateur.id_utilisateur = parle.id_user
        LEFT JOIN langue ON parle.id_langue = langue.id_langue
        INNER JOIN annonce ON utilisateur.id_utilisateur = annonce.id_utilisateur
        LEFT JOIN avis ON annonce.id_annonce = avis.id_annonce
        INNER JOIN annonce_service ass ON ass.id_annonce = annonce.id_annonce
        INNER JOIN service ON ass.id_service = service.id_service
        INNER JOIN type_animal ta USING (id_type)
        INNER JOIN animal USING (id_type)
        WHERE ville = :ville
        AND disponibilite BETWEEN :arrivee AND :depart
        AND service.nom = :service
        
        GROUP BY 
            utilisateur.id_utilisateur, annonce.prix, annonce.disponibilite, service.nom;";

        $stmt = self::$bdd->prepare($sql);
        $stmt->bindParam(':ville', $adresse);
        $stmt->bindParam(':arrivee', $arrivee);
        $stmt->bindParam(':depart', $depart);
        $stmt->bindParam(':service', $service);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}