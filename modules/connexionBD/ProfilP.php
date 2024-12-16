<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un profil Petsitter</title>
    <link rel="stylesheet" href="profil.css">
</head>
<body>
    <div class="profile-container">
        <header class="profile-header">
            <!-- Photo de profil -->
            <label for="profile-pic" class="profile-pic-label">
                <img src="placeholder.jpg" alt="Photo de profil" id="profile-pic-preview" class="profile-pic">
                <input type="file" id="profile-pic" name="profile-pic" accept="image/*" onchange="previewImage(event)">
                <p class="upload-instruction">Cliquez pour ajouter une photo</p>
            </label>
        </header>

        <!-- Formulaire -->
        <form action="process.php" method="POST" enctype="multipart/form-data" class="profile-form">
            <!-- Nom complet et localisation -->
            <label for="name">Nom complet :</label>
            <input type="text" id="name" name="name" placeholder="Ex : Alexandra Dupont" required>

            <label for="location">Localisation :</label>
            <input type="text" id="location" name="location" placeholder="Ex : Paris, France" required>

            <!-- Avis et animaux gardés -->
            <label for="rating">Avis :</label>
            <input type="text" id="rating" name="rating" placeholder="Ex : 4.8 (25 avis)" required>

            <label for="animals">Animaux gardés :</label>
            <select id="animals" name="animals[]" multiple required>
                <option value="Chien">🐶 Chien</option>
                <option value="Chat">🐱 Chat</option>
                <option value="Lapin">🐰 Lapin</option>
                
            </select>

            <!-- Prix -->
            <label for="price">Prix :</label>
            <textarea id="price" name="price" rows="2" placeholder="Ex : 15€/jour pour garde à domicile, 20€/jour pour hébergement..." required></textarea>

            <!-- Poids des chiens gardés -->
            <label for="dog-weight">Poids des chiens gardés (kg) :</label>
            <textarea id="dog-weight" name="dog-weight" rows="2" placeholder="Ex : 0-20kg chez le client, jusqu'à 40kg chez moi..." required></textarea>

            <!-- Expérience -->
            <label for="experience">Expérience :</label>
            <textarea id="experience" name="experience" rows="3" placeholder="Décrivez votre expérience avec les animaux" required></textarea>

            <!-- Langues parlées -->
            <label for="languages">Langues parlées :</label>
            <input type="text" id="languages" name="languages" placeholder="Ex : Français, Anglais" required>

            <!-- Disponibilités -->
            <label for="availability">Disponibilités :</label>
            <textarea id="availability" name="availability" rows="2" placeholder="Ex : Disponible les week-ends et jours fériés" required></textarea>

            <!-- Compétences avec icônes -->
            <label>Compétences :</label>
            <div class="skills">
                <label>
                    <input type="checkbox" name="skills[]" value="Administration de médicaments">
                    💊 Administration de médicaments
                </label>
                <label>
                    <input type="checkbox" name="skills[]" value="Soins aux animaux âgés">
                    🧓 Soins aux animaux âgés
                </label>
                <label>
                    <input type="checkbox" name="skills[]" value="Premiers secours pour animaux">
                    🩺 Premiers secours pour animaux
                </label>
                <label>
                    <input type="checkbox" name="skills[]" value="Toilettage">
                    ✂️ Toilettage
                </label>
                <label>
                    <input type="checkbox" name="skills[]" value="Promenade">
                    🐾 Promenade
                </label>
                <label>
                    <input type="checkbox" name="skills[]" value="Éducation basique">
                    🎓 Éducation basique
                </label>
            </div>

            <!-- Environnement -->
            <label>Environnement :</label>
            <div class="environment">
                <label>
                    <input type="checkbox" name="environment[]" value="Appartement avec jardin">
                    🏡 Appartement avec jardin
                </label>
                <label>
                    <input type="checkbox" name="environment[]" value="Foyer non-fumeur">
                    🚭 Foyer non-fumeur
                </label>
                <label>
                    <input type="checkbox" name="environment[]" value="Pas d'enfants à la maison">
                    👶 Pas d’enfants à la maison
                </label>
            </div>

            <!-- Une journée type -->
            <label for="typical-day">Une journée type :</label>
            <textarea id="typical-day" name="typical-day" rows="3" placeholder="Décrivez votre routine quotidienne avec les animaux gardés..." required></textarea>

            <!-- Ce que le petsitter aimerait savoir -->
            <label for="animal-info">Ce que vous aimeriez savoir sur l’animal :</label>
            <textarea id="animal-info" name="animal-info" rows="3" placeholder="Ex : Habitudes, état de santé, comportement..." required></textarea>

            <!-- Soumettre -->
            <input type="submit" value="Créer le profil" class="submit-btn">
        </form>
    </div>

    <script>
        // Aperçu de l'image uploadée
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('profile-pic-preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
