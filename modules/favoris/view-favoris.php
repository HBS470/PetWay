<?php

require_once 'cont-favoris.php';


class FavorisView {
    public function render($favoris) {
        ?>
        <div class="favoris-list">
            <h2>Mes Favoris</h2>
            <?php foreach ($favoris as $favori): ?>
                <div class="favori-item">
                    <h3><?= htmlspecialchars($favori['prenom'] . ' ' . $favori['nom']) ?></h3>
                    <a href="/profil.php?id=<?= $favori['id_utilisateur'] ?>">Voir le profil</a>
                </div>
            <?php endforeach; ?>
        </div>

<?php
    }
}
