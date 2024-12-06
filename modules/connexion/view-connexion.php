<?php if (!defined('MY_APP')) { exit('Accès non autorisé'); }

class ConnexionView {
    public function render() {

        if (isset($_SESSION['error_message'])) {
            echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_message'] . '</div>';
            unset($_SESSION['error_message']);
        } elseif (isset($_SESSION['success_message'])) {
            echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
            unset($_SESSION['success_message']);
        }
        ?>

        <div class="container mt-5">

            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Connexion</h4>
                        </div>
                        <div class="card-body">
                            <form action="index.php?module=connexion" method="post">
                                <div class="mb-3">
                                    <label for="pseudo" class="form-label">Pseudo</label>
                                    <input type="text" class="form-control" id="pseudo" name="pseudo" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Se connecter</button>

                                <div class="mb-3">
                                    <a href="index.php?module=inscription" class="btn btn-secondary">S'inscrire</a>
                                </div>
                                <?php
                                echo "<input type=\"hidden\" name=\"csrf_token\" value=\"" . $_SESSION['csrf_token'] . "\">";
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
}
?>