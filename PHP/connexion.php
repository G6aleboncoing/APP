<?php

include('configuration.php');

/********Actualisation de la session...**********/

/*
connexionbdd();
actualiser_session();
*/
/********Fin actualisation de session...**********/

if(isset($_SESSION['membre_id']))
{
	$informations = Array(/*Membre qui essaie de se connecter alors qu'il l'est déjà*/
					true,
					'Vous êtes déjà connecté',
					'Vous êtes déjà connecté avec le mail <span class="mail">'.htmlspecialchars($_SESSION['email'], ENT_QUOTES).'</span>.',
					' - <a href="'.ROOTPATH.'deconnexion.php">Se déconnecter</a>',
									'',
										ROOTPATH.'/Accueil.php',
										3
					);
	

	exit();
}

if($_POST['validate'] != 'ok')
{
/********Entête et titre de page*********/

$titre = 'Connexion';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" media="screen" type="text/css" href="../CSS/main.css" />
<link rel="icon" type="image/png" href="images/coing.png" />
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="../JavaScript/main.js"></script>
<title>LeBonCoing</title>
</head>

<body>
 <?php include("header.php"); ?>

 <?php include("boutonsection.php"); ?>
 
  <?php include("recherche.php"); ?>

		<div id="contenu">
			<div id="map">
				<a href="../Accueil.php">Accueil</a> => <a href="connexion.php">Connexion</a>
			</div>
					
			<h1>Formulaire de connexion</h1>
			<p>Pour vous connecter, indiquez votre email et votre mot de passe.<br/>
			Vous pouvez aussi cocher l'option "Me connecter automatiquement à mon
			prochain passage." pour laisser une trace sur votre ordinateur pour être
			connecté automatiquement.<br/>
			Ce système de trace est basé sur les cookies, ce sont des petits fichiers
			contenant votre numéro d'identification ainsi qu'une version cryptée de votre
			mot de passe. Ces fichiers ne peuvent en aucun cas endommager votre ordinateur,
			ni l'affecter d'aucune façons, vous pourrez les supprimer à tout moment dans
			les options de votre navigateur.</p>
			
			<form name="connexion" id="connexion" method="post" action="connexion.php">
				<fieldset><legend>Connexion</legend>
					<label for="email" class="float">email :</label> <input type="text" name="email" id="email" value="<?php if(isset($_SESSION['connexion_email'])) echo $_SESSION['connexion_email']; ?>"/><br/>
					<label for="passe" class="float">Passe :</label> <input type="password" name="passe" id="passe"/><br/>
					<input type="hidden" name="validate" id="validate" value="ok"/>
					<input type="checkbox" name="cookie" id="cookie"/> <label for="cookie">Me connecter automatiquement à mon prochain passage.</label><br/>
					<div class="center"><input type="submit" value="Connexion" /></div>
				</fieldset>
			</form>
			
			<h1>Options</h1>
			<p><a href="inscription.php">Je ne suis pas inscrit !</a><br/>
			<a href="moncompte.php?action=reset">J'ai oublié mon mot de passe !</a>
			</p>
			<?php
}
			
			else
			{
				//on verifie si il est déjà inscrit
				$result = sqlquery("SELECT COUNT(membre_id) AS nbr, membre_id, email, mot_passe FROM membres WHERE
				mot_passe = '".mysql_real_escape_string($_POST['email'])."' GROUP BY membre_id", 1);
				
				if($result['nbr'] == 1)
				{
					if(md5($_POST['passe']) == $result['membre_passe'])
					{
						$_SESSION['membre_id'] = $result['membre_id'];
						$_SESSION['mot_passe'] = $result['mot_passe'];
						$_SESSION['membre_passe'] = $result['membre_passe'];
						unset($_SESSION['connexion_email']);
						
						if(isset($_POST['cookie']) && $_POST['cookie'] == 'on')
						{
							setcookie('membre_id', $result['membre_id'], time()+365*24*3600);
							setcookie('membre_passe', $result['membre_passe'], time()+365*24*3600);
						}
						
						$informations = Array(/*Vous êtes bien connecté*/
										false,
										'Connexion réussie',
										'Vous êtes désormais connecté avec l email <span class="email">'.htmlspecialchars($_SESSION['email'], ENT_QUOTES).'</span>.',
										'',
										ROOTPATH.'/Accueil.php',
										3
										);

						exit();
					}
					
					else
					{
						$_SESSION['connexion_email'] = $_POST['email'];
						$informations = Array(/*Erreur de mot de passe*/
										true,
										'Mauvais mot de passe',
										'Vous avez fourni un mot de passe incorrect.',
										' - <a href="'.ROOTPATH.'/Accueil.php">Accueil</a>',
										ROOTPATH.'/membres/connexion.php',
										3
										);

						exit();
					}
				}
				
				else if($result['nbr'] > 1)
				{
					$informations = Array(/*Erreur de email doublon (normalement impossible)*/
									true,
									'Doublon',
									'Deux membres ou plus ont le même email, contactez un administrateur pour régler le problème.',
									' - <a href="'.ROOTPATH.'/Accueil.php">Accueil</a>',
									ROOTPATH.'/contact.php',
									3
									);
					exit();
				}
				
				else
				{
					$informations = Array(/*email inconnu*/
									true,
									'email inconnu',
									'Le email <span class="email">'.htmlspecialchars($_POST['email'], ENT_QUOTES).'</span> n\'existe pas dans notre base de données. Vous avez probablement fait une erreur.',
									' - <a href="'.ROOTPATH.'/Accueil.php">Accueil</a>',
									ROOTPATH.'/membres/connexion.php',
									5
									);
					exit();
				}
			}
			?>			
		</div>

 <?php include("footer.php"); ?>

</body>
</html>
