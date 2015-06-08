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

<div id="body_main">
 <?php include("header.php"); if (isset($_SESSION['admin'])!='')
	{
		if ($_SESSION['admin']==1){
			$genre=$_GET['genre'];
			$reponse2 = $bdd->query("DELETE  FROM Listes WHERE genre = '$genre' ");
			$reponse2->closeCursor();
			echo ( "le genre $genre a été supprimé de la base de donnée");
			
			echo "</br><a href=","Liste.php",">Retourner voir la liste</a>";
			
		}else 
		{
			header ('Location: Accueil.php');
		}
	} else
	{
		header ('Location: Accueil.php');
	}
	?>
				
 </div>
 <?php include("footer.php"); ?>

</body>
</html>