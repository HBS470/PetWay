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
        <form action="index.php?module=motdepasseoublie" method="post" style="margin-bottom: 20px;">
            <h2 style="text-align: center">Récupération de mot de passe</h2>
            <input type="email" name="email" placeholder = "Entrez votre adresse e-mail" required>
            <div style="display: flex; justify-content: center""><button type="submit" class="bouton-rose" style="width: 100px;"> Envoyer</button></div>
        </form>

        <?php
}
}