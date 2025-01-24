<?php
class ProfilPetsitterView {
    public function render($profilData = null) {
?>
    <div class="profile-container">
        <form method="POST" action="?module=profilpetsitter" enctype="multipart/form-data" >
            <!-- Champ caché pour passer l'ID utilisateur -->
            <input type="hidden" name="id_utilisateur" value="<?= htmlspecialchars($profilData['id_utilisateur'] ?? '') ?>">

            <div class="profile-header">
                <input type="file" id="profile-pic" name="photo" accept="image/*" style="display: none;">
                <label for="profile-pic" class="profile-pic-upload">
                    <img id="profile-image" src="uploads/<?= htmlspecialchars($profilData['photo'] ?? 'default-avatar.png') ?>" alt="Photo de profil">
                    <span>Modifier la photo</span>
                </label>
            </div>

            <div class="input-group">
                <label for="name">📝 Nom :</label>
                <input type="text" id="name" name="nom" value="<?= htmlspecialchars($profilData['nom'] ?? '') ?>" placeholder="Entrez votre nom" required>
            </div>

            <div class="input-group">
                <label for="prenom">📝 Prénom :</label>
                <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($profilData['prenom'] ?? '') ?>" placeholder="Entrez votre prénom" required>
            </div>

            <div class="input-group">
                <label for="city">📍 Ville :</label>
                <input type="text" id="city" name="ville" value="<?= htmlspecialchars($profilData['ville'] ?? '') ?>" placeholder="Entrez votre ville" required>
            </div>

            <h2>🐾 Animaux acceptés</h2>
            <div class="row">
                <label><input type="checkbox" id="dog" name="animals[]" value="dog" <?= (isset($profilData['animals']) && in_array('dog', $profilData['animals'])) ? 'checked' : '' ?> onchange="toggleWeightSelection()"> 🐶 Chien</label>
                <label><input type="checkbox" name="animals[]" value="cat" <?= (isset($profilData['animals']) && in_array('cat', $profilData['animals'])) ? 'checked' : '' ?>> 🐱 Chat</label>
                <label><input type="checkbox" name="animals[]" value="rabbit" <?= (isset($profilData['animals']) && in_array('rabbit', $profilData['animals'])) ? 'checked' : '' ?>> 🐇 Lapin</label>
            </div>
            <div id="weight-selection" class="sub-section" style="<?= (isset($profilData['animals']) && in_array('dog', $profilData['animals'])) ? 'display:block;' : 'display:none;' ?>">
                <h3>⚖️ Poids pour chiens</h3>
                <div class="row">
                    <label><input type="checkbox" name="dog_weight[]" value="0-10kg" <?= (isset($profilData['dog_weight']) && in_array('0-10kg', $profilData['dog_weight'])) ? 'checked' : '' ?>> 0-10kg</label>
                    <label><input type="checkbox" name="dog_weight[]" value="10-20kg" <?= (isset($profilData['dog_weight']) && in_array('10-20kg', $profilData['dog_weight'])) ? 'checked' : '' ?>> 10-20kg</label>
                    <label><input type="checkbox" name="dog_weight[]" value="20-40kg" <?= (isset($profilData['dog_weight']) && in_array('20-40kg', $profilData['dog_weight'])) ? 'checked' : '' ?>> 20-40kg</label>
                    <label><input type="checkbox" name="dog_weight[]" value="40-80kg" <?= (isset($profilData['dog_weight']) && in_array('40-80kg', $profilData['dog_weight'])) ? 'checked' : '' ?>> 40-80kg</label>
                    <label><input type="checkbox" name="dog_weight[]" value="80kg+" <?= (isset($profilData['dog_weight']) && in_array('80kg+', $profilData['dog_weight'])) ? 'checked' : '' ?>> 80kg+</label>
                </div>
            </div>

            <h2>🏠 Hébergement</h2>
            <div class="row">
                <label><input type="checkbox" id="host-own" name="hosting[]" value="own" <?= (isset($profilData['hosting']) && in_array('own', $profilData['hosting'])) ? 'checked' : '' ?> onchange="togglePriceInput('own')"> Chez moi</label>
                <input type="number" id="price-own" name="price_own" value="<?= htmlspecialchars($profilData['price_own'] ?? '') ?>" class="price-input" placeholder="Prix (€)" style="<?= (isset($profilData['hosting']) && in_array('own', $profilData['hosting'])) ? 'display:block;' : 'display:none;' ?>">

                <label><input type="checkbox" id="host-client" name="hosting[]" value="client" <?= (isset($profilData['hosting']) && in_array('client', $profilData['hosting'])) ? 'checked' : '' ?> onchange="togglePriceInput('client')"> Chez le propriétaire</label>
                <input type="number" id="price-client" name="price_client" value="<?= htmlspecialchars($profilData['price_client'] ?? '') ?>" class="price-input" placeholder="Prix (€)" style="<?= (isset($profilData['hosting']) && in_array('client', $profilData['hosting'])) ? 'display:block;' : 'display:none;' ?>">
            </div>

            <h2>🗣️ Langues parlées</h2>
            <div class="input-group">
                <label for="languages">Choisissez les langues :</label>
                <select id="languages" name="languages[]" multiple>
                    <option value="francais" <?= (isset($profilData['languages']) && in_array('francais', $profilData['languages'])) ? 'selected' : '' ?>>🇫🇷 Français</option>
                    <option value="anglais" <?= (isset($profilData['languages']) && in_array('anglais', $profilData['languages'])) ? 'selected' : '' ?>>🇬🇧 Anglais</option>
                    <option value="espagnol" <?= (isset($profilData['languages']) && in_array('espagnol', $profilData['languages'])) ? 'selected' : '' ?>>🇪🇸 Espagnol</option>
                    <option value="allemand" <?= (isset($profilData['languages']) && in_array('allemand', $profilData['languages'])) ? 'selected' : '' ?>>🇩🇪 Allemand</option>
                    <option value="italien" <?= (isset($profilData['languages']) && in_array('italien', $profilData['languages'])) ? 'selected' : '' ?>>🇮🇹 Italien</option>
                    <option value="portugais" <?= (isset($profilData['languages']) && in_array('portugais', $profilData['languages'])) ? 'selected' : '' ?>>🇵🇹 Portugais</option>
                    <option value="chinois" <?= (isset($profilData['languages']) && in_array('chinois', $profilData['languages'])) ? 'selected' : '' ?>>🇨🇳 Chinois</option>
                    <option value="arabe" <?= (isset($profilData['languages']) && in_array('arabe', $profilData['languages'])) ? 'selected' : '' ?>>🇸🇦 Arabe</option>
                </select>
                <div id="selected-languages" class="languages-preview">
                    <?php if (isset($profilData['languages']) && count($profilData['languages']) > 0): ?>
                        <strong>Langues sélectionnées :</strong> <?= implode(', ', $profilData['languages']) ?>
                    <?php else: ?>
                        <em>Aucune langue sélectionnée</em>
                    <?php endif; ?>
                </div>
            </div>
            <h2>🎓 Compétences</h2>
            <div class="skills">
                <label><input type="checkbox" name="skills[]" value="medication" <?= (isset($profilData['skills']) && in_array('medication', $profilData['skills'])) ? 'checked' : '' ?>> 🩺 Administration de médicaments</label>
                <label><input type="checkbox" name="skills[]" value="senior_care" <?= (isset($profilData['skills']) && in_array('senior_care', $profilData['skills'])) ? 'checked' : '' ?>> 🧓 Soins aux animaux âgés</label>
                <label><input type="checkbox" name="skills[]" value="first_aid" <?= (isset($profilData['skills']) && in_array('first_aid', $profilData['skills'])) ? 'checked' : '' ?>> 🚑 Premiers secours</label>
                <label><input type="checkbox" name="skills[]" value="grooming" <?= (isset($profilData['skills']) && in_array('grooming', $profilData['skills'])) ? 'checked' : '' ?>> ✂️ Toilettage</label>
                <label><input type="checkbox" name="skills[]" value="walking" <?= (isset($profilData['skills']) && in_array('walking', $profilData['skills'])) ? 'checked' : '' ?>> 🐾 Promenade</label>
                <label><input type="checkbox" name="skills[]" value="basic_training" <?= (isset($profilData['skills']) && in_array('basic_training', $profilData['skills'])) ? 'checked' : '' ?>> 🎓 Éducation basique</label>
            </div>
            <h2>🏡 Informations sur l’environnement</h2>
            <div class="environment">
                <label><input type="checkbox" name="environment[]" value="children_present"> 👶 Enfants présents</label>
                <label><input type="checkbox" name="environment[]" value="non_smoking"> 🚭 Foyer non-fumeur</label>
                <label><input type="checkbox" name="environment[]" value="garden"> 🌳 Jardin</label>
                <label><input type="checkbox" name="environment[]" value="building"> 🏢 Immeuble</label>
                <label><input type="checkbox" name="environment[]" value="other_animals"> 🐾 Présence d'animaux</label>
            </div>
            <h2>🕒 Journée type</h2>
            <div class="input-group">
                <textarea class="daily-routine" name="daily_routine" placeholder="Décrivez votre journée type ici..."><?= htmlspecialchars($profilData['daily_routine'] ?? '') ?></textarea>
            </div>

            <h2>📝 Informations supplémentaires</h2>
            <textarea class="daily-routine" name="additional_info" placeholder="Ajoutez des informations supplémentaires ici..."><?= htmlspecialchars($profilData['additional_info'] ?? '') ?></textarea>



            <div class="form-footer" style="display:flex;justify-content: center">
                <button type="submit" class="bouton-rose">Enregistrer les modifications</button>
            </div>
        </form>
    </div>
<?php
    }
}
?>
