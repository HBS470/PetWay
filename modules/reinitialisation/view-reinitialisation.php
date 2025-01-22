<?php
//if (!defined('MY_APP')) { exit('Accès non autorisé'); }

class ReinitialisationView
{
    public function render()
    {       $token = isset($_GET['token']) ? htmlspecialchars($_GET['token']) : '';
            $error = isset($_SESSION['error_reinitialisation']) ? $_SESSION['error_reinitialisation'] : '';
            unset($_SESSION['error_reinitialisation']);
            $sucess = isset($_SESSION['sucess_reinitialisation']) ? $_SESSION['sucess_reinitialisation'] : '';
            unset($_SESSION['sucess_reinitialisation']);
        ?>
        <?php displayMessage($error);displayMessage($sucess);?>

        <br>
        <form action="index.php?module=reinitialisation" method="post" class="form-style">
            <h2 style="text-align: center">Réinitialiser le mot de passe</h2>
            <input type="hidden" name="token" value="<?= $token ?>">
            <input type="password" name="new_password" placeholder="Nouveau mot de passe" class="input-middle" required>
            <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" class="input-middle" required>
            <button type="submit" class="bouton-rose" style="margin-bottom: 20px;">Réinitialiser</button>
        </form>
<?php
}
}