<?php (include"configuration.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" media="screen" type="text/css" href="../CSS/main.css" />
<link rel="icon" type="image/png" href="images/coing.png" />
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="../JavaScript/main.js"></script>
<script src="../JavaScript/jquery.js"></script>

<title>LeBonCoing</title>

</head>

<body>

<?php include("header.php"); ?> 

<div id="body_main">
<?php
	if(isset($_POST['typ'])!=''&&
	isset($_POST['genre'])!=''&&
	isset($_POST['variete'])!='')
		{
			if(!empty($_POST['typ'])&&
			!empty($_POST['genre']))
			{
				if(!empty($_POST['variete'])) 
				{
					
					$typ= $_POST['typ'];
					$genre= $_POST['genre'];
					$variete= $_POST['variete'];
					$Description= $_POST['Description'];
					$Origine= $_POST['Origine'];
				
				
					//préparer connexion bdd
					if($i = $bdd->prepare("
					INSERT INTO Listes (typ,genre,variete,Description,Origine)
					VALUES (:typ,:genre,:variete,:Description,:Origine)")
					) 
					{	
						//envoi base de données
						$i->bindParam(':typ', $typ);
						$i->bindParam(':genre', $genre);
						$i->bindParam(':variete', $variete);
						$i->bindParam(':Description', $Description);
						$i->bindParam(':Origine', $Origine);
						$i->execute();
					}
				} else
				{
					$typ= $_POST['typ'];
					$genre= $_POST['genre'];
					$variete='';
					$Description=$_POST['Description'];
										
					//préparer connexion bdd
					if($i = $bdd->prepare("
					INSERT INTO Listes (typ,genre,variete,Description)
					VALUES (:typ,:genre,:variete,:Description)")
					) 
					{	
						//envoi base de données
						$i->bindParam(':typ', $typ);
						$i->bindParam(':genre', $genre);
						$i->bindParam(':variete', $variete);
						$i->bindParam(':Description', $Description);
						$i->execute();
					}
				}
			}
		}
	
?>
<div id="menu">
<ul>
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
			</ul>
		</li>
		<?php
	}
	?>
		</ul>
</div>
</div>


<?php include("footer.php"); ?> 

</body>
</html>
