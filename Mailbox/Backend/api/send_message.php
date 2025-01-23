<?php
header('Content-Type: application/json');
require_once '../db.php';

$data = json_decode(file_get_contents('php://input'), true);
$senderId = $data['senderId'];
$receiverId = $data['receiverId'];
$message = $data['message'];

$query = "INSERT INTO envoyer (expediteur, destinataire, message) VALUES (:senderId, :receiverId, :message)";
$stmt = $pdo->prepare($query);
$stmt->execute(['senderId' => $senderId, 'receiverId' => $receiverId, 'message' => $message]);

echo json_encode(['success' => true]);
?>