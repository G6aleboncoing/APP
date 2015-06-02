<?php (include"configuration.php"); ?>
<!DOCTYPE html>
<html>
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

<?php
if (isset($_SESSION['email'])!='')
	{
?>

<?php $_SESSION['h']=0; //Peur que la variable h se réinitialise à chaque envoi de formulaire?>
<div id="body_main">

<!--inserer la vérification formulaire ici-->


		<script type="text/javascript">
		function actionAvecUnVraiNom() {
			
			if ($_SESSION['h']='1')
			{
			
			} else if ($_SESSION['h']='2') 
			{
				
			} else if ($_SESSION['h']='3')
			{
				
			} else {
				alert('coucou');
			}
		}
		</script>

		<?php
		//verification blabla
		$reponse = $bdd->query("SELECT typ FROM Listes ");
		$array= array();
		
		while ($donnees = $reponse->fetch())
		{ 
			//rajouter a chaque fois les éléments a l'array (du cul)
			array_push($array,$donnees['typ']);
		}
		//enlever les doublons
		$result = array_unique($array);
		print_r($result);
		$rayducul= array();
		$rayy = array_merge($rayducul,$result);
		print_r($rayy);
		$i1 = count($rayy);
		echo $i1;
		$j1=0
		?>
		
		
<div id="formulaire_annonce">

<p>Veuillez renseignez les champs ci-dessous</p>

		<form method="post" action="creerannonce.php">
		<div class="box15">
			<h2>Catégories</h2>
			<div class="box15_ribbon">
			</div>
		</div>
		
		<ul>
		
		<p>	<label for="Typ">Type :</label>
		<li><select name="typ[]" onchange="actionAvecUnVraiNom()">
		<?php
		while($j1<$i1)
		{
			?>
		<option value="<?php echo $rayy[$j1];?>"> <?php echo $rayy[$j1];?></option>	
			<?php
			$j1++;
		}?>
			<option value="Null" selected="selected">Type</option>	
		</select></li></p>
		
		<input type="submit" name="envoi" value="Envoyer"/>
		<?php $_SESSION['h']++;?>
		</form>
		
		<!--récuperer la liste de genre adéquate ici, vérifier les ray les i et les j, ainsi que le javascript-->
		
		<form method="post" action="creerannonce.php">
		<p>	<label for="Genre">Genre :</label>
		<li><select name="genre[]"   onchange="actionAvecUnVraiNom()">
		<?php
		while($j2<$i2)
		{
			?>
		<option value="<?php echo $rayy[$j2];?>"> <?php echo $rayy[$j2];?></option>	
			<?php
			$j2++;
		}?>
			<option value="Null" selected="selected">Genre</option>	
		</select></li></p>
		
		<input type="submit" name="envoi" value="Envoyer"/>
		<?php $_SESSION['h']++;?>
		</p>
		
		</form>
		
		<!--récuperer la liste de Variete adéquate ici, vérifier les ray les i et les j, ainsi que le javascript-->
		
		<form method="post" action="creerannonce.php">
		<p>	<label for="Variete">Variété :</label>
		<li><select name="variete[]"   onchange="actionAvecUnVraiNom()">
		<?php
		while($j3<$i3)
		{
			?>
		<option value="<?php echo $rayy[$j3];?>"> <?php echo $rayy[$j3];?></option>	
			<?php
			$j3++;
		}?>
			<option value="Null" selected="selected">Variété</option>	
		</select></li></p>
		
		<input type="submit" name="envoi" value="Envoyer"/>
		<?php $_SESSION['h']++;?>
		</p>
		
		</form>
		</ul>
		
		<!--localisation ? -->
		
		
		<div class="box15">
		<h2>Votre Annonce</h2>
		<div class="box15_ribbon"></div>
		</div>
		<ul>
		<label for="titre">Titre</label>
		<li><input type="text" name="titre" id="titre" value="" placeholder="Titre"/><br /></li>
		
		<label for="Description">Description</label>
		<li><textarea name="description" id="description" value=""/ placeholder="Description de votre annonce"></textarea><br /></li>

		<!-- s'occuper de la comparaison des prix (> = <)-->
		<label for="prix">Prix au kilos</label>
		<input type="int" name="prix" id="prix" value=""/><br />

		<input type="submit" name="envoi" value="Envoyer"/>

		</form>
		</u>
		</div>

<?php
	} else
	{
		echo '</br>vous devez être connecter pour poser une annonce </br>
		<a href="Inscription.php" id="password_forgotten">laissez vous guider ;)</a></br>';
	}
?>
</div>
<?php include("footer.php"); ?> 

</body>
</html>
