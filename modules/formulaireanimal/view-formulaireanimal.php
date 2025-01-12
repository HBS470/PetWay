<?php
class FormulaireAnimalView {
public function render () {
?>
    <div class="containeranimal">
        <h1>Ajouter un Animal</h1>
        <form action="process.php" method="POST" enctype="multipart/form-data">
            
            <!-- Sélectionner le type d'animal -->
            <label for="animal">Type d’animal :</label>
            <select id="animal" name="animal" required>
                <option value="">Sélectionnez un type</option>
                <option value="Chien">Chien</option>
                <option value="Chat">Chat</option>
                <option value="Lapin">Lapin</option>
            </select>

            <!-- Poids -->
            <label for="poids">Poids (kg) :</label>
            <input type="number" id="poids" name="poids" min="0.1" step="0.1" required>
            
            <!-- Nom -->
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" pattern="[A-Za-zÀ-ÿ ]{1,50}" title="Entrez uniquement des lettres" required>
            
            <!-- Race -->
            <label for="race">Race :</label>
            <input type="text" id="race" name="race" required>
            
            <!-- Âge -->
            <label for="age">Âge (en années) :</label>
            <input type="number" id="age" name="age" min="0" required>
            
            <!-- Taille -->
            <label for="taille">Taille (cm) :</label>
            <input type="number" id="taille" name="taille" min="0.1" step="0.1" required>
            
            <!-- Nourriture -->
            <fieldset>
                <legend>Nourriture</legend>
                <label for="frequence">Fréquence :</label>
                <input type="text" id="frequence" name="frequence" required>

                <label for="quantite">Quantité (g) :</label>
                <input type="number" id="quantite" name="quantite" min="1" required>

                <label for="type">Type :</label>
                <input type="text" id="type" name="type" required>

                <label for="restrictions">Maladies / Restrictions :</label>
                <textarea id="restrictions" name="restrictions" rows="3"></textarea>
            </fieldset>
            
            <!-- Habitudes -->
            <label for="habitudes">Habitudes / Toilettage :</label>
            <textarea id="habitudes" name="habitudes" rows="3"></textarea>
            
            <!-- Exercice -->
            <label for="exercice">Exercice :</label>
            <textarea id="exercice" name="exercice" rows="3"></textarea>
            
            <!-- Santé -->
            <fieldset>
                <legend>Santé</legend>
                <label for="maladies">Maladies / Blessures :</label>
                <textarea id="maladies" name="maladies" rows="3"></textarea>

                <label for="medicaments">Médicaments :</label>
                <textarea id="medicaments" name="medicaments" rows="3"></textarea>
            </fieldset>
            
            <!-- Caractère -->
            <label for="caractere">Caractère / Comportements :</label>
            <textarea id="caractere" name="caractere" rows="3"></textarea>
            
            <!-- Horaires de sortie -->
            <label for="horaires">Horaires de sortie habituels :</label>
            <textarea id="horaires" name="horaires" rows="3"></textarea>
            
            <!-- Instructions spécifiques -->
            <label for="instructions">Instructions spécifiques :</label>
            <textarea id="instructions" name="instructions" rows="3"></textarea>
            
            <!-- Photo -->
            <label for="photo">Photo de l'animal :</label>
            <input type="file" id="photo" name="photo" accept="image/png, image/jpeg" required>
            <small>Formats acceptés : JPEG, PNG. Taille maximale : 5 Mo.</small>
            
            <!-- Soumettre -->
            <input type="submit" value="Ajouter l'Animal" class="submit-btn">
        </form>
    </div>
<?php
}
}
?>