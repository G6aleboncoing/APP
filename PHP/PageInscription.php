<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" media="screen" type="text/css" href="../CSS/PageAccueil.css" />
<link rel="icon" type="image/png" href="images/coing.png" />
<title>LeBonCoing</title>
</head>

<body>


<?php include("header.php"); ?> 

<?php

// Ne pas oublier d'inclure la librarie Form
include CHEMIN_LIB.'form.php';

// "formulaire_inscription" est l'ID unique du formulaire
$form_inscription = new Form('formulaire_inscription');

$form_inscription->method('POST');

$form_inscription->add('Text', 'nom_utilisateur')
                 ->label("Votre nom d'utilisateur");

$form_inscription->add('Password', 'mdp')
                 ->label("Votre mot de passe");

$form_inscription->add('Password', 'mdp_verif')
                 ->label("Votre mot de passe (vérification)");

$form_inscription->add('Email', 'adresse_email')
                 ->label("Votre adresse email"); 

$form_inscription->add('File', 'avatar')
                 ->filter_extensions('jpg', 'png', 'gif')
                 ->max_size(8192) // 8 Kb
                 ->label("Votre avatar (facultatif)")
                 ->Required(false);

$form_inscription->add('Submit', 'submit')
                 ->value("Je veux m'inscrire !");

// Pré-remplissage avec les valeurs précédemment entrées (s'il y en a)
$form_inscription->bound($_POST);


<div class="center_section" id="inscription_section">

<p>Veuillez renseignez les champs ci-dessous</p>

<form method="post" action="#">

<input type="text" name="prenom" id="prenom" placeholder="Prénom"><br>
<input type="text" name="nom" id="nom" placeholder="Nom"><br>
<select name="pays" id="pays" >
<option value="null">Pays</option>
<option value="france">France</option>
<option value="espagne">Espagne</option>
<option value="royaume-uni">Royaume-Uni</option>
</select><br>
<select name="region" id="region" >
<option value="null">Région</option>
<option value="ile_de_france">Ile-de-France</option>
<option value="bourgogne">Bourgogne</option>
</select><br>
<input type="text" name="ville" id="ville" placeholder="Ville"><br>
<input type="email" name="adresse_mail" id="adresse_mail" placeholder="Adresse mail"><br>
<input type="text" name="adresse" id="adresse" placeholder="Adresse"><br>
<input type="tel" name="numero_de_tel" id="numero_de_tel" placeholder="N° de Téléphone"><br>
<textarea name="description_personnelle" id="description_personnelle" placeholder="Description Personelle"></textarea><br>
<input type="password" name="mdp" id="mdp" placeholder="Mot de passe"><br>
<input type="password" name="confirmation_mdp" id="confirmation_mdp" placeholder="Confirmation mot de passe"><br>


<input type="checkbox" name="check_condition_g" id="check_condition_g">J'accepte les conditions génarales d'utilisation<br>
<input type="checkbox" name="check_newsletter" id="check_newsletter">Soubscrition à la newsletter<br>

<input type="submit" value="Envoyer">

</form>

</div>

<?php include("footer.php"); ?> 

</body>
</html>