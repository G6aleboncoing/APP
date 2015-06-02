<?php
	
		$idannonce=$_GET['idannonce'];
		//vérifier à qui apartiens l'annonce ET si c'est un admnistrateur
		$reponse = $bdd->query("DELETE from annonces WHERE id_annonce=$idannonce");
		header ('Location: Accueil.php');  
?>