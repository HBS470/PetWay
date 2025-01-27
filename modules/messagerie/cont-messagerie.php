<?php
require_once './modules/messagerie/mod-messagerie.php';
require_once './modules/messagerie/view-messagerie.php';

class MessagerieController {
    public function handle() {
        $model = new MessagerieModel();
        $view = new MessagerieView();

        $users = $model->getUser();

        // Récupérer les derniers messages pour chaque conversation
        $conversations = $this->getConversations($users);

        // Passer les données à la vue
        $view->render($users, $conversations);
    }

    private function getConversations($users) {
        $model = new MessagerieModel();
        $conversations = [];
        $currentUserId = $_SESSION['user_id'];

        $conversedUserIds = $model->getIdConversation($currentUserId);

        foreach ($users as $user) {
            if (in_array($user['id_utilisateur'], $conversedUserIds) && $user['id_utilisateur'] != $currentUserId) {
                $messages = $model->getMessage($currentUserId, $user['id_utilisateur']);
                $lastMessage = end($messages);

                $conversations[] = [
                    'user' => $user,
                    'lastMessage' => $lastMessage,
                    'unreadCount' => $this->countUnreadMessages($messages, $currentUserId),
                    'userRole' => $messages[0]['expediteur'] == $currentUserId ? 'sender' : 'receiver'
                ];
            }
        }

        return $conversations;
    }

    private function countUnreadMessages($messages, $currentUserId) {
        return count(array_filter($messages, function($message) use ($currentUserId) {
            return $message['destinataire'] == $currentUserId && $message['lu'] == 0;
        }));
    }

    public function getMessages() {
        $currentUserId = $_SESSION['user_id'];
        $otherUserId = $_GET['userId'];

        $model = new MessagerieModel();
        $messages = $model->getMessage($currentUserId, $otherUserId);

        echo json_encode($messages);
    }

    public function sendMessage() {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!isset($data['receiverId']) || !isset($data['message'])) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Données invalides']);
            return;
        }

        $model = new MessagerieModel();
        $currentUserId = $_SESSION['user_id']; // Utilisateur connecté

        try {
            $result = $model->send($currentUserId, $data['receiverId'], $data['message']);
            echo json_encode(['success' => true]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}