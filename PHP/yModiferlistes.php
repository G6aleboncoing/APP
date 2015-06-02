<?php
include('configuration.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" media="screen" type="text/css" href="../CSS/main.css" />
<link rel="icon" type="image/png" href="images/coing.png" />
<meta name="Description" content="Exemple d'une liste liée en AJAX." />
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="../JavaScript/main.js"></script>
<script type="text/javascript" src="../JavaScript/fonctions.js"></script>
<title>LeBonCoing</title>
</head>

<body>

 <?php include("header.php"); ?>

 </br></br></br></br></br></br></br></br>
 </br></br></br></br></br></br></br></br>
<h1>Essai ajax 1</h1>
 
 
<form method="post" name="liste">
<label>Type : </label>
<select name="typ" id="typ" onchange="Typ(this.value);">
<option value="vide">- - - Choisissez un type - - -</option>

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
		$i1 = count($rayy);
		echo $i1;
		$j1=0
		?>
		
		<?php
		while($j1<$i1)
		{// On affiche tout les types
			?>
		<option value="<?php echo $rayy[$j1];?>"> <?php echo $rayy[$j1];?></option>	
			<?php
			
			$j1++;
		}?>
		
</select><br/>
 
 
<!-- Dans ce bloc sera affiché la liste des genres-->
<div id="blocgenre">
<?php
/*Pour garder la sélection de la seconde liste, on l'inclue directement dans la page lors de la validation du formulaire*/
if(isset($_POST['typ'])){
//on créer une variable utilisé dans la page "traitement.php"
$include = 1;
//on inclue la page
include('traitement.php');
}
?>
</div>
<!-- Fin du bloc des genres -->
 
 
<label>Valider : </label>
<input type="submit" name="Valider" value="Valider"/>
<input type="reset" name="Effacer" value="Effacer"/>
</form>
 
 
 <?php
//Le formulaire a été posté
if(isset($_POST["Valider"])){
//Régions  vide
    if(isset($_POST["typ"]) && $_POST["typ"] == 'vide'){
        echo '<div id="erreur">Veuillez sélectionner un type!</div>';
    }
//Départements vide
    else if(isset($_POST["genre"]) && $_POST["genre"] == 'vide'){
        echo '<div id="erreur">Veuillez sélectionner un g!</div>';
    }
//Tout est ok
    else{
		
		$typ=$_POST['typ'];
		$genre=$_POST['genre'];
        //On affiche le résultat
        echo '<div id="info">Vous avez sélectionné le genre '.$typ.' et le genre '.$genre.'</div>';
    }
}
?>
</div>
 
</body>
</html>
