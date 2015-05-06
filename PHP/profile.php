<?php
include('configuration.php');
?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" media="screen" type="text/css" href="../CSS/PageAccueil.css" />
<link rel="icon" type="image/png" href="images/coing.png" />
<title>LeBonCoing</title>
</head>

<body>


<?php include("header.php"); ?> 

<div class="content">

<?php
//On verifie que lidentifiant de lutilisateur est defini
if(isset($_GET['id'])) {
	
	//On verifie que lutilisateur existe
    $id = intval($_GET['id']);
	
	
	$reponse = $bdd->query('SELECT * FROM membres');
	   //On récupère les infos du membre
       $query=$db->prepare('SELECT prenom, 
       membre_email
       FROM membre WHERE membre_id=:membre');
       $query->bindValue(':membre',$membre, PDO::PARAM_INT);
       $query->execute();
       $data=$query->fetch();
	$dn = mysql_query('select username, email, avatar, signup_date from users where id="'.$id.'"');
    if(mysql_num_rows($dn)>0)
    {
		$dnn = mysql_fetch_array($dn);
        //On affiche les donnees de lutilisateur
?>
		Voici le profil de "<?php echo htmlentities($dnn['prenom']); ?>" :
		<table style="width:500px;">
        <tr>
        
        <td class="left"><h1><?php echo htmlentities($dnn['prenom'], ENT_QUOTES, 'UTF-8'); ?></h1>
        Email: <?php echo htmlentities($dnn['email'], ENT_QUOTES, 'UTF-8'); ?><br />
		</tr>
		</table>
<?php
    } else{
        echo 'Cet utilisateur n\'existe pas.';
    }
}else{
	echo 'L\'identifiant de l\'utilisateur n\'est pas d&eacute;fini.';
}
?>
                </div>
				<?php include("footer.php"); ?> 
				</body>
</html>