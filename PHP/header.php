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
		echo $_SESSION['adresse_mail'],'<img src="images/close_button.png" id="close_button" class="float_right" alt="Bouton de fermeture" height="30" width="30" title="Accueil" >';

	}else 
	{//un formulaire simple qui appel "connexion" et pis bah voilà quoi
		echo'
		<form action="connexion.php" method="post" id="password_section">
		<img src="images/close_button.png" id="close_button" class="float_right" alt="Bouton de fermeture" height="30" width="30" title="Accueil" >

		<h2>Connexion</h2>
		<h3>Adresse e-mail</h3>
		<input class="green_input" type="email" name="adresse_mail">
		<h3>Mot de passe</h3>
		<input class="green_input" type="password" name="mdp">
		<input class="float_right" id="login_boutton" type="submit" value="Se connecter"><br>
		<p><a href="#" id="password_creation">Créer votre compte</a> ou <a href="#" id="password_forgotten">Mot de passe oublié ?</a>

		</form>';
	}
	?>

</div>

 <?php include("boutonsection.php"); ?>
 
</header>