<?php if (!defined('MY_APP')) { exit('Accès non autorisé'); }

class ConnexionView {
    public function render() {

        // Initialisation de la variable d'erreur
        $error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
        unset($_SESSION['error_message']);
        $activeTab = isset($_SESSION['active_tab']) ? $_SESSION['active_tab'] : 'login';
        unset($_SESSION['active_tab']);
        ?>
        <!-- Trigger button -->
        <button onclick="openPopup()" style="margin: 20px; padding: 10px 20px;">Open Login/Signup</button>

        <!-- Overlay and Popup -->
        <div class="overlay" id="authPopup">
            <div class="popup">
                <button class="close" onclick="closePopup()" style="color: black">&times;</button>
                <?php if (!empty($error_message)) : ?>
                    <div class="error-message"><?= htmlspecialchars($error_message); ?></div>
                    <div class="activetab" style="display:none"><?= htmlspecialchars($activeTab); ?></div>
                <?php endif; ?>
                <div class="tabs">
                    <div class="tab active" onclick="showForm('loginForm')">Connexion</div>
                    <div class="tab" onclick="showForm('signupForm')">Inscription</div>
                </div>

                <!-- Login Form -->
                <div class="form-container active" id="loginForm">
                    <h2>Connexion</h2>
                    <form class="form-width" action="index.php?module=connexion" method="post">
                        <input type="hidden" name="form_type" value="login">
                        <input type="text" name="pseudo" placeholder="Pseudo">
                        <input type="password" name="password" placeholder="Mot de passe">
                        <button type="submit">Se connecter</button>
                    </form>
                </div>

                <!-- Signup Form -->
                <div class="form-container" id="signupForm">
                    <h2>Inscription</h2>
                    <form class="form-width" action="index.php?module=inscription" method="post">
                        <input type="hidden" name="form_type" value="signup">
                        <input type="text" name="nom" placeholder="Nom">
                        <input type="text" name="prenom" placeholder="Prenom">
                        <input type="text" name="pseudo" placeholder="Pseudo">
                        <input type="email" name="email" placeholder="Email">
                        <input type="text" name="ville" placeholder="Ville">
                        <input type="password" name="password" placeholder="Mot de passe">
                        <input type="password" name="confirm_password" placeholder="Confirmer mot de passe">
                        <input type="file" name="photo" placeholder="Photo">
                        <button type="submit">S'inscrire</button>
                    </form>
                </div>
            </div>
        </div>

        <?php
    }
}
?>