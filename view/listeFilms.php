<?php ob_start(); ?>
<link rel="stylesheet" href="public/liste.css">

<p class="detailtexte" >Il y a <?= $listeFilms->rowCount() ?> films</p>

<ul class="detailtexte">
    <?php
    
    foreach ($listeFilms->fetchAll(PDO::FETCH_ASSOC) as $film): ?>
        <li>
            
            <a href="index.php?action=detailsFilm&titre=<?= urlencode($film['titre_film'] ?? '') ?>">
                <span><?= htmlspecialchars($film['titre_film'] ?? '') ?></span>
                <span><?= htmlspecialchars($film['annee_sortie_film'] ?? '') ?></span>
                <span><?= htmlspecialchars($film['realisateur'] ?? '') ?></span>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?php
$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$content = ob_get_clean();
require "./view/template.php";
?>
