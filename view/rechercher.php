

<?php ob_start();

?>
<link rel="stylesheet" href="public\rechercher.css">




<img class="search" src="public\pictemplate\free-search-icon-2911-thumb.png" alt="logosearch">
    <h1> Résultats de recherche</h1>

    
    <?php if (!empty($rechercher)): ?>
        
        <ul>
            <?php foreach ($rechercher as $resultat): ?>
                <li>
                    
                    <strong>Type :</strong> <?= htmlspecialchars($resultat['type']) ?><br>

                    
                    <?php if ($resultat['type'] === 'Acteur'): ?>
                        Nom : <?= htmlspecialchars($resultat['nom']) ?><br>
                        Prénom : <?= htmlspecialchars($resultat['prenom']) ?><br>
                        Sexe : <?=htmlspecialchars($resultat['sexe'])?><br>
                        Date de naissance : <?=htmlspecialchars($resultat['naissance'])?>
                        <br>
                        <br>
                    <?php elseif ($resultat['type'] === 'Film'): ?>
                        Titre : <?= htmlspecialchars($resultat['nom']) ?><br>
                        Année de sortie : <?= htmlspecialchars($resultat['prenom']) ?><br>
                        Affiche : <?= htmlspecialchars($resultat['sexe']) ?><br>
                        Synopsis : <?= htmlspecialchars($resultat['naissance']) ?>
                        <br>

                        
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        
        <p>Aucun résultat trouvé pour votre recherche.</p>
    <?php endif; ?>

    
    <p><a href="index.php?action=home">Retour à l'accueil</a></p>




<?php


$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$content = ob_get_clean(); 
require  "./view/template.php";?>

