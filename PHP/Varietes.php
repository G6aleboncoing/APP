<?php (include"configuration.php"); ?>
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
		if (isset($_SESSION['admin'])=='1'&& $_SESSION['admin']==1)
		{
			if (isset($_POST['typ'])!=''&&
				isset($_POST['genre'])!=''&&
				isset($_POST['variete'])!=''&&
				isset($_POST['Description'])!=''&&
				isset($_POST['Origine'])!='')
			{
					
				$_POST['typ'] = stripslashes(trim($_POST['typ']));
				$_POST['genre'] = stripslashes(trim($_POST['genre']));
				$_POST['variete'] = stripslashes(trim($_POST['variete']));
				$_POST['Description'] = stripslashes(trim($_POST['Description']));
				$_POST['Origine'] = stripslashes(trim($_POST['Origine']));
				
				$typ=$_POST['typ'];
				$genre=$_POST['genre'] ;
				$variete=$_POST['variete'] ;
				$Description=$_POST['Description'] ;
				$Origine=$_POST['Origine'] ;
				
						$update = $bdd->prepare("UPDATE `Listes` SET  
							`typ`=:typ,
							`genre`=:genre,
							`variete`=:variete,
							`Description`=:Description,
							`Origine`=:Origine
							WHERE `variete`=:variete ");
							
								$update->execute(array(
                                    ':typ' => $typ,
                                    ':genre' => $genre,
                                    ':variete' => $variete,
                                    ':Description' => $Description,
									':Origine'=> $Origine,
									':variete'=>$_GET['variete']
									));
			}
		}
		$i="0";
		$typ=$_GET['typ'];
		$genre=stripslashes(trim($_GET['genre']));
		$variete=stripslashes(trim($_GET['variete']));
		$reponse = $bdd->query("SELECT DISTINCT * FROM listes WHERE (typ='$typ') && (genre='$genre') &&(variete='$variete')");

		// On affiche chaque entrée une à une
		while ($i<"1"&&$donnees = $reponse->fetch())
		{$i++;
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
								Description : <?php echo $donnees['description']; ?>
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
			</div><!--lien pour les administrateurs afin de supprimer -->

			<?php
					
				if(isset($_SESSION['admin']) && $_SESSION['admin']=='1' ) 
				{ 
					$typ= $donnees['typ'];
					$genre= $donnees['genre'];
					?>
					<li >Ajouter un genre/une variété : </a>
						<ul>
							<!--modifier id-->
							<form method="POST" action="Varietes.php?typ=<?php echo $typ;?>&&genre=<?php echo $genre; ?>&&variete=<?php echo $donnees['variete']; ?>">
								<input type="text" name="typ" id="typ" value="<?php echo $donnees['typ']; ?>" placeholder="Type"/></br>
								<input type="text" name="genre" id="genre" value="<?php echo $donnees['genre']; ?>" placeholder="Genre"/> </br>
								<input type="text" name="variete" id="variete" value="<?php echo $donnees['variete']; ?>" placeholder="Variete"/> </br>
								<input type="text" name="Description" id="Description" value="<?php echo $donnees['description']; ?>" placeholder="description"/> </br>
								<input type="text" name="Origine" id="Origine" value="<?php echo $donnees['description']; ?>" placeholder="Origine "/> </br>
								<input type="submit" value="Ajouter"/>
							</form>
						</ul>
					</li>
					<a href="supprimervariete.php?genre=<?php echo $genre;?>&&variete=<?php echo $variete;?>">supprimer cette variete</a>
					<?php
				}
		} ?><?php
	}else 
	{
	header ('Location: Accueil.php');
	}
?>


</div>

 <?php include("footer.php"); ?>

</body>
</html>