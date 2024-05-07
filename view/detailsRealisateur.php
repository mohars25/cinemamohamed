<?php ob_start(); ?>
<link rel="stylesheet" href="public\details.css">

<title>Détails du réalisateur</title>

<h1>Détails du réalisateur</h1>

<?php if (isset($realisateur) && !empty($realisateur)): ?>
    <div class="details-realisateur">
        
        <h2><?= htmlspecialchars($realisateur['nom']) ?> <?= htmlspecialchars($realisateur['prenom']) ?></h2>
        <p><strong>Date de naissance :</strong> <?= htmlspecialchars($realisateur['date_naissance']) ?></p>
        <p><strong>Sexe :</strong> <?= htmlspecialchars($realisateur['sexe']) ?></p>
    </div>
<?php else: ?>
    <p>Aucun réalisateur trouvé.</p>
<?php endif; ?>

<p><a href="index.php?action=listeRealisateurs">Retour à la liste des réalisateurs</a></p>

<?php
$titre = "Détails du réalisateur";
$content = ob_get_clean();
require "./view/template.php";
?>
