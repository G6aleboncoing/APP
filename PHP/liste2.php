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
</br></br></br>
</br></br></br></br>


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
					<li><a href="#">><?php echo $donnees['genre'];?></a>
						<ul>									
							<?php
							$genre=$donnees['genre'];
							$listevariete = $bdd->query("SELECT DISTINCT variete FROM `listes` where genre='$genre' ORDER BY variete ASC ");
							while ($donnees = $listevariete->fetch())
							{
								?>
								<li ><?php echo $donnees['variete'];?></li>
								<?php
							}
						?>
					</ul></li><?php
				}
				?>
			</ul>
		</li><?php
	}
	?>

</ul>
</div>
</div>


<?php include("footer.php"); ?> 

</body>
</html>
