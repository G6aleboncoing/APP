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

 <?php include("boutonsection.php"); ?>
 
 <?php echo '</br> bonjour ';
 echo 'email:',$_SESSION['email'],'</br>',
 'nom:',	$_SESSION['nom'],'</br>',
 	'prenom:',$_SESSION['prenom'],'</br>',
 'pays:',	$_SESSION['Pays'],'</br>',
	'ville:',$_SESSION['ville'];
 echo'test </br>';
 ?>

 <?php include("footer.php"); ?>

</body>
</html>