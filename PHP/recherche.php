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


<div id="body_main">
	<div class="box15">
		<h2>Recherche simple</h2>
	<div class="box15_ribbon"></div>
		</div>
	<form method="post" action="recherche.php">
		<label for="query">Entrer votre recherche </label>
		<input type="search" name="submit" maxlength="50" size="30" placeholder="Rechercher">
		<input type="submit" value="submit">
	</form>


<?php
if(	isset($_POST['submit'])!='')
	{
		$submit=$_POST['submit'];
		if(!empty($_POST['submit']))
		{ $reponse = $bdd->query("SELECT * FROM annonces WHERE titre LIKE '%$submit%' OR typ LIKE '%$submit%' OR genre LIKE '%$submit%'  OR variete LIKE '%$submit%' ");

		  $reponse3 = $bdd->query("SELECT * FROM membres2 WHERE nom LIKE '%$submit%' OR prenom LIKE '%$submit%' OR ville LIKE '%$submit%'  OR detail LIKE '%$submit%'");

			// On affiche chaque entrée une à une
			echo "Annonce correspondante:" ;
			while ($donnees = $reponse->fetch())
			{ $idmembre=$donnees['id_membre'];
				$reponse2 = $bdd->query("SELECT * FROM membres WHERE id_membre='$idmembre'");
				while ($donnees2 = $reponse2->fetch())
				{
					?>
					<p>
					<strong>Annonce</strong> : <?php echo $donnees['titre']; ?><br />
					<strong>Le possesseur de cette annonce est :</strong> <?php echo 'm(me) ',$donnees2['nom'],' ',$donnees2['prenom']?> <br />
					<strong>Type:</strong> <?php echo $donnees['typ']; ?> <strong>Genre:</strong> <?php echo $donnees['genre']; ?> <strong>Variétés:</strong> <?php echo $donnees['variete']; ?> <br />
					<strong>Prix:</strong> <?php echo $donnees['prix']; ?> euros <br />
					<br />
					</p>
<?php			}
			}
			$reponse->closeCursor(); // Termine le traitement de la requête
		}
		else echo "veuillez entrer une recherche";
	}
	?>
	
	</br>
		<form method="post" action="recherche.php">
		<div class="box15">
			<h2>Recherche avancée</h2>
			<div class="box15_ribbon"></div>
		</div>
		</br>
				<ul>
		<label for="query">Titre d'annonces :</label>
		<li><input type="text" name="titre" id="titre" value="" placeholder="Titre"/><br /></li>
		
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
				<option value="" >--genre--</option>
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
				
				</br>
				<label>Variete</label>
				<div id='variete' >
				<select name='variete' id="variete">
					<option value=''>--Choisir un genre--</option>
				</select>
				</div>

		
		</ul>
		</br>
				<!-- s'occuper de la comparaison des prix (> = <)-->
		<input type="submit" name="envoie" value="Envoyer"/>

		<!--Localisation
		
		-->
		



		</form>
		</u>
		</div>
<?php

if(isset($_POST)!='' && 
	isset($_POST['titre'])!=''&& 
	isset($_POST['typ'])!=''&& 
	isset($_POST['genre'])!=''&& 
	isset($_POST['variete'])!=''&& 
	isset($_POST['prix'])!=''&& 
	isset($_POST['signe'])!='')
{
	if(!empty($_POST['titre']) ||
	!empty($_POST['typ'])||
	!empty($_POST['genre'])||
	!empty($_POST['variete']))
	{
		$typ_Array = $_POST['typ'];
		$genre_Array = $_POST['genre'];
		$titre = stripslashes(trim($_POST['titre']));
		$typ=  implode(",", $typ_Array);
		// echo $genre_Array;
		if(is_array($genre_Array)==true) {
			$genre=  implode(",", $genre_Array);
		}else {
			$genre=stripslashes(trim($genre_Array));
		}
		// $genre=  implode(",", $genre_Array);
		$variete = stripslashes(trim($_POST['variete']));
		$prix = stripslashes(trim($_POST['prix']));
		$signe = stripslashes(trim($_POST['signe']));

		{ if ($titre==''){
			if ($variete==''){
				if($genre==''){
					$reponse4 = $bdd->query("SELECT * FROM annonces WHERE ( typ = '$typ') ORDER BY titre ASC");
				}else {
					$reponse4 = $bdd->query("SELECT * FROM annonces WHERE ( ( genre = '$genre' )) ORDER BY titre ASC");
				}
			}else {
				$reponse4 = $bdd->query("SELECT * FROM annonces WHERE ( ( variete = '$variete')) ORDER BY titre ASC");
			}
			
		} else {
			if ($variete==''){
				if($genre==''){
					$reponse4 = $bdd->query("SELECT * FROM annonces WHERE ( (titre LIKE '%$titre%') AND (typ = '$typ' )) ORDER BY titre ASC");
				}else {
					$reponse4 = $bdd->query("SELECT * FROM annonces WHERE ( (titre LIKE '%$titre%') AND ( genre = '$genre' )) ORDER BY titre ASC");
				}
			}else {
				$reponse4 = $bdd->query("SELECT * FROM annonces WHERE ( (titre LIKE '%$titre%') AND ( variete = '$variete')) ORDER BY titre ASC");
			}
		}


			// On affiche chaque entrée une à une
			echo "Annonce correspondante:" ;
			while ($donnees4 = $reponse4->fetch())
			{ 
			$idmembre=$donnees4['id_membre'];
			$reponse5 = $bdd->query("SELECT * FROM membres WHERE id_membre='$idmembre'");
				while ($donnees5 = $reponse5->fetch())
				{
					?>
					<p>
					<strong>Annonce</strong> : <?php echo $donnees4['titre']; ?><br />
					<strong>Le possesseur de cette annonce est :</strong> <?php echo $donnees5['nom'],' ',$donnees5['prenom']?> <br />
					<strong>Type:</strong> <?php echo $donnees4['typ']; ?> <strong>Genre:</strong> <?php echo $donnees4['genre']; ?> <strong>Variétés:</strong> <?php echo $donnees4['variete']; ?> <br />
					<strong>Prix:</strong> <?php echo $donnees4['prix']; ?> euros <br />
					<br />
					</p>
		<?php
				}
			$reponse5->closeCursor();
			}
		$reponse4->closeCursor(); // Termine le traitement de la requête
		}
	} else {
		echo"remplir au moins un des champs";
	}
}
?>
	</div>
 <?php include("footer.php"); ?>
</body>
</html>