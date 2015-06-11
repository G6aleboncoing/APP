<?php (include"configuration.php"); ?>
<!DOCTYPE html>
<html>
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

<!-- il n'y a ici que le traitement des donnéees reçu, en effet, le formulaire se trouve dans le header-->

	<?php include("header.php"); ?> 
	
	
<div id="body_main">
<?php

//On vérifie si les variables sont définies
if(	isset($_POST['adresse_mail'])!='' && 
	isset($_POST['mdp'])!='' ) 
	{
		//On vérifie que les variables soient remplies
		if(!empty($_POST['adresse_mail']) 	
		&& !empty($_POST['mdp']))
		{
			//supprime les anti slash dans les variables pour éviter certaines injections
			$_POST['adresse_mail'] = stripslashes(trim($_POST['adresse_mail']));
			$_POST['mdp'] = stripslashes(trim($_POST['mdp']));

			//on créer des variables que l'on peut envoyer dans nos requêtes et on hashe le mot de mdp , cryptage plus puissant à venir
			$adresse_mail=$_POST['adresse_mail'];
			$mdp=sha1($_POST['mdp']);

			//on lance une requête pour vérifier que le mail existe ie que la personne c'est inscrite
			$req=$bdd->query("SELECT * FROM membres2 where adresse_mail = '$adresse_mail'"); 
			$data=$req->fetch(); 
			if($data['adresse_mail'] != ""){

				$req->closeCursor(); 

				//on vérifie que le mot de mdp est bon
				$req2=$bdd->query("SELECT mdp FROM membres2 where adresse_mail = '$adresse_mail'"); 
				$data2=$req2->fetch(); 
				if($data2['mdp']== "$mdp")
				{
					//si le mot de mdp est bon, on créer à partir des données récupérées nos variables de session.
								
								$_SESSION['civilite']= $data['civilite'];
								$_SESSION['adresse_mail']= $data['adresse_mail'];
								$_SESSION['mdp']= $data['mdp'];
								$_SESSION['ID_membre']= $data['id_membre'];
								$_SESSION['nom']= $data['nom'];
								$_SESSION['prenom']= $data['prenom'];
								$_SESSION['pays']= $data['pays'];
								$_SESSION['region']= $data['region'];
								$_SESSION['admin']= $data['admin'];
								$_SESSION['adresse']= $data['adresse'];
								$_SESSION['code_postal']= $data['code_postal'];
								$_SESSION['numero_de_tel']= $data['numero_de_tel'];
								$_SESSION['ville']= $data['ville'];
								$_SESSION['detail']= $data['detail'];
					$req2->closeCursor(); 

					//On redirige vers la page d'accueil
					header ('Location: Accueil.php');
				
				} else 
				{
					//bah le mot de mdp est pas bon qu'ces que tu veux que je te dise
					echo'mauvais mdp';				
					$req2->closeCursor(); 
				}
			}else
			{
				//bah il est pas inscrit , qu'il s'inscrive !
				echo'inscrivez vous avant de vous connecter ;) ';
				$req->closeCursor(); 
			}
		} else
		{
			echo'remplissez les deux champs, petit malin ';
			//bah oui, on va pas le faire rentrer juste avec l'adresse ou le mot de mdp, des oublis ça arrive à tout le monde !
		}
	}
	?>

</div>
 <?php include("footer.php"); ?>

</body>
</html>
