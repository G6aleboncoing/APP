<?php (include"configuration.php"); ?>
<!DOCTYPE html>
<html>
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


//vérifier si les champs sont remplis-si le formulaire a été envoyé
if(	isset($_POST['email'])!='' && 
	isset($_POST['passe'])!='' ) 
	{
		if(!empty($_POST['email']) 	
		&& !empty($_POST['passe'])
		{
			$_POST['email'] = stripslashes(trim($_POST['email']));
			$_POST['passe'] = stripslashes(trim($_POST['passe']));
						

			$email=$_POST['email'];
			$req=$bdd->query("SELECT * FROM membres where email = '$email'"); 
			$data=$req->fetch(); 
			$reponse->closeCursor(); 
			//vérifier si l'email est enregistré
			if($data['email'] == "1"){
				$req=$bdd->query("SELECT mot_passe FROM membres where email = '$email'"); 
				$data=$req->fetch(); 
				$reponse->closeCursor(); 
				if($data['mot_passe']==$_POST['passe']){
					//initié la session
				}
				else {
				echo'le mot de passe est incorrect';
				}
			
			}else{
			echo'inscrivez vous avant de vous connecter ;) ';
			}
			
		} 
		else{
		echo'remplissez les deux champs, petit malin ';
		}
	}