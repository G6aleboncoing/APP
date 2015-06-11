<?php
include('configuration.php');
?>
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
 
<?php
$i=0;
if(	isset($_SESSION['ID_membre'])!='' ) 
	{//vérifier si les variables sont définis, et remplis 
		if(	
		isset($_POST['civilite'])!=''&&
		isset($_POST['prenom'])!='' && 
		isset($_POST['nom'])!='' && 
		isset($_POST['pays'])!='' && 
		isset($_POST['region'])!='' && 
		isset($_POST['adresse'])!='' && 
		isset($_POST['code_postal'])!='' && 
		isset($_POST['ville'])!='' && 
		isset($_POST['numero_de_tel'])!='' && 
		isset($_POST['mdp'])!='' && 
		isset($_POST['detail'])!='')
		{
		
			if(!empty($_POST['civilite']) 
			&& !empty($_POST['prenom'])
			&& !empty($_POST['nom']) 
			&& !empty($_POST['pays'])
			&& !empty($_POST['region'])
			&& !empty($_POST['code_postal'])
			&& !empty($_POST['ville'])
			&& !empty($_POST['mdp']))
			
			{
				//verifier le checkbox
				
				
				
				$adresse_mail=$_SESSION['adresse_mail'];
				
				$_POST['prenom'] = stripslashes(trim($_POST['prenom']));
				$_POST['nom'] = stripslashes(trim($_POST['nom']));
				$_POST['adresse'] = stripslashes(trim($_POST['adresse']));
				$_POST['code_postal'] = stripslashes(trim($_POST['code_postal']));
				$_POST['ville'] = stripslashes(trim($_POST['ville']));
				$_POST['numero_de_tel'] = stripslashes(trim($_POST['numero_de_tel']));
				$_POST['mdp'] = stripslashes(trim($_POST['mdp']));
	
				
				
					//vérifier unicité de l'adresse ici
					if(true)
					{
						
						// Alors on echappe les variables pour pouvoir les mettre en requete sql
						$id_membre = '';
						$civilite = $_POST['civilite'];//array
						$prenom = $_POST['prenom'];
						$nom = $_POST['nom'];
						$pays = $_POST['pays'];//array
						$region = $_POST['region'];//array
						$adresse = $_POST['adresse'];//array
						$code_postal = $_POST['code_postal'];//array
						$ville = $_POST['ville'];
						$numero_de_tel = $_POST['numero_de_tel'];
						$mdp= sha1($_POST['mdp']);
						$detail = $_POST['detail'];
						$id_membre= $_SESSION['ID_membre'];
						//préparer connexion bdd
						$update = $bdd->prepare("UPDATE `membres2` 
							SET 
							`civilite`=:civilite, 
							`prenom`=:prenom,
							`nom`=:nom,
							`pays`=:pays,
							`region`=:region,
							`adresse`=:adresse,
							`code_postal`=:code_postal,
							`ville`=:ville,
							`numero_de_tel`=:numero_de_tel,
							`mdp`=:mdp,
							`detail`=:detail
							WHERE `id_membre`=:id_membre");
 						
 						
								$update->execute(array(
									':civilite'=> $_POST['civilite'],
									':prenom'=> $_POST['prenom'],
									':nom'=> $_POST['nom'],
									':pays'=> $_POST['pays'],
									':region'=> $_POST['region'],
									':adresse'=> $_POST['adresse'],
									':code_postal'=> $_POST['code_postal'],
									':ville'=> $_POST['ville'],
									':numero_de_tel'=> $_POST['numero_de_tel'],
									':mdp'=> $mdp,
									':detail'=> $_POST['detail'],
									':id_membre'=> $id_membre
									));

									
									unset($_SESSION['civilite']);
									unset($_SESSION['adresse_mail']);
									unset($_SESSION['mdp']);
									unset($_SESSION['ID_membre']);
									unset($_SESSION['nom']);
									unset($_SESSION['prenom']);
									unset($_SESSION['pays']);
									unset($_SESSION['region']);
									unset($_SESSION['admin']);
									unset($_SESSION['adresse']);
									unset($_SESSION['code_postal']);
									unset($_SESSION['numero_de_tel']);
									unset($_SESSION['ville']);
									unset($_SESSION['detail']);
									session_unset();
									
									session_destroy();

									echo"</br> reconnectez vous pour actualisez vos donnees";
									$i++;
									
				
				}else
				{
					//si adresse pas bonne
					echo 'Veuillez entrer une adresse électronique valide';

				} 	
			} else 
			{
		
				echo'Veuillez remplir tout les champs';
			}
		} else 
		{	
		}
	}
	
if(	isset($_SESSION['adresse_mail'])!='' ) 
	{ 
?>		
		</br>
		
		<div class="content">

		<form method="post" action="Modifiercompte.php">

			<div class="box">
				<h2>Vos Coordonnées</h2>
				<div class="box_ribbon">
				</div>
			</div>

			<ul>
				<li><label class="obligatoire" for="civilite">Civilité <span>*</span>:&nbsp;</label>
					<select name="civilite" id="civilite">
						<option value="">Civilité</option>
						<option value="Monsieur"<?php if("Monsieur"==$_SESSION['civilite']){echo'" selected="selected"';} ?>>M</option>
						<option value="Madame"<?php if("Madame"==$_SESSION['civilite']){echo '" selected="selected"';} ?>>Mme</option>
						<option value="Mademoiselle"<?php if("Mademoiselle"==$_SESSION['civilite']){echo'" selected="selected"';} ?>>Mlle</option>
					</select>
				</li>

				<li><label class="obligatoire" for="prenom">Prénom <span>*</span>:&nbsp;</label>
					<input type="text" name="prenom" id="prenom" value="<?php echo $_SESSION['prenom']; ?> ">
				</li>
				
				<li><label class="obligatoire" for="nom">Nom <span>*</span>:&nbsp;</label>
					<input type="text" name="nom" id="nom" value="<?php echo $_SESSION['nom']; ?> ">
				</li>
				
				<li><label class="obligatoire">Pays <span>*</span>:&nbsp;</label>
				<select name="pays" id="pays">
					<option value="">Pays</option>
					<option value="France" <?php if("France"==$_SESSION['pays']){echo'" selected="selected"';} ?>>France</option>
					<option value="Espagne"<?php if("Espagne"==$_SESSION['pays']){echo'" selected="selected"';} ?>>Espagne</option>
					<option value="Royaume-Unis"<?php if("Royaume-Unis"==$_SESSION['pays']){echo'" selected="selected"';} ?>>Royaume-Uni</option>
				</select>
				</li>
			
				<li><label class="obligatoire" for="region">Région <span>*</span>:&nbsp;</label>
				<select name="region" id="region" >
					<option value="">Région</option>
					<?php 
					$reponse = $bdd->query("SELECT DISTINCT nom_region FROM `region` ORDER BY id_region ASC ");
					while ($donnees = $reponse->fetch())
					{ 
						?>
						<option value="<?php echo $donnees['nom_region'];?><?php if($donnees['nom_region']==$_SESSION['region']){echo'" selected="selected"';} ?>"> <?php echo $donnees['nom_region'];?></option>	
						<?php
					}
					?>
				</select>
				</li>
				
				<li><label class="obligatoire" for="adresse">Adresse <span> </span>:&nbsp;</label>
					<input type="text" name="adresse" id="adresse" value="<?php echo $_SESSION['adresse']; ?> ">
				</li>
				
				<li><label class="obligatoire" for="code_postal">Code Postal <span>*</span>:&nbsp;</label>
					<input type="int" name="code_postal" id="code_postal" value="<?php echo $_SESSION['code_postal']; ?> ">
				</li>
				
				<li><label class="obligatoire" for="ville">Ville <span>*</span>:&nbsp;</label>
					<input type="text" name="ville" id="ville" value="<?php echo $_SESSION['ville']; ?> ">
				</li>
				
				<li><label class="obligatoire" for="numero_de_tel">Telephone <span> </span>:&nbsp;</label>
					<input type="tel" name="numero_de_tel" id="numero_de_tel" value="<?php echo $_SESSION['numero_de_tel']; ?> ">
				</li>

				<li><label class="obligatoire" for="detail">Detail <span> </span>:&nbsp;</label>
					<input type="text" name="detail" id="detail" value="<?php echo $_SESSION['detail']; ?> ">
				</li>
				
				<li>
					<hr>
				</li>
				
				<li>
					<hr>
				</li>
			</ul>

			<div class="box">
				<h2> Mot de passe </h2>
				<div class="box_ribbon">
				</div>
			</div>

			<ul>
				<li><label  for="mdp">Confirmation Mot de passe :&nbsp;<span>*</span></label>
					<input type="password" name="mdp" id="mdp">
				</li>
				
				<li>
					<hr>
				</li>
				
				<li>
					<hr>
				</li>
				
				<li><label>&nbsp;</label>
					<input type="checkbox" name="check_condition_g" id="check_condition_g">J'accepte les conditions générales d'utilisation
				</li>
				
				
				
				<li>
					(<span>*</span>)Champs obligatoires
				</li>
				
				
				<li><label>&nbsp;</label>
					<input type="submit" value="Valider">
				</li>
			</ul>
		</form>

	
		</div>
		
<?php
	} else
	{
		if ($i=='0')echo'vous devez être inscrit(e)';
	}
?>
</div>
 <?php include("footer.php"); ?>

</body>
</html>