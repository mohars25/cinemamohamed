<?php ob_start(); ?>
<link rel="stylesheet" href="public/details.css">

<h2>Connexion</h2>

<form class="detailtexte" action="index.php?action=login" method="POST">
    
    <div>
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
    </div>
    
    
    <div>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
    </div>
    
   
    <div>
        <input type="submit" value="Connexion">
    </div>
</form>

<?php
$content = ob_get_clean();
require "./view/template.php";
?>
