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
<?php
if(isset($_GET['typ'])!=''&&
isset($_GET['genre'])!='') 
	{
		$typ=$_GET['typ'];
		$genre=$_GET['genre'];
		$reponse = $bdd->query("SELECT * FROM listes WHERE (typ='$typ') && (genre='$genre')&& (variete='')");
		$i=0;
		// On affiche chaque entrée une à une
		while ($donnees = $reponse->fetch()&& $i<1)
		{$i++;
			?>
			</br><!--type, genre, variete, photo, description, origine, cuisine--><!--afficher des annonces liées ? -->
			<div class="left_section" id="produit-section">
				<a href="Liste.php">Retourner voir la liste</a>
				<table border = «2px»>
					<tr>
						<th>
							<ul>
								type : <?php echo $donnees['typ']; ?></br>
								genre : <?php echo $donnees['genre']; ?>
							</ul>
						</th>
						<td>
							<?php echo '<img src="../Images/',$donnees['Illustration'],'" class="imageGauche" alt="" />'; ?>
						</td>
					</tr>
					<?php if ($donnees['description']!='')
					{ 
						?>
						<tr>
							<th >
								<?php echo $donnees['description']; ?>
							</th>
						</tr>
						<tr>
						<?php
					}else 
					{ 
					}
					?>
					<th>
						Variété(s) qui existe(s) :
						<ul>
							<li>
								<?php
								$listevariete = $bdd->query("SELECT DISTINCT variete FROM `listes` where genre='$genre' ORDER BY variete ASC ");
								while ($donnees = $listevariete->fetch() )
								{
									if ($donnees['variete']!='')
									{ 
										?>  <?php echo $donnees['variete'];?><?php
									}
								}
								
							$listevariete->closeCursor(); 
								?>
							</li>
						</ul>
					</th>
				</tr>
			</table>
			<!--lien pour les administrateurs afin de supprimer -->
			<?php
			if(isset($_SESSION['admin']) && $_SESSION['admin']=='1' ) 
			{ 
				?>
				<a href="supprimergenre.php?genre=<?php echo $genre;?>">supprimer ce genre</a>
			<?php
			}
			?>
			</div>
			<?php
		} 
			$reponse->closeCursor(); 
	}else 
	{
	header ('Location: Accueil.php');
	}
	?>
</div>

 <?php include("footer.php"); ?>

</body>
</html>