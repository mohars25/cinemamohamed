<?php ob_start(); ?>
<link rel="stylesheet" href="public/liste.css">

<p class="detailtexte">Il y a <?= $listeRealisateurs->rowCount() ?> réalisateurs</p>

<ul class="detailtexte">
    <?php
    foreach ($listeRealisateurs->fetchAll() as $realisateur): ?>
        <li>
            
            <a href="index.php?action=detailsRealisateur&nom=<?= urlencode($realisateur['nom']) ?>">
                <span><?= htmlspecialchars($realisateur['nom']) ?></span>
                <span><?= htmlspecialchars($realisateur['prenom']) ?></span>
                <span><?= htmlspecialchars($realisateur['sexe']) ?></span>
                <span><?= htmlspecialchars($realisateur['date_naissance']) ?></span>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?php
$titre = "Liste des réalisateurs";
$titre_secondaire = "Liste des réalisateurs";
$content = ob_get_clean();
require "./view/template.php";
?>
