<?php
//if (!defined('MY_APP')) { exit('Accès non autorisé'); }

class ReinitialisationView
{
    public function render()
    {       $token = isset($_GET['token']) ? htmlspecialchars($_GET['token']) : '';
            $error = isset($_SESSION['error_reinitialisation']) ? $_SESSION['error_reinitialisation'] : '';
            unset($_SESSION['error_reinitialisation']);
            $sucess = isset($_SESSION['sucess_reinitialisation']) ? $_SESSION['sucess_reinitialisation'] : '';
            unset($_SESSION['sucess']);
        ?>
        <?php if (!empty($error)) :?>
        <div class="bloc_table_white">
            <?php  echo $error ?>
        </div>
        <?php endif?>

        <?php if (!empty($sucess)) :?>
        <div class="bloc_table_white">
            <?php  echo $sucess ?>
        </div>
        <?php endif?>
        <br>
        <form action="index.php?module=reinitialisation" method="post">
            <h2 style="text-align: center">Réinitialiser le mot de passe</h2>
            <input type="hidden" name="token" value="<?= $token ?>">
            <input type="password" name="new_password" placeholder="Nouveau mot de passe" required>
            <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
            <div style="display: flex; justify-content: center""><button type="submit" class="bouton-rose" style="width: 100px; margin-bottom: 20px;">Réinitialiser</button></div>
        </form>
<?php
}
}