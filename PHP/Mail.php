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
 </br>
<?php

	if (isset($_SESSION['ID_membre'])!='')	
	{	
		$idmembre=$_SESSION['ID_membre'];
		
		$req = $bdd->query("SELECT COUNT(*) as NbNews FROM messages WHERE id_destinataire='$idmembre'");
		$donnees3 = $req->fetch();
		$req->closeCursor();
		if ($donnees3['NbNews']==0)
		{
			echo 'vous n\'avez pas de message';
		}else 
		{	
			if ($donnees3['NbNews']==1)
			{
				echo 'vous avez ',$donnees3['NbNews'],' message';
			}
			else {
				echo 'vous avez ',$donnees3['NbNews'],' messages';
			}
			echo'</br>';
			$reponse = $bdd->query("SELECT * FROM messages WHERE id_destinataire='$idmembre'");
		
			while ($donnees = $reponse->fetch())
			{
				echo' date d\'envoi : ',$donnees['data'];
				echo' titre : ',$donnees['titre'];
				echo '</br>';
				$idexpediteur=$donnees['id_expediteur'];
				$reponse2 = $bdd->query("SELECT * FROM membres WHERE id_membre='$idexpediteur'");
				
				while ($donnees2 = $reponse2->fetch())
				{
					echo' Message de : ',$donnees2['email']; 
					$id=$donnees['id'];
					echo'<a  href="Message.php?forme=lecture&&idmess=',$id,'">Lire ce message</a>','</br></br>';
					//mettre un lien ici pour lire le message
				}
				
				$reponse2->closeCursor(); 
			}
		
			$reponse->closeCursor(); 
		}

	}
	?>
	</br><a href="Message.php?forme=envoi"> écrire un nouveau message</a>
	<?php
	//lire les messages envoyés ?
	//supprimer les messaches avec la checkbox ?
	?>
 </div>
 <?php include("footer.php"); ?>

</body>
</html>