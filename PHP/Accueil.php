<?php 
(include"configuration.php"); ?>
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
 
	<div id="slideshow">
		<ul>
			<li><a href="Accueil.php"> <img src="images/banniere_1.jpg" id="banniere" alt="Bannière de LeBonCoing.fr"  title="Accueil" ></a></li>
			<li><a href="Accueil.php"> <img src="images/banniere_2.jpg" id="banniere" alt="Bannière de LeBonCoing.fr"  title="Accueil" ></a></li>
			<li><a href="Accueil.php"> <img src="images/banniere_3.jpg" id="banniere" alt="Bannière de LeBonCoing.fr"  title="Accueil" ></a></li>
		</ul>
	</div>
	
<div id="recherche_section">
	
		<form method="post" action="recherche.php">


				<ul>
						
						<li><input class="recherche_li" type="search" name="titre" id="titre" value="" placeholder="Titre"/></li>
						<li><select name="typ[]" class="recherche_li" id="type" onchange="go()"><option value="">--Type--</option>
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

		<li>	
				<select name="genre[]" class="recherche_li" id="genre">
				<option value="" >--Catégories--</option>
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
				

		<li>
				<ul><li><select name='variete' class="recherche_li" id="variete">
					<option value=''>--Variétés--</option>
				</select></li>
				<li><input type="submit" id="adv_search_submit" name="envoie" class="recherche_li" value="Envoyer"/></li>
				</ul>


		</li>
		
		</ul>
		
		</form>

</div>

<div id="center_section">

<div id="categories_section" class="white_background">
	
	
<h3>Info Catégories</h3>
	<?php
	$listetyp = $bdd->query("SELECT DISTINCT typ FROM `listes` ORDER BY typ ASC ");
	while ($donnees = $listetyp->fetch())
	{ 
		?>
		<li>
			<h4><?php echo $donnees['typ'];?></h4>
			<ul>
				<?php
				$typ=$donnees['typ'];
				$listegenre = $bdd->query("SELECT DISTINCT genre FROM `listes` where typ='$typ' ORDER BY genre ASC ");
				while ($donnees = $listegenre->fetch())
				{?>
					<li><h4><a href="genre.php?typ=<?php echo $typ;?>&&genre=<?php echo $donnees['genre']; ?>"><?php echo $donnees['genre'];?></a></h4>
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
		<li ><h4>Ajouter un genre/une variété : </a></h4>
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
	
<ul class="white_background">
	<li><p>9 juin</p>
	<p>5:44</p></li>
	<li><a href="#"> <img src="images/kiwi.jpg" alt="photo de l'annonce" height="120" width="120" ></a></li>
	<li><p class="title">Titre de l'annonce: <span>Kiwiiiiiii c'est la vie</span></p>
	<p>Variété: <span>Kiwi</span></p>
	<p>Localisation: <span>Paris</span></p>
	<p>Type: <span>Vente</span></p>
	<p class="price">Prix: <span>5</span> €/kg</p>
	</li>
</ul>

<ul class="white_background">
	<li><p>9 juin</p>
	<p>5:44</p></li>
	<li><a href="#"> <img src="images/kiwi.jpg" alt="photo de l'annonce" height="120" width="120" ></a></li>
	<li><p class="title">Titre de l'annonce: <span>Kiwiiiiiii c'est la vie</span></p>
	<p>Variété: <span>Kiwi</span></p>
	<p>Localisation: <span>Paris</span></p>
	<p>Type: <span>Vente</span></p>
	<p class="price">Prix: <span>5</span> €/kg</p>
	</li>
</ul>

	</div>

</div>

</div>

<?php include("footer.php"); ?>

</body>
</html>
