<?php
include('configuration.php');
?>
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

<body>

 <?php include("header.php"); ?>
 
<div id="body_main">
<?php
//verifier si on recoit des GET
if(	isset($_SESSION['ID_membre'])!='' ) 
	{if (isset($_GET['forme'])) 
		{
			$forme=$_GET['forme'];
			if($forme=='envoi')
			{
				?>
				<?php if(isset($_GET['message'])!='')
					{
						$message=$_GET['message'];
						if($message==1){echo "Il faut tout remplir";}
						if($message==2){echo "L'adresse mail n'est pas dans notre base de donnéees";}
						if($message==3){echo'votre message a bien été envoyé voulez-vous en envoyé un autre ?';}
					}?>
				<div class="content">
					<form method="post" action="Message.php?forme=traitement">
						<ul>
							<label for="Titre">Titre</label>
							<li><input type="text" name="Titre" id="Titre" value=""/><br /></li>
<!--si c'est un message d'envoi préconcu ou pas ? -->
							<label for="destinataire">destinataire (son addresse mail)</label>
							<li><input type="text" name="destinataire" id="destinataire" value="<?php if(isset($_GET['emaildestinataire'])!=''){echo $_GET['emaildestinataire'];}?>"/><br /></li>
	
							<label for="Message">Message</label>
							<li><input type="textarea" name="Message" id="Message" value=""/><br /></li>
						
							<input type="submit" name="envoi" value="Envoyer"/>
						</ul>
					</form>
	
				</div>
			<?php
			// envoi  : formulaire
//-> variable envoi
//-> id expediteur (récuperer sur le session) (en caché)
// if get( id destinataire (récuperer sur l'id du lien de l'annonce/ de la liste des membres/ du compte) (le remplir)
// else le demander)
// si get de formulaire d'envoi alors : formulaire d'envoi

			}else if($forme=='lecture')
			{	
				echo '<a  href="Mail.php">Retourner à la boite Mail</a>';
				echo'</br>';
				if (isset($_GET['idmess'])) 
				{
					$id=$_GET['idmess'];
					$id=$_GET['idmess'];
					$idmembre=$_SESSION['ID_membre'];
					$reponse = $bdd->query("SELECT * FROM messages WHERE id='$id' && id_destinataire='$idmembre'");
		
					while ($donnees = $reponse->fetch())
						{
							echo' titre : ',$donnees['titre'];
							echo' date d\'envoi : ',$donnees['data'];
							echo '</br>';
							$idexpediteur=$donnees['id_expediteur'];
							$reponse2 = $bdd->query("SELECT * FROM membres2 WHERE id_membre='$idexpediteur'");
				
							while ($donnees2 = $reponse2->fetch())
							{
								echo' Message de : ',$donnees2['adresse_mail']; 
								echo '</br>';
								echo 'Message : ',$donnees['message'];
								echo '<hr>';
								echo '</br><a href="Supprimermessage.php?idmessage=',$id,'"> Supprimer les messages selectionnées</a>';
							}
				
							$reponse2->closeCursor(); 
							

						}
						$update = $bdd->prepare("UPDATE `messages` SET  
							`reception`=:reception
							WHERE `id`=:id ");
							
							$update->execute(array(
								':reception' => '1',
								':id' => $id
									));
					$reponse->closeCursor(); 
									
				}else 
				{
					header ('Location: Mail.php?');
				}
			//si get de lecture alors : 
//->variable lecture
//->id message
//-> verification id session et id destinataire
//récuperer le message
 //Alors proposer de répondre 
			}else if($forme=='traitement')
			{
				if(isset($_POST['Titre'])!='' && 
				isset($_POST['destinataire'])!='' &&
				isset($_POST['Message'])!='' )
				{
					if(!empty($_POST['Titre']) && 
					!empty($_POST['destinataire'])&& 
					!empty($_POST['Message']))
					{
						
						$_POST['Titre'] = stripslashes(trim($_POST['Titre']));
						$_POST['destinataire'] = stripslashes(trim($_POST['destinataire']));
						$_POST['Message'] = stripslashes(trim($_POST['Message']));
							
						$destinataire=$_POST['destinataire'];
						$req=$bdd->query("SELECT * FROM membres2 where adresse_mail = '$destinataire'"); 
						$data=$req->fetch(); 
		
						//vérifier unicité de l'adresse ici
						if($data['adresse_mail'] != "")
						{
							$id='';
							$Titre=$_POST['Titre'] ;
							$expediteur=$_SESSION['ID_membre'];
							$destinataire=$data['id_membre'];
							$reception='0';
							$message=$_POST['Message'];
							
							
							if($i = $bdd->prepare("
								INSERT INTO messages (id,id_expediteur,id_destinataire,reception,titre,message)
								VALUES (:id,:id_expediteur,:id_destinataire,:reception,:titre,:message)")) 
							{	
					
								//envoi base de données
								$i->bindParam(':id', $id);
								$i->bindParam(':id_expediteur',$expediteur);
								$i->bindParam(':id_destinataire', $destinataire);
								$i->bindParam(':reception', $reception);
								$i->bindParam(':titre', $Titre);
								$i->bindParam(':message', $message);
								$i->execute();
								header ('Location: Message.php?forme=envoi&&message=2');
							}
						}else
						{
							//mail destinataire pas inscrit
							
							header ('Location: Message.php?forme=envoi&&message=2');
						}
					}else {
						header ('Location: Message.php?forme=envoi&&message=1');
					}
				}else {
					header ('Location: Message.php?forme=envoi');
				}
				//traitement des messages envoyés ici
			}
 
 //variable vide -> renvoi accueil
		}else 
		{
			//demander ce qu'ils veulent faire
		}
	}else 
	{
		header ('Location: Inscription.php');
	}
	?>
 </div>
 <?php include("footer.php"); ?>

</body>