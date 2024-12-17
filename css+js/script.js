function toggleClearButton() {
    const searchBar = document.getElementById('search-bar');
    const clearButton = document.getElementById('clear-button');

    if (searchBar.value.trim() !== "") {
        clearButton.style.display = "block"; // Montre le bouton poubelle
    } else {
        clearButton.style.display = "none"; // Cache le bouton poubelle
    }
}

function clearSearch() {
    const searchBar = document.getElementById('search-bar');
    const clearButton = document.getElementById('clear-button');

    searchBar.value = ""; // Réinitialise le texte
    clearButton.style.display = "none"; // Cache le bouton poubelle
    searchBar.focus(); // Replace le curseur dans la barre
}

function toggleMenu() {
    const menu = document.getElementById('menu');
    menu.classList.toggle('active');
}