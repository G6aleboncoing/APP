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
	//verification blabla
		$reponse = $bdd->query("SELECT typ FROM Listes ");
		$array= array();
		
		while ($donnees = $reponse->fetch())
		{ 
			//rajouter a chaque fois les éléments a l'array (du cul)
			array_push($array,$donnees['typ']);
		}
		//enlever les doublons
		$result = array_unique($array);
		print_r($array);
		print_r($result);
		$reponse->closeCursor(); 
//Récuperer les éléments de résultat
?>

<?php
//Verifier que l'on a selectionner dans les types avant de chercher la suite
// récuperer le type dans la liste avant pour pouvoir le mettre dans la requette qui suit
		reponse2 =$bdd->query("SELECT genre FROM Listes WHERE typ = '$typ'")
		$array2= array();
		
		while ($donnees = $reponse2->fetch())
		{ 
			//rajouter a chaque fois les éléments a l'array (du cul)
			array_push($array,$donnees['typ']);
		}
		//enlever les doublons
		$result2 = array_unique($array);
		print_r($array);
		print_r($result2);
		$reponse2->closeCursor(); 
		// maintenant on a tout les genres pour ce typ dans result2
	?>
	
<?php
//Devine quoi ! c'est pareil qu'avant, mais pour les varietes !
		reponse3 =$bdd->query("SELECT varietes FROM Listes WHERE genre = '$genre'")
		$array3= array();
		
		while ($donnees = $reponse3->fetch())
		{ 
			//rajouter a chaque fois les éléments a l'array (du cul)
			array_push($array,$donnees['typ']);
		}
		//enlever les doublons
		$result3 = array_unique($array);
		print_r($array);
		print_r($result3);
		$reponse3->closeCursor(); 
		// maintenant on a tout les varietes pour ce genre dans result3
	?>
</div>
 <?php include("footer.php"); ?>

</body>
</html>