<?php

class FAQView {
    public function render() {
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <title>FAQ</title>
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
            <div class="faq-html">
                <div class="titre_principal">
                    <h1>Centre d'assistance</h1>
                </div>

                <div class="presentation">
                    <div class="titre">
                        <h1>FAQ de Petway</h1>
                    </div>
                </div>

                <div class="container">
                    <div class="place_menu">
                        <nav class="menu">
                            <a href="#section1">En savoir plus sur Petway</a>
                            <a href="#section2">Réservation</a>
                            <a href="#section3">Sécurité</a>
                        </nav>
                    </div>

                    <div class="centrer">
                        <section id="section1">
                            <div class="sous_titre">
                                <h2>En savoir plus sur Petway</h2>
                            </div>
                            <div class="questions">
                                <h3>Qu'est ce que Petway ?</h3>
                            </div>
                            <div class="reponse">
                                <p><b>Petway</b> met en contact les propriétaires d'animaux de compagnie avec un réseau national d'amis des animaux qui n'attendent qu'une chose : s'occuper des animaux (tout en rendant service à leurs maîtres). Recherchez des pet sitters ou des promeneurs de chiens près de chez vous qui s'occuperont de votre animal, chez eux ou chez vous. En éliminant les obstacles les plus fréquents liés à la garde d'animaux, Petway s'assure que tous les animaux de compagnie du pays soient heureux et bien traités, même en l'absence de leur propriétaire, et permet aux amoureux des animaux d'avoir une vie plus épanouie.</p>
                            </div>
                            <hr>
                            <div class="questions">
                                <h3>Quels sont les services offerts par les pet sitters ?</h3>
                            </div>
                            <div class="reponse">
                                <p>Les pet sitters de Petway s'occupent de tout. Rejoignez un réseau national d'amoureux des animaux impatients de s'occuper de votre animal de compagnie. Sur Petway, vous pouvez réserver :</p>
                            </div>
                            <div class="liste">
                                <ul>
                                    <li>Un <b>Hébergement</b> : votre animal passe la nuit chez le pet sitter.</li>
                                    <li>Une <b>Garde à domicile</b> : un pet sitter garde votre chien de nuit chez vous.</li>
                                    <li>Une <b>Garderie de jour</b> : déposez votre animal domestique le matin chez votre pet sitter et venez le récupérer le soir.</li>
                                    <li>Une <b>Promenade de chien</b> : votre chien profite d'une promenade de 30 ou 60 minutes dans votre quartier.</li>
                                    <li>Des <b>Visites à domicile</b> : un pet sitter passe 30 ou 60 minutes chez vous pour jouer avec votre animal domestique et le nourrir.</li>
                                </ul>
                            </div>
                            <hr>
                        </section>

                        <section id="section2">
                            <div class="sous_titre">
                                <h2>Réservation</h2>
                            </div>
                            <div class="questions">
                                <h3>Comment contacter un pet sitter ou un promeneur de chiens ?</h3>
                            </div>
                            <div class="reponse">
                                <p>En fonction du statut de votre réservation, plusieurs options s'offrent à vous pour contacter un pet sitter. Si vous souhaitez contacter un pet sitter ou un promeneur de chien pour la première fois lorsque vous recherchez un service de garde d'animaux, accédez au profil du pet sitter et sélectionnez la touche Contacter.</p>
                            </div>
                            <hr>
                            <div class="questions">
                                <h3>Comment annuler une réservation et obtenir un remboursement ?</h3>
                            </div>
                            <div class="reponse">
                                <p>En fonction de la politique d'annulation de votre pet sitter, vous pourrez recevoir un remboursement partiel ou intégral. Les remboursements sont effectués sur le mode de paiement initial dans un délai de 5 à 10 jours ouvrables suivant la date à laquelle vous ou votre pet sitter avez annulé la demande.</p>
                            </div>
                            <hr>
                        </section>

                        <section id="section3">
                            <div class="sous_titre">
                                <h2>Sécurité</h2>
                            </div>
                            <div class="questions">
                                <h3>Que fait Petway en matière de sécurité ?</h3>
                            </div>
                            <div class="reponse">
                                <p>La plateforme Petway a été fondée sur l'idée que tout le monde devrait pouvoir profiter de l'amour inconditionnel d'un animal domestique. C'est pourquoi nous travaillons sans relâche pour offrir des services qui font de la sécurité une priorité absolue pour notre réseau. PetwayProtect est notre engagement envers la sécurité, et c'est totalement gratuit pour tous les services de garde d'animaux réservés sur Petway. Cela comprend :</p>
                            </div>
                            <div class="liste">
                                <ul>
                                    <li>Une équipe d'assistance de premier ordre.</li>
                                    <li>Des paiements pratiques et sécurisés.</li>
                                    <li>La vérification de l'identité de tous les pet sitters et de tous les promeneurs de chiens. En outre, nous vous présentons des profils de pet sitters détaillés qui incluent des avis vérifiés laissés par des propriétaires d'animaux tels que vous.</li>
                                </ul>
                            </div>
                            <hr>
                            <div class="questions">
                                <h3>Comment signaler un problème concernant une garde passée ?</h3>
                            </div>
                            <div class="reponse">
                                <p>Si un problème est survenu lors d'une garde ou d'une promenade réservée, nous vous encourageons à contacter d'abord votre pet sitter sur la messagerie Petway. Si vous n'arrivez pas à vous mettre d'accord, envoyez un message au Service client Petway. Nous examinerons l'incident afin de déterminer les étapes à suivre pour résoudre le problème. Si vous adressez un message au Service client Petway, veuillez inclure les informations suivantes :</p>
                            </div>
                            <div class="liste">
                                <ul>
                                    <li>Un résumé du problème ;</li>
                                    <li>Des pièces justificatives, le cas échéant ;</li>
                                    <li>La solution que vous privilégiez.</li>
                                </ul>
                            </div>
                            <hr>
                        </section>
                    </div>
                </div>

                <div class="newquestions">
                    <h2>Vous ne trouvez pas la réponse à votre question ? Posez-la nous !</h2>
                </div>

                <div class="formulaire">
                    <form method="post" action="traitement.php">
                        <fieldset>
                            <legend><h4>Question</h4></legend>
                            <label for="nom">Votre question : </label>
                            <input type="text" id="nom" name="nom" required /><br>
                            <input type="submit">
                        </fieldset>
                    </form>
                </div>

                <div class="politique"></div>
            </div>
        </body>
        </html>
        <?php
    }
}
?>
