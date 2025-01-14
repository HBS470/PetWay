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
// Mise à jour de la photo de profil
document.getElementById('profile-pic').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profile-image').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

// Tranches de poids pour chiens
function toggleWeightSelection() {
    const weightSelection = document.getElementById('weight-selection');
    weightSelection.style.display = document.getElementById('dog').checked ? 'block' : 'none';
}

// Champs de prix conditionnels
function togglePriceInput(type) {
    const input = document.getElementById(`price-${type}`);
    input.style.display = input.style.display === 'none' ? 'block' : 'none';
}
// Récupérer les langues sélectionnées et les afficher
const languageSelect = document.getElementById('languages');
const selectedLanguagesDiv = document.getElementById('selected-languages');

languageSelect.addEventListener('change', () => {
    const selectedOptions = Array.from(languageSelect.selectedOptions)
        .map(option => option.text); // Récupère le texte des options sélectionnées

    if (selectedOptions.length > 0) {
        selectedLanguagesDiv.innerHTML = `<strong>Langues sélectionnées :</strong> ${selectedOptions.join(', ')}`;
    } else {
        selectedLanguagesDiv.innerHTML = `<em>Aucune langue sélectionnée</em>`;
    }
});
function openPopup() {
    // Si la popup n'a pas encore été chargée
    if (!document.getElementById('authPopup')) {
        // Charger la popup depuis le module connexion
        fetch('index.php?module=connexion')
            .then(response => response.text())
            .then(html => {
                // Ajouter le HTML de la popup dans le corps de la page
                document.body.insertAdjacentHTML('beforeend', html);

                // Ajouter la classe active pour afficher la popup
                const popup = document.getElementById('authPopup');
                popup.classList.add('active');

            })
            .catch(err => console.error('Erreur lors du chargement de la popup:', err));
    } else {
        // Si la popup est déjà chargée, l'afficher
        const popup = document.getElementById('authPopup');
        popup.classList.add('active');
    }
}


function closePopup() {
    document.getElementById('authPopup').classList.remove('active');

}

function showForm(formId) {
    const forms = document.querySelectorAll('.form-container');
    const tabs = document.querySelectorAll('.tab');

    forms.forEach(form => {
        form.classList.remove('active');
    });

    tabs.forEach(tab => {
        tab.classList.remove('active');
    });

    document.getElementById(formId).classList.add('active');
    document.querySelector(`.tab[onclick="showForm('${formId}')"]`).classList.add('active');
}

const errorMessage = document.querySelector('.error-message');
if (!errorMessage || errorMessage.textContent.trim() === '') {
    document.getElementById('authPopup').classList.remove('active');
}

function showPopup() {
    alert("Merci pour votre question !");
}