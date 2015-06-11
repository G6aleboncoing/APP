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

	<!--on récupère dans les $_sessions les données de l'utilisateur à afficher dans son profil -->
	<!--ajouter l'image-->
	<?php 
	if (isset($_SESSION['adresse_mail'])!='')//on ne vérifie que pour le mail en partant du principe que si ce session est fait, les autres le sont aussi. Dans l'absolu on SAIT qu'il faudrait tout vérifier
	{
		$idmembre=$_GET['id'];
		
		$reponse2 = $bdd->query("SELECT * FROM membres2 WHERE id_membre='$idmembre'");
		
			while ($donnees2 = $reponse2->fetch())
			{
		echo'
<div id="compte_section">

<h1>Données personnelles</h1>


<div class="box">
<h2>Coordonnées</h2>
<div class="box_ribbon"></div>
</div>

<ul>
<li><label>Civilité:&nbsp;</label><p id="civilite">',$donnees2['civilite'],'</p></li>
<li><label>Prénom:&nbsp;</label><p id="prenom">',$donnees2['prenom'],'</li>
<li><label>Nom:&nbsp;</label><p id="nom">',	$donnees2['nom'],'</li>
<li><label>Pays:&nbsp;</label><p id="pays">',$donnees2['pays'],'</p></li>
<li><label>Région:&nbsp;</label><p id="Region">',$donnees2['region'],'</p></li>
<li><label>Adresse:&nbsp;</label><p id="adresse">',$donnees2['adresse'],'</p></li>
<li><label>Code Postal:&nbsp;</label><p id="code_postal">',$donnees2['code_postal'],'</p></li>
<li><label>Ville:&nbsp;</label><p id="ville">',$donnees2['ville'],'</p></li>
<li><label>Telephone:&nbsp;</label><p id="numero_de_tel">',$donnees2['numero_de_tel'],'</p></li>
<li><label>Detail :&nbsp;</label><p id="detail">',$donnees2['detail'],'</p></li> </br>

<li><hr></li>
<li><hr></li>
</ul>

<div class="box">
<h2>Mon Adresse Email</h2>
<div class="box_ribbon"></div>
</div>

<ul>
<li><label>Email:&nbsp;</label><p id="adresse_mail">',$donnees2['adresse_mail'],'</p></li>
<li><hr></li>
<li><hr></li>
</ul>


<div class="box">
<h2>Annonces liés</h2>
<div class="box_ribbon"></div>
</div>';

	$reponse = $bdd->query('SELECT * FROM annonces WHERE id_membre='.$idmembre.' ORDER BY data ASC ');

	// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
	{
		?>

<div id="center_section">


<div id="annonce_section">
	<ul class="white_background">
		<li>
			<p><?php echo $donnees['data']; ?></p>
		</li>
		<li><a href="#"> <img src="images/kiwi.jpg" alt="photo de l'annonce" height="120" width="120" ></a></li>
		<li><p class="title">Titre de l'annonce: <span><?php echo $donnees['titre']; ?></span></p>
		<p>Type: <span>		<?php echo $donnees['typ']; ?></span></p>
		<p>Genre: <span><?php echo $donnees['genre']; ?> </span></p>
		<p>Variété: <span><?php echo $donnees['variete']; ?> </span></p>
		<?php
		$idmembre=$donnees['id_membre'];
		$reponse2 = $bdd->query("SELECT * FROM membres2 WHERE id_membre='$idmembre'");
		
			while ($donnees2 = $reponse2->fetch())
			{
				?>

				<p>Localisation: <span><?php echo $donnees2['region']; ?></span></p>
				
				<?php
			}
			?>
		
		<p class="price">Prix: <span><?php echo $donnees['prix']; ?> </span> €/kg</p>
		</li><?php
						//ici c'est pour l'admin :p
						if(isset($_SESSION['admin'])=='1'&& $_SESSION['admin']==1)
						{
							$idannonce=$donnees['id_annonce'];
							?>
							<a href="Modifierannonceadmin.php?idannonce=<?php echo $idannonce;?>" id="modifinfoadmin">Modifier annonce</a>
							<?php
						}
						?>
	</ul>
		</br>
</div></div>
		<?php
	}

$reponse->closeCursor();

?>

<div class="box">
<h2>Commentaire</h2>
<div class="box_ribbon"></div>
</div>
<?php

		$reponse3 = $bdd->query("SELECT * FROM commentaire WHERE id_commente='$idmembre'");
		
			while ($donnees3 = $reponse3->fetch())
			{
				

							echo' titre : ',$donnees3['titre'];
							echo' date d\'envoi : ',$donnees3['data'];
							echo '</br>';
							$idexpediteur=$donnees3['id_commentateur'];
							$com = $bdd->query("SELECT * FROM membres2 WHERE id_membre='$idexpediteur'");
				
							while ($com1 = $com->fetch())
							{
								echo' Message de : ',$com1['adresse_mail']; 
								echo '</br>';
								echo 'Message : ',$donnees3['message'];
								$adressemail=$com1['adresse_mail'];
								echo '</br><a href="message.php?forme=envoi&&emaildestinataire=',$adressemail,'"> Répondre</a>';//ici c'est pour l'admin :p
								if(isset($_SESSION['admin'])=='1'&& $_SESSION['admin']==1)
								{
									$id=$donnees3['id'];
							
									?>
									<a href="Supprimermessage.php?idcom=<?php echo $id;?>" id="modifinfoadmin">Supprimer commentaire</a>
									<hr></br>
									
									
									<?php
								}
							}
							
			}
			?>


<div class="box">
<h2>Commenter</h2>
<div class="box_ribbon"></div>
</div>
<?php
echo"test";
if(	isset($_SESSION['ID_membre'])!='' ) 
{
	if(	isset($_POST['Titre'])!=''  
	&&  isset($_POST['Message'])!='' )
	{
		if(  isset($_POST['int'])!='' ){
			
			$_POST['int'] = stripslashes(trim($_POST['int']));
			$inte=$_POST['int'];
		
			if ($inte>"0"&&$inte<"11"){
			
			}else {
				$inte="11";
			
			}
		} else {
			$inte="11";
		}
		$idcommente=$idmembre;
		$idcommentateur=$_SESSION['ID_membre'];
		
		$_POST['Titre'] = stripslashes(trim($_POST['Titre']));
		$_POST['Message'] = stripslashes(trim($_POST['Message']));
		
		$titre=$_POST['Titre'];
		$message=$_POST['Message'];
		$id='';
			if($i = $bdd->prepare("
				INSERT INTO commentaire (id,id_commentateur,id_commente,note,titre,message)
				VALUES (:id,:id_commentateur,:id_commente,:note,:titre,:message)")) 
				{	
				
					//envoi base de données
					$i->bindParam(':id', $id);
					$i->bindParam(':id_commentateur',$idcommentateur);
					$i->bindParam(':id_commente', $idcommente);
					$i->bindParam(':note', $inte);
					$i->bindParam(':titre', $titre);
					$i->bindParam(':message', $message);
					$i->execute();
				}
	}
}
	
?>
				<div class="content">
					<form method="post" action="profil.php?id=<?php echo $idmembre;?>">
						<ul>
							<label for="Titre">Titre</label>
							<li><input type="text" name="Titre" id="Titre" value=""/><br /></li>

							<label for="note">note/10 (nombre entier)</label>
							<li><input type="int" name="int" id="int" value=""/><br /></li>
	
							<label for="Message">Message</label>
							<li><input type="textarea" name="Message" id="Message" value=""/><br /></li>
						
							<input type="submit" name="envoi" value="Envoyer"/>
						</ul>
					</form>
	
				</div><?php
echo'<ul>
<li><hr></li>
<li><hr></li>
</ul>
</div>';


	}
	}	else
	{ echo 'connectez vous sur la page d\'accueil :<a href="Accueil.php" id="accueil">Accueil</a> </br>';
		
	}
 ?>

</div>

 <?php include("footer.php"); ?>

</body>
</html>