<?php
class MessagerieView {
    public function render($users = [], $conversations = []) {
        ?>
        <div class="messagerie-container">
            <div class="conversations-list">
                <h2>Conversations</h2>
                <ul id="conversations">
                    <?php foreach ($conversations as $conversation): ?>
                        <li data-user-id="<?= $conversation['user']['id_utilisateur'] ?>">
                            <span class="user-name"><?= htmlspecialchars($conversation['user']['prenom'] . ' ' . $conversation['user']['nom']) ?></span>
                            <?php if ($conversation['lastMessage']): ?>
                                <span class="last-message"><?= htmlspecialchars($conversation['lastMessage']['message']) ?></span>
                            <?php endif; ?>
                            <?php if ($conversation['unreadCount'] > 0): ?>
                                <span class="unread-count"><?= $conversation['unreadCount'] ?></span>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="message-box">
                <h2>Boîte de réception</h2>
                <div id="messages"></div>
                <form id="message-form">
                    <textarea id="message-input" placeholder="Écrivez votre message..." required></textarea>
                    <input type="hidden" id="receiver-id" name="receiver-id">
                    <button type="submit">Envoyer</button>
                </form>
            </div>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const conversationsList = document.getElementById('conversations');
            const messagesContainer = document.getElementById('messages');
            const messageForm = document.getElementById('message-form');
            const receiverIdInput = document.getElementById('receiver-id');

            conversationsList.addEventListener('click', function(e) {
                const li = e.target.closest('li');
                if (li) {
                    const userId = li.dataset.userId;
                    receiverIdInput.value = userId;
                    loadMessages(userId);
                }
            });

            function loadMessages(userId) {
                fetch(`/messagerie/messages?userId=${userId}`)
                    .then(response => response.json())
                    .then(messages => {
                        messagesContainer.innerHTML = messages.map(msg =>
                            `<div class="${msg.expediteur == currentUserId ? 'sent' : 'received'}">
                                ${msg.message}
                            </div>`
                        ).join('');
                    });
            }

            messageForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const message = document.getElementById('message-input').value;
                const receiverId = receiverIdInput.value;

                fetch('/messagerie/send', {
                    method: 'POST',
                    body: JSON.stringify({ receiverId, message })
                })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        document.getElementById('message-input').value = '';
                        loadMessages(receiverId);
                    }
                });
            });
        });
        </script>
        <?php
    }
}