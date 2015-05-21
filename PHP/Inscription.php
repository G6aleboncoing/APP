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
//Vérifier qu'il n'est pas connecté
if(	isset($_SESSION['email'])!='' ) 
	{		
	echo "Vous êtes déjà connecter, pourquoi s'inscrire ? ;)";
	}else 	
	{
		//vérifier si les champs sont remplis et si le formulaire a été envoyé
		if(	isset($_POST['nom'])!='' && 
		isset($_POST['prenom'])!='' && 
		isset($_POST['email'])!='' && 
		isset($_POST['passe'])!='' && 
		isset($_POST['pays'])!='' &&
		isset($_POST['ville'])!='' &&
		isset($_POST['detail'])!=''  )
		{
		
			if(!empty($_POST['nom']) 	
			&& !empty($_POST['prenom'])
			&& !empty($_POST['passe'])
			&& !empty($_POST['pays'])
			&& !empty($_POST['ville'])
			&& !empty($_POST['detail']))
			{
				//Alors on enleve lechappement 

		
				echo'enlever echappement';
				$_POST['nom'] = stripslashes(trim($_POST['nom']));
				$_POST['prenom'] = stripslashes(trim($_POST['prenom']));
				$_POST['email'] = stripslashes(trim($_POST['email']));
				$_POST['passe'] = stripslashes(trim($_POST['passe']));
				$_POST['pays'] = stripslashes(trim($_POST['pays']));
				$_POST['ville'] = stripslashes(trim($_POST['ville']));
				$_POST['detail'] = stripslashes(trim($_POST['detail']));
	
				//vérifier format l'adresse mail ici
				if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['email']))
				{
		
					echo'verification format mail';		
					$email=$_POST['email'];
					$req=$bdd->query("SELECT * FROM membres where email = '$email'"); 
					$data=$req->fetch(); 
		
					//vérifier unicité de l'adresse ici
					if($data['email'] == "")
					{
				
						echo'echapemment des variables';
						// Alors on echappe les variables pour pouvoir les mettre en requete sql
						$id_membre = '';
						$nom = $_POST['nom'];
						$prenom = $_POST['prenom'];
						$email = $_POST['email'];
						$mot_passe = sha1($_POST['passe']);
						$pays = $_POST['pays'];
						$ville = $_POST['ville'];
						$detail = $_POST['detail'];
			
						echo'succesfull';
						//préparer connexion bdd
						if($i = $bdd->prepare("
							INSERT INTO membres (id_membre,nom,prenom,email,mot_passe, pays, ville, detail)
							VALUES (:id_membre,:nom,:prenom,:email,:mot_passe,:pays,:ville,:detail)")) 
						{	
				
							echo'connexion';
							//envoi base de données
							$i->bindParam(':id_membre', $id_membre);
							$i->bindParam(':nom', $nom);
							$i->bindParam(':prenom', $prenom);
							$i->bindParam(':email', $email);
							$i->bindParam(':mot_passe', $mot_passe);
							$i->bindParam(':pays', $pays);
							$i->bindParam(':ville', $ville);
							$i->bindParam(':detail', $detail);
							$i->execute();
				
							echo'envoyé';
							$_SESSION['email']= $data['email'];
							$_SESSION['passe']= $data['mot_passe'];
						}
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
			$_POST['validatei'] ='pasok';

		}
	}

// if($_POST['validatei'] != 'ok')
if(	isset($_SESSION['email'])=='' ) 
	{
?>		
		</br>
		<div class="content">
		<form method="post" action="inscription.php">
		
		<label for="nom">Nom</label>
		<input type="text" name="nom" id="nom" value=""/><br />
	
		<label for="prenom">Prenom</label>
		<input type="text" name="prenom" id="prenom" value=""/><br />

		<label for="email">Adresse email</label>
		<input type="text" name="email" id="email" value=""/><br />

		<label for="passe">Mot de passe</label>
		<input type="password" name="passe" id="passe" value=""/><br />

		<label for="pays">Pays</label>
		<input type="text" name="pays" id="pays" value=""/><br />
	
		<label for="ville">Ville</label>
		<input type="text" name="ville" id="ville" value=""/><br />

		<label for="detail">Informations personnelles</label>
		<input type="text" name="detail" id="detail" value=""/>	<br />
	
		<input type="hidden" name="validate" id="validate" value="ok"/>

		<input type="submit" name="envoi" value="Envoyer"/>

		</form>
	
		</div>
<?php
	} else
	{
		echo'vous êtes déjà inscrit(e)';
	}
?>


<?php include("footer.php"); ?> 

</body>
</html>