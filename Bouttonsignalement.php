<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signalement de profil</title>
    <style>
        body {
            background-color: #f7e7ce;
            font-family: Arial, sans-serif;
        }

        button {
            background-color: #ff4444;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #cc0000;
        }

        .popup-form {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .popup-form h2 {
            margin-bottom: 20px;
            font-size: 22px;
            color: #333;
        }

        .popup-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .popup-form input, .popup-form select, .popup-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .popup-form button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .popup-form button:hover {
            background-color: #218838;
        }
    </style>
    <script>
        function ouvrirPageSignalement() {
            const popupContent = `
                <!DOCTYPE html>
                <html lang=\"fr\">
                <head>
                    <meta charset=\"UTF-8\">
                    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                    <title>Formulaire de Signalement</title>
                    <style>${document.querySelector('style').innerHTML}</style>
                </head>
                <body>
                    <form class=\"popup-form\" onsubmit=\"window.opener.envoyerSignalement(event); return false;\">
                        <h2>Formulaire de signalement</h2>
                        <label for=\"utilisateur\">Compte à signaler :</label>
                        <input type=\"text\" id=\"utilisateur\" placeholder=\"Nom d'utilisateur\" required>

                        <label for=\"raison\">Raison du signalement :</label>
                        <select id=\"raison\" required>
                            <option value=\"\">-- Sélectionnez une raison --</option>
                            <option value=\"abus_animaux\">Abus envers les animaux</option>
                            <option value=\"trafic_animaux\">Trafic d'animaux</option>
                            <option value=\"maltraitance\">Maltraitance animale</option>
                            <option value=\"autre\">Autre</option>
                        </select>

                        <label for=\"details\">Détails du signalement :</label>
                        <textarea id=\"details\" rows=\"5\" placeholder=\"Décrivez votre problème\" required></textarea>

                        <button type=\"submit\">Envoyer</button>
                    </form>
                </body>
                </html>`;

            const popup = window.open("", "Signalement", "width=600,height=600");
            if (popup) {
                popup.document.open();
                popup.document.write(popupContent);
                popup.document.close();
            } else {
                alert("Veuillez autoriser les fenêtres pop-up pour ce site.");
            }
        }

        function envoyerSignalement(event) {
            const utilisateur = event.target.querySelector('#utilisateur').value;
            const raison = event.target.querySelector('#raison').value;
            const details = event.target.querySelector('#details').value;

            if (!utilisateur || !raison || !details) {
                alert("Veuillez remplir tous les champs avant d'envoyer le signalement.");
                return;
            }

            fetch("https://wahibbrt@yahoo.com/api/signalement", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ utilisateur, raison, details })
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
</body>
</html>