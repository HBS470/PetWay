document.addEventListener('DOMContentLoaded', () => {
    const conversationsList = document.getElementById('conversations');
    const messagesContainer = document.getElementById('messages');
    const messageForm = document.getElementById('message-form');
    const messageInput = document.getElementById('message-input');

    let currentUserId = 1; // Remplacez par l'ID de l'utilisateur connecté
    let selectedUserId = null;

    // Charger les utilisateurs
    async function loadUsers() {
        try {
            const response = await fetch('backend/api/get_users.php');
            const users = await response.json();
            console.log('Utilisateurs:', users);
            conversationsList.innerHTML = '';

            // Afficher chaque utilisateur dans la liste
            users.forEach(user => {
                const li = document.createElement('li');
                li.textContent = `${user.prenom} ${user.nom} (${user.pseudo})`;
                li.dataset.userId = user.id_utilisateur; // Stocker l'ID de l'utilisateur
                li.addEventListener('click', () => {
                    selectedUserId = user.id_utilisateur; // Sélectionner l'utilisateur
                    loadMessages(user.id_utilisateur); // Charger les messages
                });
                conversationsList.appendChild(li); // Ajouter l'utilisateur à la liste
            });

            // Charger les messages du premier utilisateur par défaut
            if (users.length > 0) {
                selectedUserId = users[0].id_utilisateur;
                loadMessages(selectedUserId);
            }
        } catch (error) {
            console.error('Erreur lors du chargement des utilisateurs:', error);
        }
    }

    // Charger les messages entre deux utilisateurs
    async function loadMessages(otherUserId) {
        try {
            const response = await fetch(`backend/api/get_messages.php?userId=${currentUserId}&otherUserId=${otherUserId}`);
            const messages = await response.json();
            messagesContainer.innerHTML = ''; // Vider les messages actuels

            // Afficher chaque message
            messages.forEach(message => {
                const messageDiv = document.createElement('div');
                messageDiv.classList.add('message');
                if (message.expediteur === currentUserId) {
                    messageDiv.classList.add('sent'); // Message envoyé
                } else {
                    messageDiv.classList.add('received'); // Message reçu
                }
                messageDiv.innerHTML = `
                    <strong>${message.expediteur === currentUserId ? 'Vous' : 'Destinataire'}</strong>
                    <p>${message.message}</p>
                    <span class="message-time">${new Date(message.timestamp).toLocaleTimeString()}</span>
                `;
                messagesContainer.appendChild(messageDiv); // Ajouter le message à la boîte de réception
            });
            messagesContainer.scrollTop = messagesContainer.scrollHeight; // Faire défiler vers le bas
        } catch (error) {
            console.error('Erreur lors du chargement des messages:', error);
        }
    }

    // Envoyer un message
    messageForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const content = messageInput.value.trim();
        if (content && selectedUserId) {
            try {
                const response = await fetch('backend/api/send_message.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        senderId: currentUserId,
                        receiverId: selectedUserId,
                        message: content,
                    }),
                });
                if (response.ok) {
                    messageInput.value = ''; // Vider le champ de saisie
                    loadMessages(selectedUserId); // Recharger les messages
                }
            } catch (error) {
                console.error('Erreur lors de l\'envoi du message:', error);
            }
        }
    });

    // Charger les utilisateurs au démarrage
    loadUsers();
});