<?php
//if (!defined('MY_APP')) { exit('Accès non autorisé'); }

require_once 'cont-recherche.php';

class RechercheView {
    public function render() {
?>
    <div class="containerrecherche">
        <div class="cardrecherche">
            <div class="image" style="background-color: #f5e6e8;">
                <img src="cat1.png" alt="Chat Vert">
            </div>
            <p>Texte de description ici...</p>
            <span class="price">30€</span>
        </div>
        <div class="cardrecherche">
            <div class="image" style="background-color: #ffffff;">
                <img src="person1.png" alt="Portrait">
            </div>
            <p>Texte de description ici...</p>
            <span class="price">70€</span>
        </div>
        <div class="cardrecherche">
            <div class="image" style="background-color: #f5e6e8;">
                <img src="cat2.png" alt="Chat">
            </div>
            <p>Texte de description ici...</p>
            <span class="price">45€</span>
        </div>
        <div class="cardrecherche">
            <div class="image" style="background-color: #d9f7e6;">
                <img src="dog.png" alt="Chien">
            </div>
            <p>Texte de description ici...</p>
            <span class="price">30€</span>
        </div>
        <div class="cardrecherche">
            <div class="image" style="background-color: #d9f2ff;">
                <img src="landscape.png" alt="Paysage">
            </div>
            <p>Texte de description ici...</p>
            <span class="price">50€</span>
        </div>
        <div class="cardrecherche">
            <div class="image" style="background-color: #eafbd7;">
                <img src="paper_plane.png" alt="Avion en papier">
            </div>
            <p>Texte de description ici...</p>
            <span class="price">40€</span>
        </div>
    </div>
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet/dist/leaflet.css" />


</head>
<body>
    <div id="map"></div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet/dist/leaflet.js"></script>
<?php
$codePostal = isset($_POST['adresse']) ? htmlspecialchars($_POST['adresse']) : '';
?>
<script>
    document.addEventListener("DOMContentLoaded", async () => {
        const map = L.map('map').setView([48.8566, 2.3522], 13);    // Paris
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        const adresse = "<?php echo $codePostal; ?>";

        if (adresse) {
            try {
                const response = await axios.get(`https://api-adresse.data.gouv.fr/search/?q=${adresse}`);
                if (response.data.features.length > 0) {
                    const [lon, lat] = response.data.features[0].geometry.coordinates;
                    map.setView([lat, lon], 13);
                } else {
                    alert("Aucun emplacement trouvé pour ce code postal.");
                }
            } catch (error) {
                console.error(error);
                alert("Erreur lors de la recherche.");
            }
        }
    });
</script>

</body>
</html>

<?php
    }
}