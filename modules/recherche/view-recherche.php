<?php
//if (!defined('MY_APP')) { exit('Accès non autorisé'); }

require_once 'cont-recherche.php';


class RechercheView {
    public function render($results) {
?>
        <div class="containerrecherche">
            <div class="results-section">
                <?php if (empty($results)): ?>
                    <p>Aucun résultat trouvé pour votre recherche.</p>
                <?php else: ?>
                    <?php foreach ($results as $result): ?>
                        <div class="cardrecherche">
                            <div class="image" style="background-color: cadetblue;">
                                <img src="uploads/<?= htmlspecialchars($result['photo']); ?>" alt="PDP" onerror="this.src='uploads/default-avatar.png'" class="circle-image" >
                            </div>
                            <p><?= htmlspecialchars($result['Prenom']); ?></p>
                            <span class="price"><?= htmlspecialchars($result['Ville']); ?></span>
                        </div>
                    <br>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="map-section">
                <div id="map"></div>
            </div>
        </div>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet/dist/leaflet.css" />
</head>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet/dist/leaflet.js"></script>
<?php
$codePostal = isset($_POST['adresse']) ? htmlspecialchars($_POST['adresse']) : '';
?>
        <script>
            document.addEventListener("DOMContentLoaded", async () => {
                const map = L.map('map').setView([48.8566, 2.3522], 13);    // Paris par défaut
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                }).addTo(map);

                // Tableau pour stocker les marqueurs
                const markers = [];

                // Données des résultats (simulées ou récupérées depuis PHP)
                const results = <?php echo json_encode($results); ?>;

                // Fonction pour géocoder une adresse et ajouter un marqueur
                const geocodeAndAddMarker = async (result) => {
                    const adresse = result.Ville; // Utilisez l'adresse ou la ville du résultat
                    try {
                        const response = await axios.get(`https://api-adresse.data.gouv.fr/search/?q=${adresse}`);
                        if (response.data.features.length > 0) {
                            const [lon, lat] = response.data.features[0].geometry.coordinates;

                            // Ajouter un marqueur sur la carte
                            const marker = L.marker([lat, lon]).addTo(map)
                                .bindPopup(`<b>${result.Prenom}</b><br>${result.Ville}`);

                            markers.push(marker); // Stocker le marqueur dans le tableau
                        }
                    } catch (error) {
                        console.error("Erreur lors du géocodage pour l'adresse :", adresse, error);
                    }
                };

                // Géocoder et ajouter un marqueur pour chaque résultat
                for (const result of results) {
                    await geocodeAndAddMarker(result);
                }

                // Ajuster la vue de la carte pour afficher tous les marqueurs
                if (markers.length > 0) {
                    const group = new L.featureGroup(markers);
                    map.fitBounds(group.getBounds());
                }
            });
        </script>



<?php
    }
}
?>
