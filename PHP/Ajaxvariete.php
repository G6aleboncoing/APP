<?php 
(include"configuration.php"); ?>
<?php

		foreach($_POST as $v) 
		$typ=$v;
	echo "<select name='variete' id='variete'>";
	if(isset($v)){
		
		$res = $bdd->query("SELECT DISTINCT variete FROM listes WHERE genre='$typ' ORDER BY variete asc");
		while($donnees = $res->fetch()){
			echo "<option value='".$donnees['variete']."'>".$donnees['variete']."</option>";
		}
	}
	else{
		echo "<option value='-1'>Choisir un genre</option>";
	}
	echo "</select>";
 
?>