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

<?php
echo $_SESSION['email'];
?>

<div id="body_main">
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

		  $reponse3 = $bdd->query("SELECT * FROM membres WHERE nom LIKE '%$submit%' OR prenom LIKE '%$submit%' OR ville LIKE '%$submit%'  OR detail LIKE '%$submit%'");

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
			
			echo "<br> Membres:" ;
			while ($donnees3 = $reponse3->fetch())
			{
				?>
				<p>
				<strong>Nom:</strong> <?php echo $donnees2['nom']; ?>  <strong>Prenom:</strong> <?php echo $donnees2['prenom']; ?> <br />
				<strong>Ville:</strong> <?php echo $donnees2['ville']; ?> <br />
				<strong>Detail:</strong> <?php echo $donnees2['detail']; ?> 
				</p>
				<?php
			}
			$reponse->closeCursor(); // Termine le traitement de la requête
		}
		else echo "veuillez entrer une recherche";
	}
	?>
	
	</br>
	</div>
 <?php include("footer.php"); ?>
</body>
</html>