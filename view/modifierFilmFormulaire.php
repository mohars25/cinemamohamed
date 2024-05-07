<?php ob_start(); ?>
<link rel="stylesheet" href="public/details.css">

<title>Modifier un film</title>

<h1>Modifier un film</h1>

<form class="detailtexte" action="index.php?action=modifierFilm" method="POST">
    <label for="titre_film">Titre du film :</label>
    <input type="text" id="titre_film" name="titre_film" required><br>

    <label for="nouveau_titre">Nouveau titre :</label>
    <input type="text" id="nouveau_titre" name="nouveau_titre"><br>

    <label for="annee_sortie">Nouvelle année de sortie :</label>
    <input type="number" id="annee_sortie" name="annee_sortie"><br>

    <label for="affiche">Nouvelle affiche :</label>
    <input type="text" id="affiche" name="affiche"><br>

    <label for="duree">Nouvelle durée :</label>
    <input type="text" id="duree" name="duree"><br>

    <label for="synopsis">Nouveau synopsis :</label>
    <textarea id="synopsis" name="synopsis"></textarea><br>

    <label for="note">Nouvelle note :</label>
    <input type="number" id="note" name="note" step="0.1"><br>

    <input type="submit" value="Modifier">
</form>

<?php
$titre = "Modifier un film";
$content = ob_get_clean();
require "template.php";
?>
