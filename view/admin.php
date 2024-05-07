

<?php ob_start();?>

<link rel="stylesheet" href="public\details.css">



    <figure><img src="public\pictemplate\admin.png" alt="logoadmine"></figure>
    <h1 class="detailtexte">Bienvenue Administrateur</h1>

    <p class="detailtexte" >Choisissez une opération :</p>
    <ul class="detailtexte">
        <li><a href="./index.php?action=ajouterFormulairePersonnage">Ajouter Personnage</a></li>
        <li><a href="./index.php?action=supprimerFormulairePersonnage">Supprimer</a></li>
        <li><a href="./index.php?action=modifierFilmFormulaire">Modifier Film</a></li>
        <li><a href="./index.php?action=ajouterFormulaireFilm">Ajouter Film</a></li>
        <li><a href="./index.php?action=supprimerFormulaireFilm">supprimer Film</a></li>
    </ul>





<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$content = ob_get_clean(); 
require  "template.php";?>
