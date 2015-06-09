<?php (include"configuration.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" media="screen" type="text/css" href="../CSS/main.css" />
<link rel="icon" type="image/png" href="images/coing.png" />
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="../JavaScript/main.js"></script>
<script src="../JavaScript/jquery.js"></script>
<title>LeBonCoing</title>
			<script type='text/javascript'>
		</script>

</head>

<body>

<?php include("header.php"); ?> 

<div id="body_main">
</br></br></br>
<?php

if( isset($_SESSION['ID_membre'])!='' ) 
	{		
		//vérifier si les champs sont remplis-si le formulaire a été envoyé
		if(isset($_POST)!='' && 
		isset($_POST['titre'])!='' && 
		isset($_POST['typ'])!='' && 
		isset($_POST['genre'])!='' && 
		isset($_POST['variete'])!='' &&	
		isset($_POST['description'])!='' &&
		isset($_POST['prix'])!='' )
		{
			if(!empty($_POST['titre']) 
			&& !empty($_POST['typ'])
			&& !empty($_POST['genre'])
			&& !empty($_POST['variete'])
			&& !empty($_POST['description'])
			&& !empty($_POST['prix']))
			{
				
				//Alors on enleve lechappement 

				$_POST['titre'] = stripslashes(trim($_POST['titre']));	
				$typ_Array = $_POST['typ'];
				$genre = stripslashes(trim($_POST['genre']));
				$variete = stripslashes(trim($_POST['variete']));
				$_POST['description'] = stripslashes(trim($_POST['description']));
				$_POST['prix'] = stripslashes(trim($_POST['prix']));
				$id_annonce = '';
				$titre = $_POST['titre'];
				$typ=  implode(",", $typ_Array);
				// $genre =  implode(",", $genre_Array);
				// $variete=  implode(",", $variete_Array);
				$description = $_POST['description'];				
				$prix = $_POST['prix'];				
				$id_membre = $_SESSION['ID_membre'];
				
				
				//préparer connexion bdd
				if($i = $bdd->prepare("
				INSERT INTO annonces (id_annonce,titre,typ,genre,variete,description, prix,id_membre)
				VALUES (:id_annonce,:titre,:typ,:genre,:variete,:description,:prix,:id_membre)")
				) 
				{	
				
					//envoi base de données
					$i->bindParam(':id_annonce', $id_annonce);
					$i->bindParam(':titre', $titre);
					$i->bindParam(':typ', $typ);
					$i->bindParam(':genre', $genre);
					$i->bindParam(':variete', $variete);
					$i->bindParam(':description', $description);
					$i->bindParam(':prix', $prix);
					$i->bindParam(':id_membre', $id_membre);
					$i->execute();
				}
			}	
		}else 
		{	
		}
	} else 
	{
		
	}
	
if (isset($_SESSION['adresse_mail'])!='')
	{$test=0;
?>

</br>

<div id="formulaire_annonce">

		<form method="post" action="creerannonce.php">
		<div class="box15">
			<h2>Catégories</h2>
			<div class="box15_ribbon"></div>
		</div>
		<ul>
		
		<p>	<label for="Typ">Type :</label>
		<li>
			<select name="typ[]" id="type" onchange="go()">
			<option value="">--type--</option>
			<?php
			//verification blabla
			$reponse = $bdd->query("SELECT DISTINCT typ FROM `listes` ORDER BY typ ASC ");
			while ($donnees = $reponse->fetch())
			{ 
				?>
				<option value="<?php echo $donnees['typ'];?>"> <?php echo $donnees['typ'];?></option>	
				<?php
			}
				?>
		
			</select>
		</li>
		</p>
		
		
				<label>genre : </label>
				<div id="genre">
				<select name="genre[]" id="genre">
				<option value="Null" selected="selected">Choisir un type</option>
				<?php
				//verification blabla
				$reponse = $bdd->query("SELECT DISTINCT genre FROM `listes` ORDER BY genre ASC ");
				while ($donnees = $reponse->fetch())
				{ 
					?>
					<option value="<?php echo $donnees['genre'];?>"> <?php echo $donnees['genre'];?></option>	
					<?php
				}
				?>
		
				</select>
				</div>
				
				
				<label>Variete</label>
				<div id='variete' >
				<select name='variete' id="variete">
					<option value='-1'>Choisir un genre</option>
				</select>
				</div>

		
		</ul>
		
		<!--Localisation
		
		-->
		
		<div class="box15">
		<h2>Votre Annonce</h2>
		<div class="box15_ribbon"></div>
		</div>
		<ul>
		<label for="titre">Titre</label>
		<li><input type="text" name="titre" id="titre" value="" placeholder="Titre"/><br /></li>
		
		<label for="Description">Description</label>
		<li><textarea name="description" id="description" value=""/ placeholder="Description de votre annonce"></textarea><br /></li>

		<!-- s'occuper de la comparaison des prix (> = <)-->
		<label for="prix">Prix au kilos</label>
		<input type="int" name="prix" id="prix" value=""/><br />

		<input type="submit" name="envoi" value="Envoyer"/>

		</form>
		</u>
		</div>

<?php
	} else
	{
		echo '</br>vous devez être connecter pour poser une annonce </br>
		<a href="Inscription.php" id="password_forgotten">laissez vous guider ;)</a></br>';
	}
?>
</div>
<?php include("footer.php"); ?> 

</body>
</html>
