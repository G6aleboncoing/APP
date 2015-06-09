<?php 
session_start();
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

header ('Location: Accueil.php');

?>