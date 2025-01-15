<?php

require_once "./modules/motdepasseoublie/mod-motdepasseoublie.php";
require_once "./modules/motdepasseoublie/view-motdepasseoublie.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MotDePasseOublieController {
    public function handle() {
        $model = new MotDePasseOublieModel();
        $view = new MotDePasseOublieView();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = "Adresse e-mail invalide.";
                $view->render();
                return;
            }


            if ($model->emailExists($email)) {
                $token = bin2hex(random_bytes(50)); // Génération d'un token sécurisé
                $model->storeResetToken($email, $token);

                $resetLink = "localhost/Petway/index.php?module=reinitialisation&token=" . $token;

                // Envoyer l'e-mail avec PHPMailer
                if ($this->sendPasswordResetEmail($email, $resetLink)) {
                    $_SESSION['sucess'] = "Un e-mail de réinitialisation vous a été envoyé.";
                    $view->render();
                } else {
                    $_SESSION['error'] = $_SESSION['erreur_mail'];
                    $view->render();
                    exit;
                }
            } else {
                $_SESSION['error'] = "Cette adresse e-mail n'existe pas.";
                $view->render();
                exit;
            }
        } else {
            $view->render();
        }
    }
    function sendPasswordResetEmail($recipientEmail, $resetLink) {
        $mail = new PHPMailer(true);

        try {
            // Configuration du serveur SMTP
            $mail->isSMTP();
            $mail->Host = 'live.smtp.mailtrap.io';        // Remplacez par votre serveur SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'api'; // Votre e-mail SMTP
            $mail->Password = 'c51edfae25bbea1e1ea56b0580f74a18';   // Mot de passe SMTP
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;                         // Port SMTP

            // Destinataires
            $mail->setFrom('hello@demomailtrap.com', 'PetWay'); // Adresse de l'expéditeur
            $mail->addAddress('horeb.silva241004@gmail.com');                // Adresse du destinataire

            // Contenu de l'e-mail
            $mail->isHTML(true);
            $mail->Subject = 'Réinitialisation de votre mot de passe';
            $mail->Body = '
            <p>Bonjour,</p>
            <p>Vous avez demandé à réinitialiser votre mot de passe. Cliquez sur le lien ci-dessous pour définir un nouveau mot de passe :</p>
            <p><a href="' . htmlspecialchars($resetLink) . '">' . 'Lien' . '</a></p>
            <p>Si vous n\'avez pas demandé cette réinitialisation, ignorez simplement cet e-mail.</p>
            <p>Cordialement,<br>Équipe PetWay</p>
        ';
            $mail->AltBody = "Bonjour,\n\nVous avez demandé à réinitialiser votre mot de passe. Cliquez sur ce lien pour définir un nouveau mot de passe : " . $resetLink;

            // Envoi de l'e-mail
            $mail->send();
            return true;

        } catch (Exception $e) {
            // Gérer les erreurs d'envoi
            $_SESSION['erreur_mail'] = 'Erreur d\'envoi d\'e-mail : ' . $mail->ErrorInfo;
            return false;
        }
    }


}
