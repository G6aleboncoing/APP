<?php 
session_start();

unset($_SESSION['utilisateur']);
unset($_SESSION['email']);
unset($_SESSION['passe']);
unset($_SESSION['ID_membre']);
unset($_SESSION['nom']);
unset($_SESSION['prenom']);
unset($_SESSION['Pays']);
unset($_SESSION['ville']);
unset($_SESSION['detail']);
unset($_SESSION['admin']);

session_unset();

session_destroy();

header ('Location: Accueil.php');

?>