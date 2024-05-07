<?php ob_start(); ?>
<link rel="stylesheet" href="public/liste.css">

<p class="detailtexte">Il y a <?= $listeActeurs->rowCount() ?> acteurs</p>

<ul class="detailtexte">
    <?php
    
    foreach ($listeActeurs->fetchAll(PDO::FETCH_ASSOC) as $acteur): ?>
        <li>
           
            <a href="index.php?action=detailsActeur&prenom=<?= urlencode($acteur['prenom']) ?>">
                <span><?= htmlspecialchars($acteur['nom']) ?></span>
                <span><?= htmlspecialchars($acteur['prenom']) ?></span>
                <span><?= htmlspecialchars($acteur['sexe']) ?></span>
                <span><?= htmlspecialchars($acteur['date_naissance']) ?></span>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?php
$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$content = ob_get_clean();
require "./view/template.php";
?>
