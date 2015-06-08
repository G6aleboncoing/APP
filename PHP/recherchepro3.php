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


<div id="body_main">

<div id="formulaire_annonce">
<?php
?>
		<form method="post" action="recherchepro3.php">
		<div class="box15">
			<h2>Recherche avancée</h2>
			<div class="box15_ribbon"></div>
		</div>
				<ul>
		<label for="query">Titre d'annonces :</label>
		<li><input type="text" name="titre" id="titre" value="" placeholder="Titre"/><br /></li>
		
				<ul>
		<p>	<label for="Typ">Type :</label>
		<li>
			<select name="typ[]" id="type" onchange="go()">
			<option value="">--type--</option>
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
		</p>
		
				<label>genre : </label>
				<div id="genre">
				<select name="genre[]" id="genre">
				<option value="Null" selected="selected">--genre--</option>
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
				</div>
				
				</br>
				<label>Variete</label>
				<div id='variete' >
				<select name='variete' id="variete">
					<option value='-1'>Choisir un genre</option>
				</select>
				</div>

		
		</ul>
		</br>
				<!-- s'occuper de la comparaison des prix (> = <)-->
		<label for="prix">Prix</label>
		<select name='signe' id="signe">
			<option value='>' >></option>
			<option value='='>=</option>
			<option value='<'><</option>
		</select>
		<input type="int" name="prix" id="prix" value="0"/>
		<label> €/kilos</label></br>
		<input type="submit" name="envoie" value="Envoyer"/>

		<!--Localisation
		
		-->
		



		</form>
		</u>
		</div>
<?php
//on vérifie si on a entré un mot clés
if(isset($_POST)!='' && isset($_POST['titre'])!=''&& !empty($_POST['titre']))
	{	
	$titre = stripslashes(trim($_POST['titre']));
		// si il y a un mot clés on check si il y a un type"
	if(isset($_POST['typ'])!=''&& !empty($_POST['typ']))
		{
		$typ_Array = $_POST['typ'];
		$typ=  implode(",", $typ_Array);
		//si il y a un type on check si il y a un genre
		if(isset($_POST['genre'])!=''&& !empty($_POST['genre']))
			{
			$genre_Array = $_POST['genre'];
			$genre= stripslashes(trim($_POST['genre']));
			//$genre=implode(",", $genre);
				//si il y a un genre on check si il y a une variete
				if(isset($_POST['variete'])!=''&& !empty($_POST['variete']))
				//si la variete est définie, on lance uen recherche titre/type/genre/variete
				{ //recherche complète
					$variete= $_POST['variete'];
					//$variete=implode(",", $variete_array);
					//$variete = stripslashes(trim($_POST['variete']));
					$reponse = $bdd->query("SELECT * FROM annonces WHERE titre LIKE '%$titre%' AND typ LIKE '%$typ%' AND genre LIKE '$genre' AND variete LIKE '$variete' ");
					echo "Annonce correspondante:" ;
					while ($donnees = $reponse->fetch())
					{ $idmembre=$donnees['id_membre'];
					$reponse2 = $bdd->query("SELECT * FROM membres WHERE id_membre='$idmembre'");
					while ($donnees2 = $reponse2->fetch())
						{
						?>
						<p>
						<strong>Annonce</strong> : <?php echo $donnees['titre']; ?><br />
						<strong>Le possesseur de cette annonce est :</strong> <?php echo $donnees2['nom'],' ',$donnees2['prenom']?> <br />
						<strong>Type:</strong> <?php echo $donnees['typ']; ?> <strong>Genre:</strong> <?php echo $donnees['genre']; ?> <strong>Variétés:</strong> <?php echo $donnees['variete']; ?> <br />
						<strong>Prix:</strong> <?php echo $donnees['prix']; ?> euros <br />
						<br />
						</p>
						<?php
						}
					}
					$reponse->closeCursor(); // Termine le traitement de la requête
				} 
				// recherche sans variete
				else { $reponse = $bdd->query("SELECT * FROM annonces WHERE titre LIKE '%$titre%' AND typ LIKE '%$typ%' AND genre LIKE '$genre' ");

				// On affiche chaque entrée une à une
				echo "Annonce correspondante:" ;
				while ($donnees = $reponse->fetch())
					{ $idmembre=$donnees['id_membre'];
					$reponse2 = $bdd->query("SELECT * FROM membres WHERE id_membre='$idmembre'");
					while ($donnees2 = $reponse2->fetch())
						{
						?>
						<p>
						<strong>Annonce</strong> : <?php echo $donnees['titre']; ?><br />
						<strong>Le possesseur de cette annonce est :</strong> <?php echo $donnees2['nom'],' ',$donnees2['prenom']?> <br />
						<strong>Type:</strong> <?php echo $donnees['typ']; ?> <strong>Genre:</strong> <?php echo $donnees['genre']; ?> <strong>Variétés:</strong> <?php echo $donnees['variete']; ?> <br />
						<strong>Prix:</strong> <?php echo $donnees['prix']; ?> euros <br />
						<br />
						</p>
						<?php
						}
					$reponse->closeCursor(); // Termine le traitement de la requête
					}
					
				}
			}
			//recherche sans genre
			else { $reponse = $bdd->query("SELECT * FROM annonces WHERE titre LIKE '%$titre%' AND typ LIKE '%$typ%'");
			// On affiche chaque entrée une à une
			echo "Annonce correspondante:" ;
			while ($donnees = $reponse->fetch())
				{ $idmembre=$donnees['id_membre'];
				$reponse2 = $bdd->query("SELECT * FROM membres WHERE id_membre='$idmembre'");
				while ($donnees2 = $reponse2->fetch())
					{
					?>
					<p>
					<strong>Annonce</strong> : <?php echo $donnees['titre']; ?><br />
					<strong>Le possesseur de cette annonce est :</strong> <?php echo $donnees2['nom'],' ',$donnees2['prenom']?> <br />
					<strong>Type:</strong> <?php echo $donnees['typ']; ?> <strong>Genre:</strong> <?php echo $donnees['genre']; ?> <strong>Variétés:</strong> <?php echo $donnees['variete']; ?> <br />
					<strong>Prix:</strong> <?php echo $donnees['prix']; ?> euros <br />
					<br />
					</p>
					<?php
					}					$reponse->closeCursor(); // Termine le traitement de la requête
				}
			}
		}
		//recherche simple
		else { echo "huehuehue";
		$reponse = $bdd->query("SELECT * FROM annonces WHERE titre LIKE '%$titre%' OR typ LIKE '%$titre%'OR genre LIKE '%$titre%' OR variete LIKE '%$titre%' ");
		  $reponse3 = $bdd->query("SELECT * FROM membres WHERE nom LIKE '%$titre%'OR prenom LIKE '%$titre%' OR ville LIKE '%$titre%' OR detail OR '%$titre%'");
			// On affiche chaque entrée une à une
			echo "Annonce correspondantelolol:" ;
			while ($donnees = $reponse->fetch())
			{ $idmembre=$donnees['id_membre'];
				$reponse2 = $bdd->query("SELECT * FROM membres WHERE id_membre='$idmembre'");
				while ($donnees2 = $reponse2->fetch())
				{
					?>
					<p>
					<strong>Annonce</strong> : <?php echo $donnees['titre']; ?><br />
					<strong>Le possesseur de cette annonce est :</strong> <?php echo $donnees2['nom'],' ',$donnees2['prenom']?> <br />
					<strong>Type:</strong> <?php echo $donnees['typ']; ?> <strong>Genre:</strong> <?php echo $donnees['genre']; ?> <strong>Variétés:</strong> <?php echo $donnees['variete']; ?> <br />
					<strong>Prix:</strong> <?php echo $donnees['prix']; ?> euros <br />
					<br />
					</p>
<?php			}
			}
			
			echo "<br> Membres:" ;
			while ($donnees3 = $reponse3->fetch())
			{
				?>
				<p>
				<strong>Nom:</strong> <?php echo $donnees3['nom']; ?>  <strong>Prenom:</strong> <?php echo $donnees3['prenom']; ?> <br />
				<strong>Ville:</strong> <?php echo $donnees3['ville']; ?> <br />
				<strong>Detail:</strong> <?php echo $donnees3['detail']; ?> 
				</p>
				<?php
			}
			$reponse->closeCursor(); // Termine le traitement de la requête
		}
	}
	//rien d'entrer! 
	else { echo "entrez une recherche!" ;
	}

	
	//prix stuff
	//isset($_POST['prix'])!=''&& 
	//isset($_POST['signe'])!='')
		//$prix = stripslashes(trim($_POST['prix']));
		//$signe = stripslashes(trim($_POST['signe']));
?>
</div>
 <?php include("footer.php"); ?>
</body>
</html>	