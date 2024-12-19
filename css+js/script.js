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
