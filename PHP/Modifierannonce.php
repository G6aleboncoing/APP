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
<?php

if(	true ) 
	
	{	if(isset($_POST)!='' && 
		isset($_POST['titre'])!='' && 
		isset($_POST['typ'])!='' && 
		isset($_POST['genre'])!='' && 
		isset($_POST['variete'])!='' &&
		isset($_POST['prix'])!='' )
		{
			if(!empty($_POST['titre']) 
			&& !empty($_POST['typ'])
			&& !empty($_POST['genre'])
			&& !empty($_POST['variete'])
			&& !empty($_POST['prix']))
			{
				
				//Alors on enleve lechappement 

				$_POST['titre'] = stripslashes(trim($_POST['titre']));	
				$typ_Array = $_POST['typ'];
				$genre_Array = $_POST['genre'];
				$variete_Array = $_POST['variete'];
				$_POST['prix'] = stripslashes(trim($_POST['prix']));
							
							
				
				$titre = $_POST['titre'];
				$typ=  implode(",", $typ_Array);
				$genre =  implode(",", $genre_Array);
				$variete=  implode(",", $variete_Array);
				$prix = $_POST['prix'];				
				$idannonce = $_GET['idannonce'];
						//préparer connexion bdd
						
						$update = $bdd->prepare("UPDATE `annonces` SET  
							`titre`=:titre,
							`typ`=:type,
							`genre`=:genres,
							`variete`=:varietes,
							`prix`=:prixe
							WHERE `id_annonce`=:idannonce ");
							
								$update->execute(array(
									':titre' => $titre,
                                    ':type' => $typ,
                                    ':genres' => $genre,
                                    ':varietes' => $variete,
                                    ':prixe' => $prix,
									':idannonce'=> $_GET['idannonce']
									));
			} else 
			{
		
				echo'Veuillez remplir tout les champs';
			}
		}
	} 

if(	isset($_SESSION['adresse_mail'])!='' ) 
	{ 	$idannonce=$_GET['idannonce'];
		// vérifier id_annonce et id_membre
		$submit=$_SESSION['ID_membre'];
		$reponse = $bdd->query("SELECT * FROM annonces WHERE id_annonce = '$idannonce' ");
		while ($donnees=$reponse->fetch())
		{
			if($submit==$donnees['id_membre'])
			{
?>	
				<div class="modifierannonce">
				<form method="post" action="modifierannonce.php?idannonce=<?php echo $idannonce?>">
		
				<label for="titre">Titre</label>
				<input type="text" name="titre" id="titre" value='<?php echo $donnees['titre']?>'/><br />

				<p>	<label for="Typ">Type</label>
				<select name="typ[]" >
				<option value="Null">Type</option>
				<option value="Legume" <?php if("Legume"==$donnees['typ']) { echo' selected="selected"';}?>>Legume</option>
				<option value="Fruit"<?php if("Fruit"==$donnees['typ']) { echo' selected="selected"';}?>>Fruit</option>
				</select>
				</p>

				<p>	<label for="Genre">Genre</label>
				<select name="genre[]" >
				<option value="Null" >Genre</option>
				<option value="Pomme" <?php if("Pomme"==$donnees['genre']) { echo'" selected="selected"';}?>>Pomme</option>
				<option value="Poire" <?php if("Poire"==$donnees['genre']) { echo'" selected="selected"';}?>>Poire</option>
				<!--appeller genre.php ici-->
				</select>
				</p>
				<p>	<label for="Variete">Variete</label>
				<select name="variete[]" >
				<option value="Null" >Variete</option>
				<option value="Gala"<?php if("Gala"==$donnees['variete']) { echo'" selected="selected"';}?>>Gala</option>
				<option value="Royal"<?php if("Royal"==$donnees['variete']) { echo'" selected="selected"';}?>>Royal</option>
				<!--appeller variete.php ici-->
				</select>
				</p>

				<!-- s'occuper de la comparaison des prix (> = <)-->
				<label for="prix">Prix</label>
				<input type="text" name="prix" id="prix" value='<?php echo $donnees['prix']?>'/><br />

				<input type="submit" name="envoi" value="Envoyer"/>

				</form>
				<a href="supprimerannonce.php?idannonce=<?php echo $idannonce;?>" id="suppannonce">Supprimer annonce</a>
				</div>
<?php
			} else 
			{ echo "ce n'est pas votre annonce";
			}
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