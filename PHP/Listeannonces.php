<?php (include"configuration.php"); ?>
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
<!--revoir l'affichage brouillon ?
	limiter un nombre d'annonce par page ?
	inclure la recherche quelque part ?-->
<body>

	<?php include("header.php"); ?>
<div id="body_main">
</br>
	<?php 
	// On récupère tout le contenu de la table annonces

	$reponse = $bdd->query('SELECT * FROM annonces');

	// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
	{
?>		
		<div class="left_section" id="annonce-section">
		<table>
		<table border = «2px»>
		<tr>
		<th>
		<ul>
		<form name="my_form" action="#result" method="post">
		<p> <label for="nom">Titre:</label> <input type="text" id="titre" value="<?php echo $donnees['titre']; ?>"> </p>
		<p> <label for="typ">Type:</label> <input type="typ" id="typ" value="<?php echo $donnees['typ']; ?>"> </p>
		<p> <label for="sujet">Genre:</label> <input type="text" id="genre" value="<?php echo $donnees['genre']; ?>"> </p>
		<p> <label for="variété">Variété:</label> <input type="text" id="variété" value="<?php echo $donnees['variete']; ?>"> </p>
		</form></li>
		</ul>
		</th>
		
		<td><label for="description"><strong><div style="margin: 1px;">Description:</div></strong></label><textarea id="description" name="<?php echo $donnees['description']; ?>"><?php echo $donnees['description']; ?></textarea>
		</td>
		<td>
		<p> <label for="prix"><strong>Prix:</strong></label>  <input type="prix" id="Prix"value="<?php echo $donnees['prix']; ?>">€/Kg</br>
		<?php
		//ici c'est pour l'admin :p
		if(isset($_SESSION['admin'])=='1'&& $_SESSION['admin']==1)
		{
			$idannonce=$donnees['id_annonce'];
			?>
			<a href="Modifierannonceadmin.php?idannonce=<?php echo $idannonce;?>" id="modifinfoadmin">Modifier annonce</a>
			<?php
		}
		?>
		</p>

		</td>
		</tr>
		<tr>
		<th colspan="3"><marquee behavior="scroll" direction="left">
		<!--Rajouter les photos de l'annonnces après -->
		<img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTI6jJmZlXkUUP9KAjaglzNcBhCpuj9oCgpA_XWcIcLglMQ-7MUCg" alt="ajouter photo">
		</marquee>
		</th>
		</tr>
		</table>
		</div>

		<?php
	}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
 </div>
 <?php include("footer.php"); ?>

</body>
</html>