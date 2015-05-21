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
if(isset($_POST)!='' && 
	isset($_POST['titre'])!='' && 
	isset($_POST['typ'])!='' && 
	isset($_POST['genre'])!='' && 
	isset($_POST['variete'])!='' &&
	isset($_POST['prix'])!='' )
	{
				
			
			echo'envoi intermediaire';
			
		$_POST['titre'] = stripslashes(trim($_POST['titre']));		
		$_POST['typ'] = stripslashes(trim($_POST['typ']));
		$_POST['genre'] = stripslashes(trim($_POST['genre']));			
		$_POST['variete'] = stripslashes(trim($_POST['variete']));
		$_POST['prix'] = stripslashes(trim($_POST['prix']));
						
		echo'echappemment';

		
		$req = $bdd->prepare('SELECT * FROM annonces WHERE titre = ? OR typ= ? OR genre = ? OR variete = ? Or prix = ?');
		$req->execute(array($_POST['titre'], $_POST['typ'] , $_POST['genre'], $_POST['variete'] , $_POST['prix']  ));
		echo 'test';
		while ($donnees = $reponse->fetch())
		{
			?>
			    <p>
    <strong>annonces</strong> : <?php echo $donnees['titre']; ?><br />
    Description:<?php echo $donnees['description']; ?> <br />
	Genre: <?php echo $donnees['genre']; ?> <br />
    Variete: <?php echo $donnees['variete']; ?> <br />
	Prix: <?php echo $donnees['prix']; ?> <br />
   </p>
   <?php
		$reponse->closeCursor();
				echo'hourra';
		}
	}
?>
<div class="recherche">
<form method="post" action="recherche.php">
		
	<label for="titre">Titre</label>
	<input type="text" name="titre" id="titre" value=""/><br />

	<p>	<label for="Type">Type</label>
		<select name="Type">
			<option value="Null">Type</option>
			<option value="Legume"" selected="selected">Legume</option>
			<option value="Fruit">Fruit</option>
		</select>
	</p>

	<p>	<label for="Genre">Genre</label>
		<select name="Genre">
			<option value="Null" ""selected="selected">Genre</option>
			<option value="Pomme">Pomme</option>
			<option value="Poire">Poire</option>
			<!--appeller genre.php ici-->
		</select>
	</p>
	<p>	<label for="Variete">Variete</label>
		<select name="Variete">
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




<!--
<select name="region" id="region" >
<option value="null">Région</option>
<option value="ile_de_france">Ile-de-France</option>
<option value="bourgogne">Bourgogne</option>
</select>

<input type="search" name="recherche_ville" placeholder="Villes ou codes postaux">


<select name="nbAnnoncePage" id="nbAnnoncePage" >
<option value="10">10</option>
<option value="20">20</option>
<option value="30">30</option>
</select>
-->


<?php include("footer.php"); ?> 

</body>
</html>