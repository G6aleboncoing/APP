<?php (include"configuration.php"); ?>
<html>
	<head>
		<title>Tutoriel Ajax (XHTML + JavaScript + XML)</title>
		<script type='text/javascript'>
			var xhr = null; 
 
			function getXhr(){
				if(window.XMLHttpRequest) // Firefox et autres
				   xhr = new XMLHttpRequest(); 
				else if(window.ActiveXObject){ // Internet Explorer 
				   try {
			                xhr = new ActiveXObject("Msxml2.XMLHTTP");
			            } catch (e) {
			                xhr = new ActiveXObject("Microsoft.XMLHTTP");
			            }
				}
				else { // XMLHttpRequest non supporté par le navigateur 
				   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
				   xhr = false; 
				} 
			}
 
			/**
			* Méthode qui sera appelée sur le click du bouton
			*/
			function go(){
				getXhr();
				// On défini ce qu'on va faire quand on aura la réponse
				xhr.onreadystatechange = function(){
					// On ne fait quelque chose que si on a tout reçu et que le serveur est ok
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						// On se sert de innerHTML pour rajouter les options a la liste
						document.getElementById('espece').innerHTML = leselect;
					}
				}
 
				// Ici on va voir comment faire du post
				xhr.open("POST","Ajaxespece.php",true);
				// ne pas oublier ça pour le post
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				// ne pas oublier de poster les arguments
				// ici, l'id de l'auteur
				sel = document.getElementById('genre');
				tup = sel.options[sel.selectedIndex].value;
				xhr.send("tup="+tup);
			}
			function goesp(){
				getXhr();
				// On défini ce qu'on va faire quand on aura la réponse
				xhr.onreadystatechange = function(){
					// On ne fait quelque chose que si on a tout reçu et que le serveur est ok
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						// On se sert de innerHTML pour rajouter les options a la liste
						document.getElementById('variete').innerHTML = leselect;
					}
				}
 
				// Ici on va voir comment faire du post
				xhr.open("POST","Ajaxvariete.php",true);
				// ne pas oublier ça pour le post
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				// ne pas oublier de poster les arguments
				// ici, l'id de l'auteur
				sel = document.getElementById('espece');
				idesp = sel.options[sel.selectedIndex].value;
				xhr.send("idEsp="+idesp);
			}
		</script>
	</head>
	<body>
		<form>
			<fieldset style="width: 500px">
				<legend>Liste liées</legend>
				<label>genre</label>
				<select name='genre' id='genre' onchange='go()'>
					<option value='-1'>Aucun</option>
								<?php
			//verification blabla
			$reponse = $bdd->query("SELECT DISTINCT typ FROM `listes` ORDER BY typ ASC ");
			while ($donnees = $reponse->fetch())
			{ 
				?>
				<option value="<?php echo $donnees['typ'];?>"> <?php echo $donnees['typ'];?></option>	
				<?php
			}
				?>
				</select>
				
				<label>Espece</label>
				<div id='espece' style='display:inline'>
				<select name='espece'>
					<option value='-1'>Choisir un auteur</option>
				</select>
				</div>
				
				<label>Variete</label>
				<div id='variete' style='display:inline'>
				<select name='variete'>
					<option value='-1'>Choisir un genre et une espece</option>
				</select>
				</div>
			</fieldset>
		</form>
	</body>
</html>