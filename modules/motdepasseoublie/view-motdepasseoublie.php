<?php
//if (!defined('MY_APP')) { exit('Accès non autorisé'); }

class MotDePasseOublieView
{
    public function render()
    {   $error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
        unset($_SESSION['error']);
        $sucess = isset($_SESSION['sucess']) ? $_SESSION['sucess'] : '';
        unset($_SESSION['sucess']);
        ?>

        <?php displayMessage($sucess);displayMessage($error);?>

        <br>
            <form action="index.php?module=motdepasseoublie" method="post" class="form-style">
                <h2 style="text-align: center">Récupération de mot de passe</h2>
                <input type="email" name="email" placeholder = "Entrez votre adresse e-mail" class="input-middle" required>
                <button type="submit" class="bouton-rose" style="margin-bottom: 20px;"> Envoyer</button>
            </form>
        <?php
}
}