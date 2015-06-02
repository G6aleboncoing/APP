<?php 
(include"configuration.php"); ?>
<?php
		foreach($_POST as $v) 
		$typ=$v;?>
	<select name="genre"  id="genre2" onchange="goesp()">
	
			<option value="">--genre--</option>
	<?php
	if(isset($v)){
		
		$res = $bdd->query("SELECT DISTINCT genre FROM listes WHERE typ='$typ' ORDER BY genre asc");
		while($donnees = $res->fetch()){
			echo "<option value='".$donnees['genre']."'>".$donnees['genre']."</option>";
		}
	}
	else{
		echo "<option value='-1'>Choisir un typ2e</option>";
	}
	echo "</select>";
 
?>