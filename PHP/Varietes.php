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
isset($_GET['genre'])!=''&&
isset($_GET['variete'])!='') 
	{
		$typ=$_GET['typ'];
		$genre=stripslashes(trim($_GET['genre']));
		$variete=stripslashes(trim($_GET['variete']));
		$reponse = $bdd->query("SELECT * FROM listes WHERE (typ='$typ') && (genre='$genre') &&(variete='$variete')");

		// On affiche chaque entrée une à une
		while ($donnees = $reponse->fetch())
		{
?>
				<a href="Liste.php">Retourner voir la liste</a>
			</br><!--type, genre, variete, photo, description, origine, cuisine--><!--afficher des annonces liées ? -->
			<div class="left_section" id="produit-section">
				<table border = «2px»>
					<tr>
						<th>
							<ul>
								type : <?php echo $donnees['typ']; ?></br>
								genre : <?php echo $donnees['genre']; ?></br>
								Variété : <?php echo $donnees['variete']; ?>
							</ul>
						</th>
						<td>
							<?php echo '<img src="../Images/',$donnees['Illustration'],'" class="imageGauche" alt="" />'; ?>
						</td>
					</tr>
					<?php if ($donnees['description']=='')
					{ echo"<tr> <th> à remplir </th> </tr>";
						?>

<?php
					}else 
					{ ?>
				<tr>
							<th >
								<?php echo $donnees['description']; ?>
							</th>
						</tr>
						<?php
					}
?>
					<?php if ($donnees['Origine']!='') 
					{
						?>
						<tr>
							<th>
								Origine : <?php echo $donnees['Origine']; ?>
							</th>
						</tr>
<?php
					}else 
					{ echo"<tr> <th> Origine : à remplir </th> </tr>";
					}
				?>
				</table>
			</div>
			<?php
		} ?>
					<!--lien pour les administrateurs afin de supprimer -->
				<?php
				if(isset($_SESSION['admin']) && $_SESSION['admin']=='1' ) 
				{ 
					?>
					<a href="supprimervariete.php?genre=<?php echo $genre;?>&&variete=<?php echo $variete;?>">supprimer cette variete</a>
					<?php
				}
	}else 
	{
	header ('Location: Accueil.php');
	}
?>


</div>

 <?php include("footer.php"); ?>

</body>
</html>