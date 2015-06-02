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

<div id="body_main">
</br>
 
 <?php
	$idannonce=$_GET['idannonce'];
	$submit=$_SESSION['ID_membre'];
	$reponse = $bdd->query("SELECT * FROM annonces WHERE id_annonce = '$idannonce' ");

	while ($donnees=$reponse->fetch())
	{
		if($submit==$donnees['id_membre'])
		{
			$idannonce=$_GET['idannonce'];
			$reponse2 = $bdd->query("DELETE  FROM annonces WHERE id_annonce = '$idannonce' ");
 
			$reponse2->closeCursor(); // Termine le traitement de la requête
		}		

		if($_SESSION['admin']=='1')
		{
			$idannonce=$_GET['idannonce'];
			$reponse2 = $bdd->query("DELETE  FROM annonces WHERE id_annonce = '$idannonce' ");

			$reponse2->closeCursor(); // Termine le traitement de la requête
		}
		
		$reponse->closeCursor(); // Termine le traitement de la requête
		echo 'L\'annonce a bien été supprimé';
	}
?>
</div>
 <?php include("footer.php"); ?>

</body>
</html>