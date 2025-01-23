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
                <input type="text" placeholder="Code postal" class="address-input" id="adresse" name="adresse">
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

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services pour animaux</title>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../css+js/style.css">
</head>
<body>
     <div class="accueil_explication">
    <div class="services-container">
        <h1 class="services-title">Services pour animaux de compagnie</h1>
        
        <div class="service-item">
            <svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
            </svg>
            <div class="service-content">
                <h3>Hébergement</h3>
                <p>Vos animaux domestiques passent du temps au domicile de votre pet sitter. Ils seront traités comme des membres à part entière de la famille dans un environnement agréable.</p>
            </div>
        </div>

        <div class="service-item">
            <i class="fas fa-paw paw-icon"></i>
            <div class="service-content">
                <h3>Promenade d'animaux</h3>
                <p>Votre animal profite d'une promenade dans votre quartier. Idéal pour les journées chargées et les animaux qui débordent d'énergie.</p>
            </div>
        </div>
    </div>

    <div class="how-it-works">
        <h1 class="title">Rencontrez des petsitters locaux qui traiteront vos animaux comme des membres de la famille</h1>
        
        <div class="steps">
            <div class="step-card">
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2" />
                </svg>
                <h2 class="step-number">1. Rechercher</h2>
                <p class="description">Lisez les avis vérifiés de propriétaires tels que vous et choisissez un petsitter vérifié qui correspond parfaitement à vos attentes et à celles de vos animaux domestiques.</p>
            </div>

            <div class="step-card">
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2" />
                </svg>
                <h2 class="step-number">2. Réservez</h2>
                <p class="description">Mettez-vous d'accord sur un prix et sur le déroulement du service demandé via la messagerie interne.</p>
            </div>

            <div class="step-card">
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke-width="2" />
                </svg>
                <h2 class="step-number">3. Partez serein</h2>
                <p class="description">Restez informé(e) grâce à des photos et des messages.</p>
            </div>
        </div>
    </div>
      </div>
</body>
</html>
