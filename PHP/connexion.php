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
		&& !empty($_POST['passe']))
		{
			$_POST['email'] = stripslashes(trim($_POST['email']));
			$_POST['passe'] = stripslashes(trim($_POST['passe']));
						
$i=0;
			$email=$_POST['email'];
			$passe=sha1($_POST['passe']);
			$req=$bdd->query("SELECT * FROM membres where email = '$email'"); 
			$data=$req->fetch(); 
			if($data['email'] != ""){
					
				$req->closeCursor(); 	
				echo'Verifions le mot de passe ';		
				$req2=$bdd->query("SELECT mot_passe FROM membres where email = '$email'"); 
				$data2=$req2->fetch(); 
				if($data2['mot_passe']== "$passe")	{
					echo'bon mot de passe ';		
					$_SESSION['email']= $data['email'];
					$_SESSION['passe']= $data['mot_passe'];
					$_SESSION['ID_membre']= $data['id_membre'];
					$_SESSION['nom']= $data['nom'];
					$_SESSION['prenom']= $data['prenom'];
					$_SESSION['Pays']= $data['pays'];
					$_SESSION['ville']= $data['ville'];
					$req2->closeCursor(); 	
					
				} else {
					echo'mauvais mdp';				
					$req2->closeCursor(); 
				}
			}else{
			echo'inscrivez vous avant de vous connecter ;) ';			$req->closeCursor(); 
			}
		} 
		else{
		echo'remplissez les deux champs, petit malin ';
		}
	}