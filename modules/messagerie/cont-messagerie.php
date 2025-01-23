<?php
require_once './modules/messagerie/mod-messagerie.php';
require_once './modules/messagerie/view-messagerie.php';
class MessagerieController {
    public function handle () {
        $model = new MessagerieModel();
        $view = new MessagerieView();


        $users = $model->getUser();

        // Récupérer les derniers messages pour chaque conversation
        $conversations = $this->getConversations($model, $users);

        // Passer les données à la vue
        $view->render($users, $conversations);
    }

    private function getConversations($model, $users) {
        $conversations = [];
        $currentUserId = $_SESSION['user_id']; // Supposant que l'ID de l'utilisateur connecté est stocké en session

        foreach ($users as $user) {
            if ($user['id_utilisateur'] != $currentUserId) {
                $messages = $model->getMessage($currentUserId, $user['id_utilisateur']);
                $lastMessage = end($messages);

                $conversations[] = [
                    'user' => $user,
                    'lastMessage' => $lastMessage,
                    'unreadCount' => $this->countUnreadMessages($messages, $currentUserId)
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

}
