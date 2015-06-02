<div  id="header_2">

<ul>
	<!--liste des choix de base qui s'affiche que l'on soit connecté ou non-->
	<li><a href="Accueil.php"><p id="logo">Leboncoing.com</p></a></li>
	<li class="maj"><a href="recherche.php">Faire une recherche</a></li>
	<li class="maj"><a href="listeannonces.php">Liste des annonces</a></li>
	<li class="maj"><a href="creerannonce.php">Déposer une annonce</a></li>
	<li class="maj"><a href="listemembres.php">Liste des membres</a></li>

<!--<li class="last"><a href="#">Forum</a></li>-->
	<?php if (isset($_SESSION['email'])!='')
	{
		//Liste des choix de base lorsqu'on se connecte
		//Attention pour les mails, c'est encore à faire.
		//Refaire l'endroit où ça s'affiche ?
		echo '</br>
		<li class="maj"><a href="compte.php">Mon compte</a></li>
		<li><a href="#">mes mails</a></li>
		<li class="maj"><a href="Mesannonces.php">Mes annonces</a></li>';

	} else 
	{
		//Liste des choix pour les non connectés
		echo'<li class="maj"><a href="Inscription.php"> S\'inscrire</a></li>';

	}?>
</ul>

</div>

