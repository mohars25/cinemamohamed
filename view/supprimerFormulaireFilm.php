<?php ob_start(); ?>
<link rel="stylesheet" href="public/details.css">

<h2>Supprimer un film</h2>

<form class="detailtexte" action="index.php?action=supprimerFilm" method="POST">
    
    <div>
        <label for="titre_film">Titre du film :</label>
        <input type="text" id="titre_film" name="titre_film" required>
    </div>
    

    <div>
        <input type="submit" value="Supprimer">
    </div>
</form>

<?php
$content = ob_get_clean();
require "./view/template.php";
?>
