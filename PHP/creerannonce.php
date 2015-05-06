
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
//permet de se connecter a la bdd
include("configuration.php"); ?>

<?php

						echo'bonjour';
//vérifier si les champs sont remplis-si le formulaire a été envoyé
if(isset($_POST)!='' && 
	isset($_POST['titre'])!='' && 
	isset($_POST['description'])!='' && 
	isset($_POST['genre'])!='' && 
	isset($_POST['variete'])!='' &&
	isset($_POST['prix'])!='' ){
		
		if(!empty($_POST['titre']) 
			&& !empty($_POST['description'])
			&& !empty($_POST['genre'])
			&& !empty($_POST['variete'])
			&& !empty($_POST['prix'])){
				
			echo'rempli';
						
//Alors on enleve lechappement 

			$_POST['titre'] = stripslashes(trim($_POST['titre']));
			$_POST['description'] = stripslashes(trim($_POST['description']));
			$_POST['genre'] = stripslashes(trim($_POST['genre']));
			$_POST['variete'] = stripslashes(trim($_POST['variete']));
			$_POST['prix'] = stripslashes(trim($_POST['prix']));
							
			echo'echappemment';
							
				
			$id_annonce = '';
			$titre = $_POST['titre'];
			$description = $_POST['description'];
			$genre = $_POST['genre'];
			$variete= $_POST['variete'];
			$prix = $_POST['prix'];
				
		//préparer connexion bdd
			if($i = $bdd->prepare("
				INSERT INTO annonces (id_annonce,titre,description,genre,variete, prix)
				VALUES (:id_annonce,:titre,:description,:genre,:variete,:prix)")
			) {	
				
				echo'connexion';
				//envoi base de données
				$i->bindParam(':id_annonce', $id_annonce);
				$i->bindParam(':titre', $titre);
				$i->bindParam(':description', $description);
				$i->bindParam(':genre', $genre);
				$i->bindParam(':variete', $variete);
				$i->bindParam(':prix', $prix);
				$i->execute();
		
				echo'envoyé';
									
			}
		}
	}else {	$form = true;}

	if ($form=true )
{
?>	
<div class="content">
<form method="post" action="creerannonce.php">
		
	<label for="titre">Titre</label>
	<input type="text" name="titre" id="titre" value=""/><br />

	<label for="description">Description</label>
	<input type="text" name="description" id="description" value=""/><br />

	<label for="genre">genre</label>
	<input type="text" name="genre" id="genre" value=""/><br />

	<label for="variete">Variété</label>
	<input type="text" name="variete" id="variete" value=""/><br />

	<label for="prix">Prix</label>
	<input type="text" name="prix" id="prix" value=""/><br />

	<input type="submit" name="envoi" value="Envoyer"/>

</form>
	
</div>
<?php
}
?>

<?php include("footer.php"); ?> 

</body>
</html>
