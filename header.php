<header class="center-header">
    <div class="logo-container">
        <a href="index.php" style="text-decoration: none"><img src="images/logo.png" alt="Petway Logo" class="logo">
        <h1 style="margin-left: 90px; margin-top: 25px;">PetWay</h1></a>
    </div>
    <nav class="menu">
        <a href="index.php">Accueil</a>
        <a href="#">Qui sommes-nous ?</a>
        <a href="index.php?module=faq">FAQ</a>
        <a href="index.php?module=contact">Contactez-nous</a>
        <a href="index.php?module=cgu">CGU</a>
<?php
    if (isset($_SESSION['user']) && $_SESSION['role'] = 'Petsitter') {
        echo '<a href="index.php?module=profil">Profil</a>';
        echo '<a href="index.php?module=deconnexion" style="background-color: red">Déconnexion</a>';
    }
    elseif (isset($_SESSION['user']) && $_SESSION['role'] = 'Proprio') {
        echo '<a href="index.php?module=formulaireanimal">Profile</a>';
        echo '<a href="index.php?module=deconnexion" style="background-color: red">Déconnexion</a>';
    }
    else {
        echo '<button onclick = "openPopup()" class="bouton-rose">Connexion</button>';
    }
    ?>
    </nav>

</header>
