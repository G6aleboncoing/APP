
<?php
include('configuration.php');
?>
<?php
echo"test";
if(	isset($_SESSION['ID_membre'])!='' ) 
{echo"test";
	if(	isset($_POST['Titre'])!=''  
	&&  isset($_POST['Message'])!='' )
	{
		echo"test";
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
				INSERT INTO commentaire (id,id_commentateur,id_commente,int,titre,message)
				VALUES (:id,:id_commentateur,:id_commente,:int,:titre,:message)")) 
				{	
				
					//envoi base de données
					$i->bindParam(':id', $id);
					$i->bindParam(':id_commentateur',$idcommentateur);
					$i->bindParam(':id_commente', $idcommente);
					$i->bindParam(':int', $int);
					$i->bindParam(':titre', $Titre);
					$i->bindParam(':message', $message);
					$i->execute();
					header ('Location: accueil.php?');
				}
	}
}
	
?>
				<div class="content">
					<form method="post" action="commentaire.php?">
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
	
				</div>