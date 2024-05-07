<?php ob_start(); ?>
<link rel="stylesheet" href="public/details.css">

<title>Supprimer un personnage</title>

<figure><img src="public/picmodifiersupajou/supprimer.png" alt="logosupprimer"></figure>
<h1>Supprimer un personnage</h1>

<form class="detailtexte" action="index.php?action=supprimerPersonnage" method="POST">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required><br>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required><br>

    <input type="submit" value="Supprimer">
</form>

<?php
$titre = "Supprimer un personnage";
$content = ob_get_clean();
require "template.php";
?>
