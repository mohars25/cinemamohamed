<?php ob_start(); ?>

<head>

    <title>Acheter des tickets</title>
    <link rel="stylesheet" href="public/acheter.css">
</head>

<body>
    <h1 class="back" >Acheter des tickets MOMOCINÉ</h1>

    <form class="back" action="traitement.php" method="POST">

    
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
    
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>
   
        <label for="titre_film">Titre du film :</label>
        <input type="text" id="titre_film" name="titre_film" required>
        <br>
        <br>
    
        <label for="adult_tickets">Tickets adultes 19.99€:</label>
        <input type="number" id="adult_tickets" name="adult_tickets" min="0" required>
        
        <label for="child_tickets">Tickets enfants 9.99€ :</label>
        <input type="number" id="child_tickets" name="child_tickets" min="0" required><br>
        <br>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>
    <br>
        <button type="submit">Procéder au paiement</button>
    </form>
</body>
<?php


$content = ob_get_clean(); 
require  "template.php";?>
