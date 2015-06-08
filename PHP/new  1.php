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
		print_r($result);			
		$rayducul= array();	
		$rayy = array_merge($rayducul,$result);
		print_r($rayy);
		$i = count($rayy);
		echo $i;
		$j=0
		?>
<select>
<?php
		while($j<$i)
		{
			?>
		<option value="<?php echo $rayy[$j];?>"> <?php echo $rayy[$j];?></option>	
			<?php
			$j++;
		}?>
	
</select><?php
		$reponse->closeCursor(); 
//Récuperer les éléments de résultat
?>