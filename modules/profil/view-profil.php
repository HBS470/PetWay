<?php
class ProfilView {
    public function render () {
?>
    <div class="profile-container">
        <!-- Photo de profil et infos utilisateur -->
        <div class="profile-header">
            <input type="file" id="profile-pic" accept="image/*" style="display: none;">
            <label for="profile-pic" class="profile-pic-upload">
                <img id="profile-image" src="default-avatar.png" alt="Photo de profil">
                <span>Ajouter une photo</span>
            </label>

            <!-- Champs pour nom et ville -->
            <div class="input-group">
                <label for="name">📝 Nom :</label>
                <input type="text" id="name" placeholder="Entrez votre nom">
            </div>
            <div class="input-group">
                <label for="name">📝 Prénom :</label>
                <input type="text" id="name" placeholder="Entrez votre prénom">
            </div>
            <div class="input-group">
                <label for="city">📍 Ville :</label>
                <input type="text" id="city" placeholder="Entrez votre ville">
            </div>
        </div>

        <!-- Animaux acceptés -->
        <h2>🐾 Animaux acceptés</h2>
        <div class="row">
            <label><input type="checkbox" id="dog" onchange="toggleWeightSelection()"> 🐶 Chien</label>
            <label><input type="checkbox" id="cat"> 🐱 Chat</label>
            <label><input type="checkbox" id="rabbit"> 🐇 Lapin</label>
        </div>
        <div id="weight-selection" class="sub-section" style="display:none;">
            <h3>⚖️ Poids pour chiens</h3>
            <div class="row">
                <label><input type="checkbox"> 0-10kg</label>
                <label><input type="checkbox"> 10-20kg</label>
                <label><input type="checkbox"> 20-40kg</label>
                <label><input type="checkbox"> 40-80kg</label>
                <label><input type="checkbox"> 80kg+</label>
            </div>
        </div>

        <!-- Hébergement -->
        <h2>🏠 Hébergement</h2>
        <div class="row">
            <label><input type="checkbox" id="host-own" onchange="togglePriceInput('own')"> Chez moi</label>
            <input type="number" id="price-own" class="price-input" placeholder="Prix (€)" style="display:none;">
        </div>
        <div class="row">
            <label><input type="checkbox" id="host-client" onchange="togglePriceInput('client')"> Chez le propriétaire</label>
            <input type="number" id="price-client" class="price-input" placeholder="Prix (€)" style="display:none;">
        </div>

        <!-- Journée type -->
        <h2>🕒 Journée type</h2>
        <div class="input-group">
            <textarea class="daily-routine" placeholder="Décrivez votre journée type ici..."></textarea>
        </div>

            <!-- Langues Parlées -->
        <h2>🗣️ Langues parlées</h2>
        <div class="input-group">
            <label for="languages">Choisissez les langues :</label>
            <select id="languages" multiple>
                <option value="francais">🇫🇷 Français</option>
                <option value="anglais">🇬🇧 Anglais</option>
                <option value="espagnol">🇪🇸 Espagnol</option>
                <option value="allemand">🇩🇪 Allemand</option>
                <option value="italien">🇮🇹 Italien</option>
                <option value="portugais">🇵🇹 Portugais</option>
                <option value="chinois">🇨🇳 Chinois</option>
                <option value="arabe">🇸🇦 Arabe</option>
            </select>
    <div id="selected-languages" class="languages-preview"></div>
</div>

        <!-- Informations sur l’environnement -->
        <h2>🏡 Informations sur l’environnement</h2>
        <div class="environment">
            <label><input type="checkbox"> 👶 Enfants présents</label>
            <label><input type="checkbox"> 🚭 Foyer non-fumeur</label>
            <label><input type="checkbox"> 🌳 Jardin</label>
            <label><input type="checkbox"> 🏢 Immeuble</label>
            <label><input type="checkbox"> 🐾 Présence d'animaux</label>
        </div>

        <!-- Compétences -->
        <h2>🎓 Compétences</h2>
        <div class="skills">
            <label><input type="checkbox"> 🩺 Administration de médicaments</label>
            <label><input type="checkbox"> 🧓 Soins aux animaux âgés</label>
            <label><input type="checkbox"> 🚑 Premiers secours</label>
            <label><input type="checkbox"> ✂️ Toilettage</label>
            <label><input type="checkbox"> 🐾 Promenade</label>
            <label><input type="checkbox"> 🎓 Éducation basique</label>
        </div>

        <!-- Informations supplémentaires -->
        <h2>📝 Informations supplémentaires</h2>
        <textarea class="daily-routine" placeholder="Ajoutez des informations supplémentaires ici..."></textarea>

        </div>

<?php
    }
}
?>