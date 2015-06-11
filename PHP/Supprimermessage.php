<?php
include('configuration.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" media="screen" type="text/css" href="../CSS/main.css" />
<link href='http://fonts.googleapis.com/css?family=Brawler' rel='stylesheet' type='text/css'>
<link rel="icon" type="image/png" href="images/lbc_logo.png" />
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="../JavaScript/main.js"></script>
<title>LeBonCoing</title>
</head>

<body>

 <?php include("header.php"); ?>

 <?php
	$idcom=$_GET['idcom'];
	$reponse = $bdd->query("SELECT * FROM commentaire WHERE id = '$idcom' ");

	while ($donnees=$reponse->fetch())
	{

		if($_SESSION['admin']=='1')
		{
			$reponse2 = $bdd->query("DELETE  FROM commentaire WHERE id = '$idmessage' ");
 
			$reponse2->closeCursor(); // Termine le traitement de la requête
			
		echo 'L\'annonce a bien été supprimé';
		} else {
			header ('Location: Accueil.php');
		}
		
		$reponse->closeCursor(); // Termine le traitement de la requête
	}
?>
 
 <?php include("footer.php"); ?>

</body>
</html>