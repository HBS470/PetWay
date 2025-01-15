<?php
//if (!defined('MY_APP')) { exit('Accès non autorisé'); }

class ReinitialisationView
{
    public function render()
    {?>
        <form action="index.php?module=reinitialisation" method="post">
            <h2>Réinitialiser le mot de passe</h2>
            <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token']); ?>">
            <input type="password" name="new_password" placeholder="Nouveau mot de passe" required>
            <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
            <button type="submit">Réinitialiser</button>
        </form>
<?php
}
}