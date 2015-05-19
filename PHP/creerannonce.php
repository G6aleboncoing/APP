
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

if(	isset($_SESSION['ID_membre'])!='' ) 
	{		
		echo'bonjour';
		//vérifier si les champs sont remplis-si le formulaire a été envoyé
		if(isset($_POST)!='' && 
		isset($_POST['titre'])!='' && 
		isset($_POST['typ'])!='' && 
		isset($_POST['genre'])!='' && 
		isset($_POST['variete'])!='' &&
		isset($_POST['prix'])!='' )
		{
		echo'rempli';
			if(!empty($_POST['titre']) 
			&& !empty($_POST['typ'])
			&& !empty($_POST['genre'])
			&& !empty($_POST['variete'])
			&& !empty($_POST['prix']))
			{
				
				echo'rempli2';
						
				//Alors on enleve lechappement 

				$_POST['titre'] = stripslashes(trim($_POST['titre']));	
				$typ_Array = $_POST['typ'];
				$genre_Array = $_POST['genre'];
				$variete_Array = $_POST['variete'];
				$_POST['prix'] = stripslashes(trim($_POST['prix']));
							
				echo'echappemment';
							
				
				$id_annonce = '';
				$titre = $_POST['titre'];
				$typ=  implode(",", $typ_Array);
				$genre =  implode(",", $genre_Array);
				$variete=  implode(",", $variete_Array);
				$prix = $_POST['prix'];				
				$id_membre = $_SESSION['ID_membre'];
				
				
				//préparer connexion bdd
				if($i = $bdd->prepare("
				INSERT INTO annonces (id_annonce,titre,typ,genre,variete, prix,id_membre)
				VALUES (:id_annonce,:titre,:typ,:genre,:variete,:prix,:id_membre)")
				) 
				{	
				
					echo'connexion';
					//envoi base de données
					$i->bindParam(':id_annonce', $id_annonce);
					$i->bindParam(':titre', $titre);
					$i->bindParam(':typ', $typ);
					$i->bindParam(':genre', $genre);
					$i->bindParam(':variete', $variete);
					$i->bindParam(':prix', $prix);					
					$i->bindParam(':id_membre', $id_membre);
					$i->execute();
		
					echo'envoyé';
				}
			}
		}else 
		{	echo'non rempli';;
		}
	} else 
	{
		
	}
	
if (isset($_SESSION['email'])!='')
	{
?>	

</br>
		<div class="creerannonce">
		<form method="post" action="creerannonce.php">
		
		<label for="titre">Titre</label>
		<input type="text" name="titre" id="titre" value=""/><br />

		<p>	<label for="Typ">Type</label>
		<select name="typ[]" multiple size="3">
			<option value="Null">Type</option>
			<option value="Legume"" selected="selected">Legume</option>
			<option value="Fruit">Fruit</option>
		</select>
		</p>

		<p>	<label for="Genre">Genre</label>
		<select name="genre[]"  multiple size="3">
			<option value="Null" ""selected="selected">Genre</option>
			<option value="Pomme">Pomme</option>
			<option value="Poire">Poire</option>
			<!--appeller genre.php ici-->
		</select>
		</p>
		<p>	<label for="Variete">Variete</label>
		<select name="variete[]" multiple size="3">
			<option value="Null" ""selected="selected">Variete</option>
			<option value="Gala">Gala</option>
			<option value="Royal">Royal</option>
			<!--appeller variete.php ici-->
		</select>
		</p>

		<!-- s'occuper de la comparaison des prix (> = <)-->
		<label for="prix">Prix</label>
		<input type="text" name="prix" id="prix" value=""/><br />

		<input type="submit" name="envoi" value="Envoyer"/>

		</form>
	
		</div>

<?php
	} else
	{
		echo '</br>vous devez être connecter pour poser une annonce </br>
		<a href="Inscription.php" id="password_forgotten">laissez vous guider ;)</a></br>';
	}
?>

<?php include("footer.php"); ?> 

</body>
</html>
