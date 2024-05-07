<?php ob_start(); ?>
<link rel="stylesheet" href="public\details.css">

<h2>Détails du film</h2>

<div class="detailtexte">
    <p>Titre : <?= htmlspecialchars($film['titre_film']) ?></p>
    <p>Année de sortie : <?= htmlspecialchars($film['annee_sortie_film']) ?></p>
    <p>Durée : <?= htmlspecialchars($film['duree_film']) ?></p>
    <p>Synopsis : <?= htmlspecialchars($film['synopsis_film']) ?></p>
</div>

<h3></h3>
<img  src="<?= htmlspecialchars($film['affiche_film']) ?>" alt="Affiche du film">


<h3 class="detailtexte">Réalisateur</h3>
<p class="detailtexte">Nom : <?= htmlspecialchars($film['nom_realisateur']) ?></p>
<p class="detailtexte">Prénom : <?= htmlspecialchars($film['prenom_realisateur']) ?></p>

<?php

$content = ob_get_clean();

require "./view/template.php";
?>
