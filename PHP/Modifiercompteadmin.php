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

if(	true ) 
	
	{
		//vérifier si les champs sont remplis et si le formulaire a été envoyé
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
		isset($_POST['detail'])!=''&&
		isset($_POST['admin'])!=''  )
		{
			if(!empty($_POST['civilite']) 
			&& !empty($_POST['prenom'])
			&& !empty($_POST['nom']) 
			&& !empty($_POST['pays'])
			&& !empty($_POST['region'])
			&& !empty($_POST['code_postal'])
			&& !empty($_POST['ville'])
			&& !empty($_POST['mdp'])
			&& !empty($_POST['admin']))
			{
				//Alors on enleve lechappement 

		
				$adresse_mail=$donnees['adresse_mail'];
				
				$_POST['prenom'] = stripslashes(trim($_POST['prenom']));
				$_POST['nom'] = stripslashes(trim($_POST['nom']));
				$_POST['adresse'] = stripslashes(trim($_POST['adresse']));
				$_POST['code_postal'] = stripslashes(trim($_POST['code_postal']));
				$_POST['ville'] = stripslashes(trim($_POST['ville']));
				$_POST['numero_de_tel'] = stripslashes(trim($_POST['numero_de_tel']));
				$_POST['mdp'] = stripslashes(trim($_POST['mdp']));
				$_POST['admin'] = stripslashes(trim($_POST['admin']));
	
				//vérifier format l'adresse mail ici
				if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['adresse_mail']))
				{
		
					
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
						$id_membre= $donnees['ID_membre'];
						$admin = $_POST['admin'];
			
						//préparer connexion bdd
						
						$update = $bdd->prepare("UPDATE `membres2` SET  

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
									':admin' => $_POST['admin'],
									':id_membre'=> $id_membre
									));
				
					
					}
	
				}
			} else 
			{
		
				echo'Veuillez remplir tout les champs';
			}
		} else 
		{	
		}
	}
	
if(	$_SESSION['admin']=='1' ) 
	{ 
	
		$idmembre=$_GET['idmembre'];
		$reponse = $bdd->query("SELECT * FROM membres2 WHERE id_membre = $idmembre ");

		// On affiche chaque entrée une à une
		while ($donnees = $reponse->fetch())
		{
			
?>
			
			<div class="content">
			<form method="post" action="Modifiercompteadmin.php?idmembre=<?php echo $idmembre;?>">
		
			<div class="box">
				<h2>Vos Coordonnées</h2>
				<div class="box_ribbon">
				</div>
			</div>

			<ul>
				<li><label class="obligatoire" for="civilite">Civilité <span>*</span>:&nbsp;</label>
					<select name="civilite" id="civilite">
						<option value="">Civilité</option>
						<option value="Monsieur"<?php if("Monsieur"==$donnees['civilite']){echo'" selected="selected"';} ?>>M</option>
						<option value="Madame"<?php if("Madame"==$donnees['civilite']){echo '" selected="selected"';} ?>>Mme</option>
						<option value="Mademoiselle"<?php if("Mademoiselle"==$donnees['civilite']){echo'" selected="selected"';} ?>>Mlle</option>
					</select>
				</li>

				<li><label class="obligatoire" for="prenom">Prénom <span>*</span>:&nbsp;</label>
					<input type="text" name="prenom" id="prenom" value="<?php echo $donnees['prenom']; ?> ">
				</li>
				
				<li><label class="obligatoire" for="nom">Nom <span>*</span>:&nbsp;</label>
					<input type="text" name="nom" id="nom" value="<?php echo $donnees['nom']; ?> ">
				</li>
				
				<li><label class="obligatoire">Pays <span>*</span>:&nbsp;</label>
				<select name="pays" id="pays">
					<option value="">Pays</option>
					<option value="France" <?php if("France"==$donnees['pays']){echo'" selected="selected"';} ?>>France</option>
					<option value="Espagne"<?php if("Espagne"==$donnees['pays']){echo'" selected="selected"';} ?>>Espagne</option>
					<option value="Royaume-Unis"<?php if("Royaume-Unis"==$donnees['pays']){echo'" selected="selected"';} ?>>Royaume-Uni</option>
				</select>
				</li>
			
				<li><label class="obligatoire" for="region">Région <span>*</span>:&nbsp;</label>
				<select name="region" id="region" >
					<option value="">Région</option>
					<?php 
					$reponse3 = $bdd->query("SELECT DISTINCT nom_region FROM `region` ORDER BY id_region ASC ");
					while ($donnees3 = $reponse3->fetch())
					{ 
						?>
						<option value="<?php echo $donnees3['nom_region'];?><?php if($donnees3['nom_region']==$donnees['region']){echo'" selected="selected"';} ?>"> <?php echo $donnees3['nom_region'];?></option>	
						<?php
					}
					?>
				</select>
				</li>
				
				<li><label class="obligatoire" for="adresse">Adresse <span> </span>:&nbsp;</label>
					<input type="text" name="adresse" id="adresse" value="<?php echo $donnees['adresse']; ?> ">
				</li>
				
				<li><label class="obligatoire" for="code_postal">Code Postal <span>*</span>:&nbsp;</label>
					<input type="int" name="code_postal" id="code_postal" value="<?php echo $donnees['code_postal']; ?> ">
				</li>
				
				<li><label class="obligatoire" for="ville">Ville <span>*</span>:&nbsp;</label>
					<input type="text" name="ville" id="ville" value="<?php echo $donnees['ville']; ?> ">
				</li>
				
				<li><label class="obligatoire" for="numero_de_tel">Telephone <span> </span>:&nbsp;</label>
					<input type="tel" name="numero_de_tel" id="numero_de_tel" value="<?php echo $donnees['numero_de_tel']; ?> ">
				</li>

				<li><label class="obligatoire" for="detail">Detail <span> </span>:&nbsp;</label>
					<input type="text" name="detail" id="detail" value="<?php echo $donnees['detail']; ?> ">
				</li>
				
				<li>
					<hr>
				</li>
				
				<li>
					<hr>
				</li>
				
					<?php 
					$reponse2 = $bdd->query("SELECT DISTINCT admin FROM `membres2` WHERE id_membre='$idmembre'  ");
					while ($donnees2 = $reponse2->fetch())
					{
					?>
						<li><label for="admin">niveau de priorité </label>
							<input type="int" name="admin" id="admin" value='<?php echo $donnees2['admin'] ?>'/><br />
						</li>
					<?php
					}
					?>
				
			</ul>

	

			<input type="submit" name="envoi" value="Modifier"/>

			</form>
	
			</div>
<?php
			}
	} else
	{
		echo'vous êtes déjà inscrit(e)';
	}
?>
</div>
 <?php include("footer.php"); ?>

</body>
</html>