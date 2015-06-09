<?php 
(include"configuration.php"); ?>
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
 
	<div id="slideshow">
		<ul>
			<li><a href="Accueil.php"> <img src="images/banniere.jpg" id="banniere" alt="Bannière de LeBonCoing.fr"  title="Accueil" ></a></li>
			<li><a href="Accueil.php"> <img src="images/banniere.jpg" id="banniere" alt="Bannière de LeBonCoing.fr"  title="Accueil" ></a></li>
			<li><a href="Accueil.php"> <img src="images/banniere.jpg" id="banniere" alt="Bannière de LeBonCoing.fr"  title="Accueil" ></a></li>
			<li><a href="Accueil.php"> <img src="images/banniere.jpg" id="banniere" alt="Bannière de LeBonCoing.fr"  title="Accueil" ></a></li>
		</ul>
	</div>

	<div id="categories_section" class="white_background">
	
	
<h4>Info Catégories</h4>
		<hr>
	<?php
	$listetyp = $bdd->query("SELECT DISTINCT typ FROM `listes` ORDER BY typ ASC ");
	while ($donnees = $listetyp->fetch())
	{ 
		?>
		<li>
			<a href="#"><?php echo $donnees['typ'];?></a>
			<ul>
				<?php
				$typ=$donnees['typ'];
				$listegenre = $bdd->query("SELECT DISTINCT genre FROM `listes` where typ='$typ' ORDER BY genre ASC ");
				while ($donnees = $listegenre->fetch())
				{?>
					<li><a href="genre.php?typ=<?php echo $typ;?>&&genre=<?php echo $donnees['genre']; ?>"><?php echo $donnees['genre'];?></a>
						<ul>
							<?php
							$genre=$donnees['genre'];
							$listevariete = $bdd->query("SELECT DISTINCT variete FROM `listes` where genre='$genre' ORDER BY variete ASC ");
							while ($donnees = $listevariete->fetch())
							{
								?>
								<li >
									<a href="Varietes.php?typ=<?php echo $typ;?>&&genre=<?php echo $genre; ?>&&variete=<?php echo $donnees['variete']; ?>"><?php echo $donnees['variete'];?>
									</a>
								</li>
								<?php
							}
						?>
						</ul>
					</li>
					<?php
				}//ajouter ici la possibiliter d'ajouter un genre
				?>
			</ul>
		</li><?php
	}
	if(isset($_SESSION['admin'])=='1'&& $_SESSION['admin']==1)
	{
		?>
		<li >Ajouter un genre/une variété : </a>
			<ul>
				 <!--modifier id-->
				<form method="POST" action="Liste.php">									
				<input type="text" name="typ" id="typ" value="" placeholder="Type"/></br>
				<input type="text" name="genre" id="genre" value="" placeholder="Genre"/> </br>
				<input type="text" name="variete" id="variete" value="" placeholder="Variete"/> </br>
				<input type="text" name="Description" id="Description" value="" placeholder="description"/> </br>
				<input type="text" name="Origine" id="Origine" value="" placeholder="Si variete défini, origine "/> </br>
				<input type="submit" value="Ajouter"/>
				</form>
			</ul>
		</li>
		<?php
	}
	?>
	</div>

	<div class="annonce_section" id="annonce_section" >
	

		
	<form method="post" action="recherche.php">
		<label for="query">Entrer votre recherche </label>
		<input type="search" name="submit" maxlength="50" size="30" placeholder="Rechercher">
		<input type="submit" value="Rechercher">
	</form>
	</br>
	
	<table id="table_annonce">
	<tr>
		<td>Date</td>
		<td rowspan="4"><a href="#"> <img src="#" alt="annonce" height="100" width="300" ></a></td>
		<td>Nom de l'annonce</td>
	</tr>
	
	<tr>
		<td rowspan="3"></td>
		<td>Catégories</td>
	</tr>

	<tr>
		<td>Localisation</td>
	</tr>

	<tr>
		<td>Prix</td>
	</tr>
	</table>

	</div>

	<hr>
</div>

<?php include("footer.php"); ?>

</body>
</html>
