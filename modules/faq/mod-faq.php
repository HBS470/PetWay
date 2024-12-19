<?php
$db = new PDO("mysql:host=localhost;dbname=petway", "root", "");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars(trim($_POST['email']));
    $question = htmlspecialchars(trim($_POST['question']));

    if(!empty($question)){
        $reponse = $db->prepare("insert into faq (question) values (,$question,)");
        $reponse->execute(array($question));
    }
}
?>