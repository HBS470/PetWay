<?php
class InfosView {
    public function render($profilData = null) {
?>
    <div class="profile-container">
        <form method="POST" action="?module=infos" enctype="multipart/form-data" >
            <!-- Champ caché pour passer l'ID utilisateur -->
            <input type="hidden" name="id_utilisateur" value="<?= htmlspecialchars($profilData['id_utilisateur'] ?? '') ?>">

            <div class="profile-header">
                <input type="file" id="profile-pic" name="photo" accept="image/*" style="display: none;">
                <label for="profile-pic" class="profile-pic-upload">
                    <img id="profile-image" src="uploads/<?= htmlspecialchars($profilData['photo'] ?? 'default-avatar.png') ?>" alt="Photo de profil">
                    <span>Modifier la photo</span>
                </label>
                <div class="profile-actions">
                    <button type="button" class="btn-change-password" onclick="location.href='?module=changepassword'">Changer de mot de passe</button>
                    <button type="button" class="btn-delete-profile" onclick="confirmDeleteProfile()">Supprimer le profil</button>
                </div>
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
            <div class="input-group">
                <label for="city">📍 Email :</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($profilData['email'] ?? '') ?>" placeholder="Entrez votre email" required>
            </div>



            <div class="form-footer" style="display:flex;justify-content: center">
                <button type="submit" class="bouton-rose">Enregistrer les modifications</button>
            </div>
        </form>
    </div>
<?php
    }
}
?>
