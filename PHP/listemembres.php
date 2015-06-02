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
 	<?php 
	// On récupère tout le contenu de la table annonces

	$reponse = $bdd->query('SELECT * FROM membres');

	// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
	{
?>
		<p>
			<strong>membre</strong> : <br /> 
			nom:<?php echo $donnees['nom']; ?><br />
			prenom:<?php echo $donnees['prenom']; ?> <br />
			email: <?php echo $donnees['email']; ?> <br />
			pays: <?php echo $donnees['pays']; ?> <br />
			ville: <?php echo $donnees['ville']; ?> <br />
			detail: <?php echo $donnees['detail']; ?> <br />
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