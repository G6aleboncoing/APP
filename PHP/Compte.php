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
	<!--on récupère dans les $_sessions les données de l'utilisateur à afficher dans son profil -->
	<!--ajouter l'image-->
	<?php 
	echo '</br> bonjour </br>';
	if (isset($_SESSION['email'])!='')//on ne vérifie que pour le mail en partant du principe que si ce session est fait, les autres le sont aussi. Dans l'absolu on SAIT qu'il faudrait tout vérifier
	{
		echo 'email:',$_SESSION['email'],'</br>',
		'nom:',	$_SESSION['nom'],'</br>',
		'prenom:',$_SESSION['prenom'],'</br>',
		'pays:',$_SESSION['Pays'],'</br>',
		'ville:',$_SESSION['ville'],'</br>',
		'<a href="modifiercompte.php" id="modifinfo">Modifier compte</a>';
	} else
	{ echo 'connectez vous sur la page d\'accueil :<a href="Accueil.php" id="accueil">Accueil</a> </br>';
		
	}
 ?>

</div>

 <?php include("footer.php"); ?>

</body>
</html>