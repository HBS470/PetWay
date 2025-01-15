<?php

require_once './modules/cgu/mod-cgu.php';

class CguView
{
  public function render()
  {
    $cgumodel = new CguModel();

    // Récupération des sections CGU et Mentions légales
    $cguSections = $cgumodel->getSections(0);
    $legalSections = $cgumodel->getSections(1);

    // Appel à la fonction renderSection pour chaque partie
?>
    <main>
      <section id="CGU">
        <div class="Conditions">
          <?php $this->renderSection($cguSections, "Conditions générales d'utilisation"); ?>
        </div>
      </section>
      <br>
      <section id="CGU2">
        <div class="Conditions">
          <?php $this->renderSection($legalSections, "Mentions légales"); ?>
        </div>
      </section>
    </main>
<?php
  }

  private function renderSection($sections, $header)
  {
    // Vérifie si des sections existent avant de les afficher
    if (!empty($sections)) {
      echo "<h2>" . htmlspecialchars($header) . "</h2>";
      foreach ($sections as $section) {
        echo "<div class='Conditions'>";
        echo "<h3>" . htmlspecialchars($section['titre']) . "</h3>";
        echo "<p>" . nl2br(htmlspecialchars($section['nom'])) . "</p>";
        echo "</div>";
      }
    } else {
      echo "<p>Aucune section disponible pour " . htmlspecialchars($header) . ".</p>";
    }
  }
}
?>