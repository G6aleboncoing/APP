<?php
include('configuration.php');
?>
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
	
	 <?php include("boutonsection.php"); ?>

	<?php 
	// On récupère tout le contenu de la table jeux_video

	$reponse = $bdd->query('SELECT * FROM annonces');

	// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch()){
?>
    <p>
    <strong>annonces</strong> : <?php echo $donnees['titre']; ?><br />
    Description:<?php echo $donnees['description']; ?> <br />
	Genre: <?php echo $donnees['genre']; ?> <br />
    Variete: <?php echo $donnees['variete']; ?> <br />
	Prix: <?php echo $donnees['prix']; ?> <br />
   </p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
 
 <?php include("footer.php"); ?>

</body>
</html>