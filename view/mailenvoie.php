<?php ob_start(); ?>

<?php

define("HEADER","ANTIHACKING");



?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8"/>
		<title>Newsletter</title>
		<style>
		*{box-sizing:border-box;font-family:arial,sans-serif;font-size:15px}
		body,html{height:100%;background:#f7f7f7;color:#333;margin:0}
		body{padding:15px}
		h1,h2{font-size:20px}
		i{color:#888}
		a{color:#0066cc}
		textarea,input[type=text]{width:100%}
		input[type=submit]{padding:15px;display:block;margin:0 auto}
		.alert{padding:15px;margin:15px;background:#fcfcfc}
		.alert-vert{border:1px solid green}
		.alert-rouge{border:1px solid red}
		.text_center{text-align:center}
		.right{text-align:right}
		.monospace,.monospace *{font-family:monospace}
		table{width:100%}
		th,td{padding:15px}
		th{background:#868686;color:#ececec}
		tr:hover td{background:#eee}
		.overflow div{max-height:300px;overflow-y:auto}
		</style>
	</head>
<body>
<h1>Envoyer une newsletter</h1>
<?php

//si une action est demandé (suppression ou pause)
//et que id est un chiffre
if(isset($_GET['id']) && preg_match("#^[0-9]+$#",$_GET['id'])){
	$id=htmlent($_GET['id']);
	
	//on recherche si cette newsletter existe
	$req=mysqli_query($mysqli,"SELECT * FROM {$TBL['newsletters']} WHERE id='".$id."'");
	
	if(mysqli_num_rows($req)==1){
		
		//si on souhaite supprimer
		if(isset($_GET['supprimer'])){
			
			echo alerte("Newsletter supprimée.","vert");
		
		//si on souhaite gérer la pause
		} elseif(isset($_GET['pause'])){
			
			mysqli_query($mysqli,"UPDATE {$TBL['newsletters']} SET pause = (CASE WHEN pause=1 THEN 0 ELSE 1 END) WHERE id='".$id."'");
			echo alerte("Action effectuée!","vert");
			
		}
	}
}


// traitement du formulaire
$AfficherForm = 1;
if(isset($_POST['titre'],$_POST['message'],$_POST['admin'],$_POST['pause'])){
	if(empty($_POST['titre'])){
		echo alerte("Le <i>Titre</i> est vide.","rouge");
	} elseif(empty($_POST['message'])){
		echo alerte("Le <i>Message</i> est vide.","rouge");
	} else {
		if($_POST['admin']=="oui"){
			if(envoyerMail($NAVIG['mail_admin'],$_POST['titre'],$_POST['message'])){
				echo alerte("Message test envoyé à l'adresse suivante: <b>".$NAVIG['mail_admin']."</b>.","vert");
			} else{
				echo alerte("Une erreur s'est produite, le message n'a pas été envoyé à l'adresse mail <b>".$NAVIG['mail_admin']."</b>.","rouge");
			}
		} else {
			//on enregistre la newsletter pour lancer l'envoi
			if(mysqli_query($mysqli,"INSERT INTO {$TBL['newsletters']} SET titre='".htmlent($_POST['titre'])."', message='".htmlent($_POST['message'])."', pause=".($_POST['pause']=="oui"?1:0)."")){
				
				echo alerte("<h1>La newsletter est enregistrée!</h1>".($_POST['pause']=="oui"?"Elle commencera à s'envoyer dès que vous enlèverez la pause.":"Elle va s'envoyer par groupe de {$NAVIG['newsletter_limite_denvoi']} membres.")."<br/><a href='newsletter.php#voir'>Retour</a>","vert");
				
				//on cache le formulaire pour laisser que le message ci-dessus
				$AfficherForm = 0;
				
			} else {
				
				echo alerte("Une erreur s'est produite: ". mysqli_error($mysqli),"rouge");
				
			}
		}
	}
}
if($AfficherForm == 1){
	?>
	<p>Utilisez le formulaire ci-dessous pour envoyer un message à tous les utilisateurs abonnés à la newsletter.</p>
	<ul>
		<li>HTML utilisable</li>
	</ul>
	<br/>
	<br/>
	<h2>Fonctions de remplacements automatiques</h2>
	<p class="monospace"><b>[pseudo]</b> Sera remplacé par <b>le pseudo</b> du membre qui recevra la newsletter
	<br/>
	<b>[url_site]</b> Sera remplacé par <b><?=$NAVIG['url_site']?></b>
	<br/>
	<b>[texte|lien]</b> est remplacé par <b>un bouton cliquable</b> <i>[le texte à cliquer|le lien http]</i></p>
	<br/>

	<form method="post">
	<br/>
	<br/>
	<h2>Titre & Contenu</h2>
		
		<input name="titre" type="text" placeholder="Titre" value="<?=raf("titre")?>">
		<br/>
		
		<textarea style="height:350px" name="message" placeholder="Bonjour [pseudo],"><?=raf("message")?></textarea>
		<br/>
		
		<p class="right">L'envoyer à l'admin pour faire un test (<?=$NAVIG['mail_admin']?>) ?<br/>
		<select name="admin">
			<option value="non"<?=rafSelected("admin","non")?>>Non</option>
			<option value="oui"<?=rafSelected("admin","oui")?>>Oui</option>
		</select></p>
		<br/>
		<br/>
		
		<p class="right">L'envoyer dès maintenant ?<br/>
		<select name="pause">
			<option value=""<?=rafSelected("pause","non")?>>Oui</option>
			<option value=""<?=rafSelected("pause","oui")?>>Non, mettre en pause</option>
		</select></p>
		<br/>
		<br/>
		
		<input type="submit" value="Envoyer la newsletter">
	</form>
	<?php
}
?>
<h2 id="voir">Les newsletters créées</h2>
<table>
	<tr>
		<th>Titre</th>
		<th>Contenu</th>
		<th>État</th>
		<th>Actions</th>
	</tr>
	<?php
	$req=mysqli_query($mysqli,"SELECT * FROM {$TBL['newsletters']} ORDER BY id DESC");
	while($newsletters=mysqli_fetch_assoc($req)){
	?>
	<tr style="background:<?php
	if($newsletters['en_cours']==1 && $newsletters['pause']==0)
		echo "#e1e1e1";
	elseif($newsletters['en_cours']==0 && $newsletters['pause']==0)
		echo "#bff2bf";
	elseif($newsletters['pause']==1)
		echo "#ffd6d6";
	?>">
		<td class="text_center"><?=$newsletters['titre']?></td>
		<td class="overflow"><div><?=nl2br($newsletters['message'])?></div></td>
		<td class="text_center">
			<?php
			if($newsletters['en_cours']==1 && $newsletters['pause']==0)
				echo "Envoi en cours<br/><i>Envoyée à ".$newsletters['nbr_envoi']." membre(s)</i>";
			elseif($newsletters['en_cours']==0 && $newsletters['pause']==0)
				echo "Envoi terminé";
			elseif($newsletters['pause']==1)
				echo "En pause<br/><i>Envoyée à ".$newsletters['nbr_envoi']." membre(s)</i>";
			?>
		</td>
		<td class="text_center">
			<?="<a href='?id=".$newsletters['id']."&pause'>".($newsletters['pause']==1?"Enlever la pause":"Mettre en pause")."</a>";
			?>
			<br/>
			<br/>
			<a href="?id=<?=$newsletters['id']?>&supprimer" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
		</td>
	</tr>
	<?php
	}
	?>
</table>
<p class="text_center" style="font-size:12px;margin:30px">Script newsletter cron réalisé par <a href="//www.c2script.com" target="_blank" rel="nofollow">C2script.com</a></p>
</body>
</html>
<?php

$content = ob_get_clean();
require "./view/template.php";
?>
