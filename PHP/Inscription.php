<?php (include"configuration.php"); ?>
<!DOCTYPE html>
<html>
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


<div id="formulaire_annonce">

<div id="inscription_section">

	</br>
<?php
//Vérifier qu'il n'est pas connecté
if(	isset($_SESSION['ID_membre'])!='' ) 
	{
	echo "Vous êtes déjà connecter, pourquoi s'inscrire ? ;)";
	}else 
	{
		//vérifier si les variables sont définis, et remplis 
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
		isset($_POST['adresse_mail'])!='' && 
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
			&& !empty($_POST['adresse_mail'])
			&& !empty($_POST['mdp']))
			
			{
				//verifier le checkbox
				
				
				
				//au cas ou, on enlève les anti slash
				
				//civilite
				//pays
				//region
				
				$_POST['prenom'] = stripslashes(trim($_POST['prenom']));
				$_POST['nom'] = stripslashes(trim($_POST['nom']));
				$_POST['adresse'] = stripslashes(trim($_POST['adresse']));
				$_POST['code_postal'] = stripslashes(trim($_POST['code_postal']));
				$_POST['ville'] = stripslashes(trim($_POST['ville']));
				$_POST['numero_de_tel'] = stripslashes(trim($_POST['numero_de_tel']));				
				$_POST['adresse_mail'] = stripslashes(trim($_POST['adresse_mail']));
				$_POST['mdp'] = stripslashes(trim($_POST['mdp']));
	
				//vérifier format l'adresse mail ici
				if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['adresse_mail']))
				{
					
					$adresse_mail=$_POST['adresse_mail'];
					$req=$bdd->query("SELECT * FROM membres2 where adresse_mail = '$adresse_mail'"); 
					$data=$req->fetch(); 
		
					//vérifier unicité de l'adresse ici
					if($data['adresse_mail'] == "")
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
						$admin = 0;
						
						//préparer connexion bdd
						if($i = $bdd->prepare("
							INSERT INTO membres2 (id_membre,civilite, prenom, nom, pays, region, adresse, code_postal, ville, numero_de_tel,adresse_mail,mdp, detail,admin)
							VALUES (:id_membre,:civilite,:prenom ,:nom,:pays ,:region,:adresse ,:code_postal ,:ville ,:numero_de_tel ,:adresse_mail ,:mdp ,:detail ,:admin)")) 
						{
					
							//envoi base de données
							$i->bindParam(':id_membre', $id_membre);
							$i->bindParam(':civilite', $civilite);
							$i->bindParam(':prenom', $prenom);
							$i->bindParam(':nom', $nom);
							$i->bindParam(':pays', $pays);
							$i->bindParam(':region', $region);
							$i->bindParam(':adresse', $adresse);
							$i->bindParam(':code_postal', $code_postal);
							$i->bindParam(':ville', $ville);
							$i->bindParam(':numero_de_tel', $numero_de_tel);
							$i->bindParam(':adresse_mail', $adresse_mail);
							$i->bindParam(':mdp', $mdp);
							$i->bindParam(':detail', $detail);
							$i->bindParam(':admin', $admin);
							$i->execute();
							
							$req=$bdd->query("SELECT * FROM membres2 where adresse_mail = '$adresse_mail'"); 
							$data=$req->fetch(); 
							
								$_SESSION['adresse_mail']= $data['adresse_mail'];
								$_SESSION['mdp']= $data['mdp'];
								$_SESSION['ID_membre']= $data['id_membre'];
								$_SESSION['nom']= $data['nom'];
								$_SESSION['prenom']= $data['prenom'];
								$_SESSION['pays']= $data['pays'];
								$_SESSION['region']= $data['region'];
								$_SESSION['admin']= $data['admin'];
							$req->closeCursor(); 
						}
						$i->closeCursor(); 
					}else
					{	
						//si adresse déjà utilisé
						echo'Cette adresse est déjà utillisé';
					}

				}else
				{
					//si adresse pas bonne
					echo 'Veuillez entrer une adresse électronique valide';

				} 	
			} else 
			{
				//il a pas du tout remplir
				echo'Veuillez remplir tout les champs';
			}
		} 
	}
//Si il n'est pas connecté, et donc pas inscrit, alors on l'autorise :p
if(	isset($_SESSION['email'])=='' ) 
	{
?>		
		</br>
		
		<div class="content">
		
		<h1>Création de compte</h1>

		<form method="post" action="#" onSubmit="return verify(this.mdp, this.confirmation_mdp)">

			<div class="box">
				<h2>Vos Coordonnées</h2>
				<div class="box_ribbon">
				</div>
			</div>

			<ul>
				<li><label class="obligatoire" for="civilite">Civilité <span>*</span>:&nbsp;</label>
					<select name="civilite" id="civilite">
						<option value="">Civilité</option>
						<option value="Monsieur">M</option>
						<option value="Madame">Mme</option>
						<option value="Mademoiselle">Mlle</option>
					</select>
				</li>
				
				<li><label class="obligatoire" for="prenom">Prénom <span>*</span>:&nbsp;</label>
					<input type="text" name="prenom" id="prenom" placeholder="Prénom">
				</li>
				
				<li><label class="obligatoire" for="nom">Nom <span>*</span>:&nbsp;</label>
					<input type="text" name="nom" id="nom" placeholder="Nom">
				</li>
				
				<li><label class="obligatoire">Pays <span>*</span>:&nbsp;</label>
				<select name="pays" id="pays">
					<option value="">Pays</option>
					<option value="france">France</option>
					<option value="espagne">Espagne</option>
					<option value="royaume-uni">Royaume-Uni</option>
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
						<option value="<?php echo $donnees['nom_region'];?>"> <?php echo $donnees['nom_region'];?></option>	
						<?php
					}
					?>
				</select>
				</li>
				
				<li><label class="obligatoire" for="adresse">Adresse <span> </span>:&nbsp;</label>
					<input type="text" name="adresse" id="adresse" placeholder="Adresse">
				</li>
				
				<li><label class="obligatoire" for="code_postal">Code Postal <span>*</span>:&nbsp;</label>
					<input type="int" name="code_postal" id="code_postal" placeholder="Code Postal">
				</li>
				
				<li><label class="obligatoire" for="ville">Ville <span>*</span>:&nbsp;</label>
					<input type="text" name="ville" id="ville" placeholder="Ville">
				</li>
				
				<li><label class="obligatoire" for="numero_de_tel">Telephone <span> </span>:&nbsp;</label>
					<input type="tel" name="numero_de_tel" id="numero_de_tel" placeholder="ex:066858XXXX">
				</li>

				<li><label class="obligatoire" for="detail">Detail <span> </span>:&nbsp;</label>
					<input type="text" name="detail" id="detail" placeholder="detail">
				</li>
				
					<hr>
					<hr>
			</ul>

			<div class="box">
				<h2>Votre Adresse Email</h2>
				<div class="box_ribbon">
				</div>
			</div>

			<ul>
				<li><label for="adresse_mail">Email :&nbsp;<span>*</span></label>
					<input type="email" name="adresse_mail" id="adresse_mail" placeholder="ex:test@isep.fr">
				</li>
				
					<hr>
					<hr>
			</ul>

			<div class="box">
				<h2>Votre Mot de Passe</h2>
				<div class="box_ribbon">
				</div>
			</div>

			<ul>
				<li><label  for="mdp">Mot de mdp <span>*</span>:&nbsp;</label>
					<input type="password" name="mdp" id="mdp">
				</li>
				
				<li><label  for="confirmation_mdp">Confirmez le mot de mdp :&nbsp;</label>
					<input type="password" name="confirmation_mdp" id="confirmation_mdp">
				</li>
				<li><label>&nbsp;</label>
					<div class="" id="passwordStrength">&nbsp;</div></li>

					<hr>
					<hr>
				
				<li>
					(<span>*</span>)Champs obligatoires
				</li>
				
				<li><label>&nbsp;</label>
					<input type="checkbox" name="check_condition_g" id="check_condition_g">J'accepte les conditions générales d'utilisation
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
		echo'vous êtes déjà inscrit(e)';
	}
?>
</div>

</div>

</div>

<?php include("footer.php"); ?> 

</body>
</html>