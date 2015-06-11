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

<div id="body_main">


	<!--on récupère dans les $_sessions les données de l'utilisateur à afficher dans son profil -->
	<!--ajouter l'image-->
	<?php 
	if (isset($_SESSION['adresse_mail'])!='')//on ne vérifie que pour le mail en partant du principe que si ce session est fait, les autres le sont aussi. Dans l'absolu on SAIT qu'il faudrait tout vérifier
	{
		echo'
<div id="compte_section">

<h1>Mes données personnelles</h1>


<div class="box">
<h2>Mes Coordonnées</h2>
<div class="box_ribbon"></div>
</div>

<ul>
<li><label>Civilité:&nbsp;</label><p id="civilite">',$_SESSION['civilite'],'</p></li>
<li><label>Prénom:&nbsp;</label><p id="prenom">',$_SESSION['prenom'],'</li>
<li><label>Nom:&nbsp;</label><p id="nom">',	$_SESSION['nom'],'</li>
<li><label>Pays:&nbsp;</label><p id="pays">',$_SESSION['pays'],'</p></li>
<li><label>Région:&nbsp;</label><p id="Region">',$_SESSION['region'],'</p></li>
<li><label>Adresse:&nbsp;</label><p id="adresse">',$_SESSION['adresse'],'</p></li>
<li><label>Code Postal:&nbsp;</label><p id="code_postal">',$_SESSION['code_postal'],'</p></li>
<li><label>Ville:&nbsp;</label><p id="ville">',$_SESSION['ville'],'</p></li>
<li><label>Telephone:&nbsp;</label><p id="numero_de_tel">',$_SESSION['numero_de_tel'],'</p></li>
<li><label>Detail :&nbsp;</label><p id="detail">',$_SESSION['detail'],'</p></li> </br>

<li><hr></li>
<li><hr></li>
</ul>

<div class="box">
<h2>Mon Adresse Email</h2>
<div class="box_ribbon"></div>
</div>

<ul>
<li><label>Email:&nbsp;</label><p id="adresse_mail">',$_SESSION['adresse_mail'],'</p></li>
<li><hr></li>
<li><hr></li>
</ul>

<ul>

<li><label>&nbsp;</label><a  href="modifiercompte.php">>> Modifier Compte</a></li>
</div>';


	} else
	{ echo 'connectez vous sur la page d\'accueil :<a href="Accueil.php" id="accueil">Accueil</a> </br>';
		
	}
 ?>

</div>

 <?php include("footer.php"); ?>

</body>
</html>