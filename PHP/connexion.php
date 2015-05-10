<?php 
if(isset($_POST) && isset($_POST['email']) AND isset($_POST['passe'])){
	$y = $bdd->prepare('SELECT * FROM membres WHERE email = ?');
	$y->execute(array($_POST['email']));
	$x = $y->fetch();
	if ($x[0] == 0){
		echo 'Cette adresse email n\'existe pas';
	}else{
		$e = $bdd->prepare('SELECT mot_passe FROM membres WHERE email = ?');
		$e->execute(array($_POST['email']));
		$rep = $e->fetch();
		$passe = sha1($_POST['passe']);

		if ($passe == $rep['mot_passe']){
			session_start();
			$_SESSION['utilisateur'] = $_POST['email'];
			header('Location: espace_membre.php'); 
		}else{
			echo 'Mot de passe incorrect';
		}
	}

}
?>