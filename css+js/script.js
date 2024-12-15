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