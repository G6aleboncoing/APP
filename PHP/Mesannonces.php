<?php
include('configuration.php');?>
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

<body>

 <?php include("header.php"); ?>

<div id="body_main">
 
 <?php
if(isset($_SESSION['adresse_mail'])!='')// déjà , es ce que l'on est connecté
	{
		$i=1;
		$submit=$_SESSION['ID_membre'];//ensuite, on va chercher les annonces correspondant à cette personne
		$reponse = $bdd->query("SELECT * FROM annonces WHERE id_membre = '$submit' ");

		// On affiche chaque entrée une à une
		while ($donnees = $reponse->fetch())
			{
		?>

<div id="center_section">


<div id="annonce_section">
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
		</br><a href="modifierannonce.php?idannonce=<?php echo $idannonce;?>" id="modifannonce">Modifier annonce n°<?php echo $i?></a>
</div></div>
		<?php
				
				
			}
			$reponse->closeCursor(); // Termine le traitement de la requête
	}
	?>
</div>
 <?php include("footer.php"); ?>

</body>
</html>