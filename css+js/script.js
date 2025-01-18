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
document.addEventListener('DOMContentLoaded', function () {
    const profilePicInput = document.getElementById('profile-pic');
    const profileImage = document.getElementById('profile-image');

    if (profilePicInput && profileImage) {
        profilePicInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    profileImage.src = e.target.result; // Met à jour l'aperçu de l'image
                };
                reader.readAsDataURL(file);
            }
        });
    }
});

// Tranches de poids pour chiens
function toggleWeightSelection() {
    const weightSelection = document.getElementById('weight-selection');
    const dogCheckbox = document.getElementById('dog');

    if (weightSelection && dogCheckbox) {
        weightSelection.style.display = dogCheckbox.checked ? 'block' : 'none';
    }
}

// Champs de prix conditionnels
function togglePriceInput(type) {
    const input = document.getElementById(`price-${type}`);

    if (input) {
        if (input.style.display === 'none' || input.style.display === '') {
            input.style.display = 'block';
            input.setAttribute('required', 'true'); // Rend le champ obligatoire
        } else {
            input.style.display = 'none';
            input.removeAttribute('required'); // Supprime la contrainte
        }
    }
}

// Récupérer les langues sélectionnées et les afficher
document.addEventListener('DOMContentLoaded', function () {
    const languageSelect = document.getElementById('languages');
    const selectedLanguagesDiv = document.getElementById('selected-languages');

    if (languageSelect && selectedLanguagesDiv) {
        languageSelect.addEventListener('change', () => {
            const selectedOptions = Array.from(languageSelect.selectedOptions)
                .map(option => option.text); // Récupère le texte des options sélectionnées

            if (selectedOptions.length > 0) {
                selectedLanguagesDiv.innerHTML = `<strong>Langues sélectionnées :</strong> ${selectedOptions.join(', ')}`;
            } else {
                selectedLanguagesDiv.innerHTML = `<em>Aucune langue sélectionnée</em>`;
            }
        });
    }
});

function openPopup() {
    document.getElementById('authPopup').classList.add('active');
    const errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach(message => message.textContent = '');
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

// Garder la popup ouverte si elle contient un message d'erreur
window.onload = function () {
    const errorMessage= document.querySelector('.error-message');
    if (errorMessage) {
        document.getElementById('authPopup').classList.add('active');
    }
    const activeTab = document.querySelector('.activetab')
    if (activeTab === 'signup') {
        showForm('signupForm');
    } else {
        showForm('loginForm');
    }
};
