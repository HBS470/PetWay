function toggleFavorite(button, name) {
    const messageDiv = document.getElementById("message");

    if (button.classList.contains("favorited")) {
        button.classList.remove("favorited");
        button.textContent = "Ajouter aux favoris ❤️";

        // Affiche un message temporaire
        showMessage(`${name} a été retiré des favoris.`);
    } else {
        button.classList.add("favorited");
        button.textContent = "Retirer des favoris 💔";

        // Affiche un message temporaire
        showMessage(`${name} a été ajouté aux favoris.`);
    }
}

function showMessage(message) {
    const messageDiv = document.getElementById("message");
    messageDiv.textContent = message;

    // Réinitialise l'animation pour qu'elle se rejoue
    messageDiv.style.animation = "none";
    setTimeout(() => {
        messageDiv.style.animation = "";
    }, 10);
}
