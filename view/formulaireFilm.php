<?php ob_start(); ?>
<link rel="stylesheet" href="public/details.css">

<title>Ajouter un film</title>

<h1>Ajouter un film</h1>

<form class="detailtexte" action="index.php?action=ajouterFilm" method="POST">
    <label for="titre">Titre du film :</label>
    <input type="text" id="titre" name="titre" required><br>

    <label for="annee_sortie">Année de sortie :</label>
    <input type="number" id="annee_sortie" name="annee_sortie" required><br>

    <label for="affiche">Affiche du film :</label>
    <input type="text" id="affiche" name="affiche"><br>

    <label for="duree">Durée du film :</label>
    <input type="text" id="duree" name="duree" required><br>

    <label for="synopsis">Synopsis du film :</label>
    <textarea id="synopsis" name="synopsis" required></textarea><br>

    <label for="note">Note du film :</label>
    <input type="number" id="note" name="note" step="0.1"><br>

    <label for="id_realisateur">ID du réalisateur :</label>
    <input type="number" id="id_realisateur" name="id_realisateur" required><br>

    <input type="submit" value="Ajouter">
</form>

<?php
$titre = "Ajouter un film";
$content = ob_get_clean();
require "template.php";
?>
