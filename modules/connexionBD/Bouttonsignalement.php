!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signalement de profil</title>
    <script>
        function ouvrirPageSignalement() {
            const popup = window.open("formulaire_signalement.html", "Signalement", "width=600,height=400");
            if (!popup) {
                alert("Veuillez autoriser les fenêtres pop-up pour ce site.");
            }
        }

        function envoyerSignalement(event) {
            event.preventDefault();

            const utilisateur = document.getElementById('utilisateur').value;
            const details = document.getElementById('details').value;

            if (utilisateur === '' || details === '') {
                alert("Veuillez remplir tous les champs avant d'envoyer le signalement.");
                return;
            }

            fetch("/api/signalement", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ utilisateur, details })
            })
            .then(response => {
                if (response.ok) {
                    alert("Signalement envoyé avec succès.");
                    window.close();
                } else {
                    alert("Erreur lors de l'envoi du signalement.");
                }
            })
            .catch(() => {
                alert("Erreur de communication avec le serveur.");
            });
        }
    </script>
</head>
<body>
    <button onclick="ouvrirPageSignalement()">Signaler ce profil</button>

    <!-- Cette page de formulaire serait placée dans un fichier HTML distinct "formulaire_signalement.html" -->
    <div style="display: none;">
        <form id="form-signalement" onsubmit="envoyerSignalement(event)">
            <h2>Formulaire de signalement</h2>
            <label for="utilisateur">Utilisateur à signaler :</label>
            <input type="text" id="utilisateur" placeholder="Nom d'utilisateur" required>
            <br><br>
            <label for="details">Détails du signalement :</label>
            <textarea id="details" rows="5" placeholder="Décrivez votre problème" required></textarea>
            <br><br>
            <button type="submit">Envoyer</button>
        </form>
    </div>
</body>
</html>

<!-- Backend Node.js/Express.js pour recevoir les signalements et envoyer l'e-mail -->
/* Exemple de backend */
const express = require('express');
const nodemailer = require('nodemailer');

const app = express();
app.use(express.json());

const transporter = nodemailer.createTransport({
    service: 'Gmail', // Utiliser votre service SMTP
    auth: {
        user: 'admin@example.com',
        pass: 'votre_mot_de_passe'
        app.post('/api/signalement', (req, res) => {
            const { utilisateur, details } = req.body;
        
            if (!utilisateur || !details) {
                return res.status(400).send("Tous les champs sont requis.");
            }
        
            const mailOptions = {
                from: 'admin@example.com',
                to: 'admin@example.com',
                subject: `Signalement de l'utilisateur : ${utilisateur}`,
                text: `Un signalement a été envoyé pour l'utilisateur : ${utilisateur}\n\nDétails : ${details}`
            };
        
            transporter.sendMail(mailOptions, (err) => {
                if (err) {
                    console.error(err);
                    return res.status(500).send("Erreur lors de l'envoi de l'e-mail.");
                }
                res.status(200).send("Signalement envoyé avec succès.");
            });
        });
        
        app.listen(3000, () => {
            console.log("Serveur démarré sur le port 3000");
        });