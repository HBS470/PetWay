<?php
//if (!defined('MY_APP')) { exit('Accès non autorisé'); }

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
<?php
    }
}