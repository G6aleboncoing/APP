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

<script language="javascript"> function liste(form5) { 
alert("L\'élément " + (form5.list.selectedIndex + 1)); }
</SCRIPT> 


</head>

<body>

<?php include("header.php"); ?> 

<div id="body_main">
<?php

if(	isset($_SESSION['ID_membre'])!='' ) 
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
				$genre_Array = $_POST['genre'];
				$variete_Array = $_POST['variete'];
				$_POST['description'] = stripslashes(trim($_POST['description']));
				$_POST['prix'] = stripslashes(trim($_POST['prix']));
													
				$id_annonce = '';
				$titre = $_POST['titre'];
				$typ=  implode(",", $typ_Array);
				$genre =  implode(",", $genre_Array);
				$variete=  implode(",", $variete_Array);
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
	
if (isset($_SESSION['email'])!='')
	{
?>

</br>


		<script type="text/javascript">
		function actionAvecUnVraiNom() {
			
		
		alert ("coucou");
		var genree=0;
		alert (document.getElementById('formulaire_annonce').value);
		alert (genree);
		}
		</script>

<div id="formulaire_annonce">

<p>Veuillez renseignez les champs ci-dessous</p>
		<form method="post" action="creerannonce.php">
		<div class="box15">
			<h2>Catégories</h2>
			<div class="box15_ribbon"></div>
		</div>
		<ul>
		
		<p>	<label for="Typ">Type :</label>
		<li>
			<select name="typ[]" onchange="actionAvecUnVraiNom()">
			<option value="Null" selected="selected">   </option>
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
		
		
		<p>	<label for="Genre">genre :</label>
		<li>
			<select name="genre[]" onchange="actionAvecUnVraiNom()">
			<option value="Null" selected="selected">   </option>
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
		</li>
		</p>
		

		<p>	<label for="Variete">Variété :</label>
		<li>
			<select name="variete[]" onchange="actionAvecUnVraiNom()">
			
			<?php if ($_POST['genre']=='')
			{
				?>
				<?php
			
				//verification blabla
				$reponse = $bdd->query("SELECT DISTINCT variete FROM `listes` ORDER BY variete ASC ");
				while ($donnees = $reponse->fetch())
				{ 
					?>
					<option value="<?php echo $donnees['variete'];?>"> <?php echo $donnees['variete'];?></option>	
					<?php
				}
			}else 
			{
				?>
				<option value="Null" selected="selected">   </option>
				<?php
			}
			?>
			</select>
		</li>
		</p>
		
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
