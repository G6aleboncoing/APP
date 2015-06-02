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
<?php

if(	true ) 
	
	{
		//vérifier si les champs sont remplis et si le formulaire a été envoyé
		if(	isset($_POST['nom'])!='' && 
		isset($_POST['prenom'])!='' && 
		isset($_POST['email'])!='' && 
		// isset($_POST['passe'])!='' && 
		isset($_POST['pays'])!='' &&
		isset($_POST['ville'])!='' &&
		isset($_POST['detail'])!='' &&
		isset($_POST['admin'])!=''  )
		{
		
			if(!empty($_POST['nom']) 	
			&& !empty($_POST['prenom'])
			// && !empty($_POST['passe'])
			&& !empty($_POST['pays'])
			&& !empty($_POST['ville'])
			&& !empty($_POST['detail'])
			&& !empty($_POST['admin']))
			{
				//Alors on enleve lechappement 

		
				echo'enlever echappement';
				$_POST['nom'] = stripslashes(trim($_POST['nom']));
				$_POST['prenom'] = stripslashes(trim($_POST['prenom']));
				$_POST['email'] = stripslashes(trim($_POST['email']));
				// $_POST['passe'] = stripslashes(trim($_POST['passe']));
				$_POST['pays'] = stripslashes(trim($_POST['pays']));
				$_POST['ville'] = stripslashes(trim($_POST['ville']));
				$_POST['detail'] = stripslashes(trim($_POST['detail']));
				$_POST['admin'] = stripslashes(trim($_POST['admin']));
	
				//vérifier format l'adresse mail ici
				if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['email']))
				{
		
					
					//vérifier unicité de l'adresse ici
					if(true)
					{
				
						echo'echapemment des variables';
						// Alors on echappe les variables pour pouvoir les mettre en requete sql

						$nom = $_POST['nom'];
						$prenom = $_POST['prenom'];
						$email = $_POST['email'];
						// $mot_passe = sha1($_POST['passe']);
						$pays = $_POST['pays'];
						$ville = $_POST['ville'];
						$detail = $_POST['detail'];
						$admin = $_POST['admin'];
			
						echo'succesfull';
						//préparer connexion bdd
						
						$update = $bdd->prepare("UPDATE `membres` SET  
							`nom`=:nom,
							`prenom`=:prenom,
							`email`=:email,
							`pays`=:pays,
							`ville`=:ville,
							`detail`=:detail ,
							`admin`=:admin
							WHERE `email`=:email");
 						
								$update->execute(array(
									':nom' => $_POST['nom'],
                                    ':prenom' => $_POST['prenom'],
                                    ':email' => $_POST['email'],
									':pays' => $_POST['pays'],
									':ville' => $_POST['ville'],
									':detail' => $_POST['detail'],
									':admin' => $_POST['admin'],
									':email' => $_SESSION['email']
									));
				
					}else
					{	
						//si adresse déjà utilisé
						echo'Cette adresse est déjà utillisé';
					}
	
				}else
				{
					//si adresse pas bonne
					echo 'Veuillez entrer une adresse électronique valide';

				} 	
			} else 
			{
		
				echo'Veuillez remplir tout les champs';
			}
		} else 
		{	
		}
	}
	
if(	$_SESSION['admin']=='1' ) 
	{ 
	
		$idmembre=$_GET['idmembre'];
		$reponse = $bdd->query("SELECT * FROM membres WHERE id_membre = $idmembre ");

		// On affiche chaque entrée une à une
		while ($donnees = $reponse->fetch())
		{
			
?>
			
			<div class="content">
			<form method="post" action="Modifiercompteadmin.php?idmembre=<?php echo $idmembre;?>">
		
			<label for="nom">Nom</label>
			<input type="text" name="nom" id="nom" value='<?php echo $donnees['nom'] ?>'/><br/>
		
			<label for="prenom">Prenom</label>
			<input type="text" name="prenom" id="prenom" value='<?php echo $donnees['prenom'] ?>'/><br />

			<label for="email">Adresse email</label>
			<input type="text" name="email" id="email" value='<?php echo $donnees['email'] ?>'/><br />

			<label for="pays">Pays</label>
			<input type="text" name="pays" id="pays" value='<?php echo $donnees['pays'] ?>'/><br />
	
			<label for="ville">Ville</label>
			<input type="text" name="ville" id="ville" value='<?php echo $donnees['ville'] ?>'/><br />

			<label for="detail">Informations personnelles</label>
			<input type="text" name="detail" id="detail" value='<?php echo $donnees['detail'] ?>'/><br />
			
			<label for="admin">niveau de priorité </label>
			<input type="int" name="admin" id="admin" value='<?php echo $donnees['admin'] ?>'/><br />
	
			<input type="hidden" name="validate" id="validate" value="ok"/>

			<input type="submit" name="envoi" value="Modifier"/>

			</form>
	
			</div>
<?php
			}
	} else
	{
		echo'vous êtes déjà inscrit(e)';
	}
?>
</div>
 <?php include("footer.php"); ?>

</body>
</html>