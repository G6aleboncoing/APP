<header>
  <!--bienvenue dans le header qu'on met partout en entête-->
<div id="header_1">

<ul>
	<li>
		<select name="langue" id="langue_select">
			<option value="null">Langue</option>
			<option value="français">Français</option>
			<option value="anglais">Anglais</option>
		</select>
	</li>
	<li>
		<a href="#" id="test_link">Nous Contacter</a>
	</li> 
	

	<?php
	//On fonction du statut de la personne connecter/non-connecter, on lui propose de se connecter ou se deconnecter
	if(isset($_SESSION['adresse_mail'])=='')
	{
		echo'
		<li><a href="#" id="login_link">Connexion</a></li>';

	} else 
	{
		echo'
		<a href="deconnexion.php?" id="deconnexion">deconnexion';
		echo' salut </br> ',
		$_SESSION['adresse_mail'];
	}
	?>

</ul>
</div>

<div id="password_box">

	<?php
	//on affiche cela grâce a du js, si l'on clique sur le bouton login_link.
	
	if(	isset($_SESSION['adresse_mail'])!='' && isset($_SESSION['mdp'])!='' ) 
	{//ce cas ne devrait pas se produire vu que on enlève le bouton en question quand on est connecté, mais au cas ou, on laisse la possibilité de sortir
		echo $_SESSION['adresse_mail'],'<img src="#" id="close_boutton" class="float_right" alt="Bouton de fermeture"  title="Accueil" >';

	}else 
	{//un formulaire simple qui appel "connexion" et pis bah voilà quoi
		echo'
		<form action="connexion.php" method="post" id="password_section">
		<img src="#" id="close_boutton" class="float_right" alt="Bouton de fermeture"  title="Accueil" >

		<html>
		<h2>Connexion</h2>
		<form action="connexion.php" method="post">

		<label for="adresse_mail">Adresse email</label>
		<input class="green_input" type="text" name="adresse_mail" value=""/>

		<label for="mdp">Mot de passe</label>
		<input class="green_input" type="password" name="mdp" value=""/>

		<input class="float_right" type="submit" value="Se connecter"/>

		</form>';
	}
	?>

</div>

 <?php include("boutonsection.php"); ?>
 
</header>