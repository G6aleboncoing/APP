
<header id="headermain">

<select name="langue" id="langue_select" >
<option value="null">Langue</option>
<option value="français">Français</option>
<option value="anglais">Anglais</option>
</select>


	
	<!--permet de se connecter a la bdd include-->


<form id="password_section" action="connexion.php" method="post">

	<label for="email">Adresse email</label>
	<input type="text" name="email" value=""/>

	<label for="passe">Mot de passe</label>
	<input type="password" name="passe" value=""/>

	<input type="submit" value="Se connecter"/>

</form>
<form>
<a href="Inscription.php" id="password_forgotten">Créez votre compte</a>
<a href="#" id="password_forgotten">Mot de passe oublié ?</a>
<a href="deconnexion.php" id="password_forgotten">Déconnexion</a>
</form>

<div id="slideshow">
<ul>
<li><a href="Accueil.php"> <img src="images/banniere.jpg" id="banniere" alt="Bannière de LeBonCoing.fr"  title="Accueil" ></a></li>
<li><a href="Accueil.php"> <img src="images/banniere.jpg" id="banniere" alt="Bannière de LeBonCoing.fr"  title="Accueil" ></a></li>
<li><a href="Accueil.php"> <img src="images/banniere.jpg" id="banniere" alt="Bannière de LeBonCoing.fr"  title="Accueil" ></a></li>
<li><a href="Accueil.php"> <img src="images/banniere.jpg" id="banniere" alt="Bannière de LeBonCoing.fr"  title="Accueil" ></a></li>
</ul>
</div>

</header>
