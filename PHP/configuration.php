<?php
//On ouvre la session afin de pouvoir stocker et utiliser les $_session partout sur le site , maawawawawawa
session_start();

//Tentative de limite dans le temps des sessions
// /* Configure le limiteur de cache à 'private' */

// session_cache_limiter('private');
// $cache_limiter = session_cache_limiter();

// /* Configure le délai d'expiration à 30 minutes */
// session_cache_expire(30);
// $cache_expire = session_cache_expire();


//connexion à la base de donnée
$BDD_hote = 'localhost';
$BDD_bd = 'leboncoing';
$BDD_utilisateur = 'root';
$BDD_mot_passe = '';

//Capture des erreurs
try{
	$bdd = new PDO('mysql:host='.$BDD_hote.';dbname='.$BDD_bd, $BDD_utilisateur, $BDD_mot_passe);
	$bdd->exec("SET CHARACTER SET utf8");
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}

catch(PDOException $e){
	echo 'Erreur : '.$e->getMessage();
	echo 'N° : '.$e->getCode();
}

?>