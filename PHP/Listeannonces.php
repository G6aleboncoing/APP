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
	limiter un nombreparpage d'annonce par page ?
	inclure la recherche quelque part ?-->
<body>

	<?php include("header.php"); ?>
<div id="body_main">
</br>
	<?php 
	
	//récupération de $limite

    if(isset($_GET['limite'])) 
	{
		 $limite=$_GET['limite'];
	}
	else {
		$limite=0;
	}

	include("fonctions.php");

	$totale = $bdd->query('SELECT COUNT(*) AS NBNews FROM annonces ');
	$total = $totale->fetch();
	$total2 = $total[0];
	$totale->CloseCursor();
	$nombre=3;
	$page="Listeannonce.php";
	// On récupère tout le contenu de la table annonces

	$reponse = $bdd->query('SELECT * FROM annonces ORDER BY data ASC limit '.$limite.' , '.$nombre.';');

	// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
	{
?>		
		<div class="left_section" id="annonce-section">
			<table border = «2px»>
				<tr>
					<th>
						<ul>
							<form name="my_form" action="#result" method="post">
								<p> 
									<label for="nom">Titre:</label> 
									<?php echo $donnees['titre']; ?>
								</p>
								<p> 
									<label for="typ">Type:</label> 
									<?php echo $donnees['typ']; ?>
								</p>
								<p> 
									<label for="sujet">Genre:</label> 
									<?php echo $donnees['genre']; ?>
								</p>
								<p> 
									<label for="variété">Variété:</label> 
									<?php echo $donnees['variete']; ?> 
								</p>
							</form>
						</ul>
					</th>
		
					<td>
						<label for="description">
							<strong>
							<div style="margin: 1px;">Description:</div>
							</strong>
						</label>
						<?php echo $donnees['description']; ?>
					<td>
						<p> 
						<label for="prix">
							<strong>Prix:</strong>
						</label>  
						<?php echo $donnees['prix']; ?>€/Kg</br>
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
					<th colspan="3">
					<marquee behavior="scroll" direction="left">
					<!--Rajouter les photos de l'annonnces après -->
					<img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTI6jJmZlXkUUP9KAjaglzNcBhCpuj9oCgpA_XWcIcLglMQ-7MUCg" alt="ajouter photo">
					</marquee>
					</th>
				</tr>
			</table>
		</div>
		</br>

		<?php
	}

$reponse->closeCursor(); // Termine le traitement de la requête


$limiteSuivante = $limite + $nombre;
$limitePrecedente = $limite - $nombre;
if($limitePrecedente >= 0) {
	?>
	<a href="Listeannonces.php?limite=<?php echo $limitePrecedente;?>">Page Précédente</a> </br>
	<?php
}
if($limiteSuivante < $total2) {
	?>
	<a href="Listeannonces.php?limite=<?php echo $limiteSuivante;?>">Page Suivante</a>
	<?php

}


?>
</div>
 <?php include("footer.php"); ?>

</body>
</html>