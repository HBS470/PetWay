<div class="containeraccueil">
    <div class="headeraccueil">
        <h1 style="font-size: 2.5em; color: var(--primary-color); text-shadow: 1px 1px 3px rgba(0,0,0,0.5); text-align: center">Le meilleur choix pour l’accompagnement domestique
        </h1>
        <p>Réservez des pet sitters et promeneurs de chiens de confiance.</p>
    </div>

    <form id="searchForm" method="post" action="index.php?module=recherche">
        <div class="pet-type">
            <label>Je recherche un service pour mon :
                <div class="checkbox-inline">
                    <label for="chien" class="label-container">Chien
                        <input type="checkbox" id="chien" name="chien" value="chien" checked>
                        <span class="checkmark"></span>
                    </label>
                    <label for="chat" class="label-container">Chat
                        <input type="checkbox" id="chat" name="chat" value="chat">
                        <span class="checkmark"></span>
                    </label>
                    <label for="lapin" class="label-container">Lapin
                        <input type="checkbox" id="lapin" name="lapin" value="lapin">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </label>
        </div>


        <div class="service-types">
            <h3>Quand vous êtes absent</h3>
            <input type="hidden" name="hebergement" id="hebergement_input" value="1">
            <div class="service-buttons">
                <button type="button" class="service-btn active" id="hebergement">
                    Hébergement
                </button>
                <button type="button" class="service-btn" id="garde">
                    Garde à domicile
                </button>
            </div>
        </div>

            <h3 style="text-align: right; margin-right: 120px">Arrivée / Départ</h3>
            <div class="location-search">
                <input type="text" placeholder="Code postal ou adresse" class="address-input" id="adresse" name="adresse">
                <div class="date-inputs">
                    <input type="date" placeholder="Arrivée" id="arrivee" name="arrivee">
                    <input type="date" placeholder="Départ" id="depart" name="depart">
                </div>
            </div>

        <div class="dog-size">
            <h3>La taille de mon chien</h3>
            <div class="size-buttons">
                <input type="hidden" name="taille_chien" id="taille_chien_input" value="petit">
                <button type="button" class="poids-btn active" id="petit" value="petit">Petit<br>0 - 7 kg</button>
                <button type="button" class="poids-btn" id="moyen" value="moyen">Moyen<br>7 - 18 kg</button>
                <button type="button" class="poids-btn" id="grand" value="grand">Grand<br>18 - 45 kg</button>
                <button type="button" class="poids-btn" id="geant" value="geant">Géant<br>45+ kg</button>
            </div>
        </div>

        <button type="submit" class="search-btn">Rechercher</button>
    </form>
</div>


<!--<div class="bloc_table_white">-->
<!--    Bienvenue sur Petway !-->
<!--</div>-->

<script>
    function toggleActiveButton(selector) {
        return function(event) {
            document.querySelectorAll(selector).forEach(button => {
                button.classList.toggle('active', button === event.target);
            });
        };
    }

    document.addEventListener('DOMContentLoaded', function() {
        const toggleService = toggleActiveButton('.service-btn');
        const togglePoids = toggleActiveButton('.poids-btn');

        document.querySelectorAll('.service-btn').forEach(button => {
            button.addEventListener('click', event => {
                toggleService(event);
                document.getElementById('hebergement_input').value = event.target.id === 'hebergement' ? '1' : '0';
            });
        });

        document.querySelectorAll('.poids-btn').forEach(button => {
            button.addEventListener('click', event => {
                togglePoids(event);
                document.getElementById('taille_chien_input').value = event.target.id;
            });
        });
    });

</script>