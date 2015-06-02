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

<!-- il n'y a ici que le traitement des donnéees reçu, en effet, le formulaire se trouve dans le header-->

	<?php include("header.php"); ?> 
	
	
<div id="body_main">
<?php

//On vérifie si les variables sont définies
if(	isset($_POST['email'])!='' && 
	isset($_POST['passe'])!='' ) 
	{
		//On vérifie que les variables soient remplies
		if(!empty($_POST['email']) 	
		&& !empty($_POST['passe']))
		{
			//supprime les anti slash dans les variables pour éviter certaines injections
			$_POST['email'] = stripslashes(trim($_POST['email']));
			$_POST['passe'] = stripslashes(trim($_POST['passe']));
						
			//on créer des variables que l'on peut envoyer dans nos requêtes et on hashe le mot de passe , cryptage plus puissant à venir
			$email=$_POST['email'];
			$passe=sha1($_POST['passe']);
			
			//on lance une requête pour vérifier que le mail existe ie que la personne c'est inscrite
			$req=$bdd->query("SELECT * FROM membres where email = '$email'"); 
			$data=$req->fetch(); 
			if($data['email'] != ""){
					
				$req->closeCursor(); 	
				
				//on vérifie que le mot de passe est bon
				$req2=$bdd->query("SELECT mot_passe FROM membres where email = '$email'"); 
				$data2=$req2->fetch(); 
				if($data2['mot_passe']== "$passe")	
				{
					//si le mot de passe est bon, on créer à partir des données récupérées nos variables de session.
					$_SESSION['email']= $data['email'];
					$_SESSION['passe']= $data['mot_passe'];
					$_SESSION['ID_membre']= $data['id_membre'];
					$_SESSION['nom']= $data['nom'];
					$_SESSION['prenom']= $data['prenom'];
					$_SESSION['Pays']= $data['pays'];
					$_SESSION['ville']= $data['ville'];
					$_SESSION['detail']= $data['detail'];
					$_SESSION['admin']= $data['admin'];
					$req2->closeCursor(); 	
					echo $_SESSION['email'],'</br>';
					
					//On redirige vers la page d'accueil
					header ('Location: Accueil.php');
				
				} else 
				{
					//bah le mot de passe est pas bon qu'ces que tu veux que je te dise
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
			//bah oui, on va pas le faire rentrer juste avec l'adresse ou le mot de passe, des oublis ça arrive à tout le monde !
		}
	}
	?>

</div>
 <?php include("footer.php"); ?>

</body>
</html>
