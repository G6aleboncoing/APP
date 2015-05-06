
<header id="headermain">

<select name="langue" id="langue_select" >
<option value="null">Langue</option>
<option value="français">Français</option>
<option value="anglais">Anglais</option>
</select>

<form action="connexion.php" method="post">

	<label for="email">Adresse email</label>
	<input type="text" name="email" value=""/>

	<label for="passe">Mot de passe</label>
	<input type="password" name="passe" value=""/>

	<input type="submit" value="Se connecter"/>

</form>
<form>
<a href="Inscription.php">Créez votre compte</a>
<a href="#">Mot de passe oublié ?</a>
<a href="deconnexion.php">Déconnexion</a>
</form>

<a href="Accueil.php"> <img src="images/banniere.jpg"  alt="Bannière de LeBonCoing.fr" title="Accueil" > </a>
 
</header>
