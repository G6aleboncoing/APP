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

<div id="center_section">


<div id="annonce_section">
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

	<ul class="white_background">
		<li>
			<p><?php echo $donnees['data']; ?></p>
		</li>
		<li><a href="#"> <img src="images/kiwi.jpg" alt="photo de l'annonce" height="120" width="120" ></a></li>
		<li><p class="title">Titre de l'annonce: <span><?php echo $donnees['titre']; ?></span></p>
		<p>Type: <span>		<?php echo $donnees['typ']; ?></span></p>
		<p>Genre: <span><?php echo $donnees['genre']; ?> </span></p>
		<p>Variété: <span><?php echo $donnees['variete']; ?> </span></p>
		<?php
		$idmembre=$donnees['id_membre'];
		$reponse2 = $bdd->query("SELECT * FROM membres2 WHERE id_membre='$idmembre'");
		
			while ($donnees2 = $reponse2->fetch())
			{
				?>

				<p>Localisation: <span><?php echo $donnees2['region']; ?></span></p>
				
				<a href="Message.php?forme=envoi&&emaildestinataire= <?php echo $donnees2['adresse_mail']; ?>" >Contacter le profil associé</a>
				<p><a href="profil.php?id=<?php echo $idmembre;?>" >Voir le profil associé</a></p>
				
				<?php
			}
			?>
		
		<p class="price">Prix: <span><?php echo $donnees['prix']; ?> </span> €/kg</p>
		</li><?php
						//ici c'est pour l'admin :p
						if(isset($_SESSION['admin'])=='1'&& $_SESSION['admin']==1)
						{
							$idannonce=$donnees['id_annonce'];
							?>
							<a href="Modifierannonceadmin.php?idannonce=<?php echo $idannonce;?>" id="modifinfoadmin">Modifier annonce</a>
							<?php
						}
						?>
	</ul>
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
</div>
</div>
 <?php include("footer.php"); ?>

</body>
</html>