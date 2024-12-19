function toggleFavorite(button) {
    if (button.classList.contains('favorited')) {
        button.classList.remove('favorited');
        button.textContent = 'Ajouter aux favoris ❤️';
    } else {
        button.classList.add('favorited');
        button.textContent = 'Retirer des favoris 💔';
    }
}
