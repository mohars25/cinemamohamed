<?php ob_start(); ?>
<link rel="stylesheet" href="public/details.css">

<title>Ajouter</title>

<figure class="detailtexte"><img src="public/picmodifiersupajou/ajou.png" alt="logoajouter"></figure>
<h1 class="detailtexte">Ajouter</h1>

<form class="detailtexte" action="index.php?action=ajouterPersonne" method="POST">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required><br>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required><br>

    <label for="sexe">Sexe :</label>
    <input type="text" id="sexe" name="sexe" required><br>

    <label for="date_naissance">Date de Naissance :</label>
    <input type="date" id="date_naissance" name="date_naissance" required><br>

    <label for="role">Rôle :</label>
    
    <select id="role" name="role" required>
        <option value="acteur">Acteur</option>
        <option value="realisateur">Réalisateur</option>
    </select><br>

    <input type="submit" value="Ajouter">
</form>

<?php
$titre = "Ajouter";
$titre_secondaire = "Ajouter";
$content = ob_get_clean();
require "template.php";
?>
