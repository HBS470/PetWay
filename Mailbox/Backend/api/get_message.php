<?php
header('Content-Type: application/json');
require_once '../db.php';

$userId = $_GET['userId'];
$otherUserId = $_GET['otherUserId'];

$query = "
    SELECT * FROM envoyer
    WHERE (expediteur = :userId AND destinataire = :otherUserId)
    OR (expediteur = :otherUserId AND destinataire = :userId)
    ORDER BY id_envoyer ASC
";
$stmt = $pdo->prepare($query);
$stmt->execute(['userId' => $userId, 'otherUserId' => $otherUserId]);
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($messages);
?>