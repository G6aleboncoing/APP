<?php
include('configuration.php');?>
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

<body>

 <?php include("header.php"); ?>

<div id="body_main">
 
 <?php
if(isset($_SESSION['adresse_mail'])!='')// déjà , es ce que l'on est connecté
	{
		$i=1;
		$submit=$_SESSION['ID_membre'];//ensuite, on va chercher les annonces correspondant à cette personne
		$reponse = $bdd->query("SELECT * FROM annonces WHERE id_membre = '$submit' ");

		// On affiche chaque entrée une à une
		while ($donnees = $reponse->fetch())
			{
				
				?>
				
				<strong>annonce n° <?php echo $i?></strong> : <?php echo $donnees['titre']; ?><br />
				Type:<?php echo $donnees['typ']; ?> <br />
				Genre: <?php echo $donnees['genre']; ?> <br />
				Variete: <?php echo $donnees['variete']; ?> <br />
				Prix: <?php echo $donnees['prix']; ?> <br />
				<?php $idannonce=$donnees['id_annonce']; ?>
				<a href="modifierannonce.php?idannonce=<?php echo $idannonce;?>" id="modifannonce">Modifier annonce n°<?php echo $i?></a>
				</p>
				<?php
				$i++;
				
			}
			$reponse->closeCursor(); // Termine le traitement de la requête
	}
	?>
</div>
 <?php include("footer.php"); ?>

</body>
</html>