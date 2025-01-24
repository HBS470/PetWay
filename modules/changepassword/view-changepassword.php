<?php
class ChangePasswordView {
    public function render($message = null) {
        ?>


            <?php displayMessage($message); ?>

            <form method="POST" action="?module=changepassword" class="form-style">
                <h2>Changer le mot de passe</h2>
                <div class="input-group">
                    <label for="current_password">Mot de passe actuel :</label>
                    <input type="password" id="current_password" name="current_password" class="input-middle" required>
                </div>
                <div class="input-group">
                    <label for="new_password">Nouveau mot de passe :</label>
                    <input type="password" id="new_password" name="new_password" class="input-middle" required>
                </div>
                <div class="input-group">
                    <label for="confirm_password">Confirmer le nouveau mot de passe :</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="input-middle" required>
                </div>
                <button type="submit" class="bouton-rose">Changer le mot de passe</button>
            </form>
        <?php
    }
}
?>
