<?php ob_start(); ?>
<link rel="stylesheet" href="public\details.css">

<title>Détails de l'acteur</title>

<h1 class="detailtexte">Détails de l'acteur</h1>

<?php if (isset($acteur) && !empty($acteur)): ?>
    <div class="detailtexte">
        <h2><?= htmlspecialchars($acteur['nom']) ?> <?= htmlspecialchars($acteur['prenom']) ?></h2>
        <p><strong>Sexe :</strong> <?= htmlspecialchars($acteur['sexe']) ?></p>
        <p><strong>Date de naissance :</strong> <?= htmlspecialchars($acteur['date_naissance']) ?></p>
    </div>
<?php else: ?>
    <p>Aucun acteur trouvé.</p>
<?php endif; ?>

<p><a href="index.php?action=listeActeurs">Retour à la liste des acteurs</a></p>

<?php
$titre = "Détails de l'acteur";
$content = ob_get_clean();
require "./view/template.php";
?>
