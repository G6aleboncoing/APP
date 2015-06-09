<?php (include"configuration.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" media="screen" type="text/css" href="../CSS/main.css" />
<link rel="icon" type="image/png" href="images/coing.png" />
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="../JavaScript/main.js"></script>
<title>LeBonCoing</title>
</head>
<!--question : es ce que tout le monde a accès a toute les données ou seulement les inscrits ? -->
<body>
 <?php include("header.php"); ?>

<div id="body_main">

			<strong>membre</strong> : <br /> 
 	<?php 
	// On récupère tout le contenu de la table annonces

	$reponse = $bdd->query('SELECT * FROM membres2');

	// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
	{
?>
		<p>
			<?php echo $donnees['civilite'],' '; ?> <?php echo $donnees['nom']; ?><br />
			email: <?php echo $donnees['adresse_mail']; ?> <br />
			Pays: <?php echo $donnees['pays']; ?> <br />
			Région: <?php echo $donnees['region']; ?> <br />
			
			<a href="Message.php?forme=envoi&&emaildestinataire= <?php echo $donnees['adresse_mail']; ?>" >Contacter</a>
			<p><a href="profil.php?id=<?php echo $donnees['id_membre'];?>" >Voir le profil associé</a></p>
			<hr>
			<hr>
		</p>
   
<?php
	//ici c'est pour l'admin
		if(	isset($_SESSION['admin'])!=''&& $_SESSION['admin']=='1' )
		{
			$idmembre=$donnees['id_membre'];
			?>
			<a href="Modifiercompteadmin.php?idmembre=<?php echo $idmembre;?>" id="modifinfoadmin">Modifier compte</a>
			<?php
		} else
		{
			
		}
	}

	$reponse->closeCursor(); // Termine le traitement de la requête

?>
</div> 
 <?php include("footer.php"); ?>

</body>
</html>