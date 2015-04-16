<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" media="screen" type="text/css" href="../CSS/PageAccueil.css" />
<link rel="icon" type="image/png" href="images/coing.png" />
<title>LeBonCoing</title>
</head>

<body>

 <?php include("header.php"); ?>


<div name="bouton_section" id="bouton_section">

<a href="#"><button  name="buttonAnnonce">Déposer une annonce</button></a>
<a href="PageBoiteMail.php"><button  name="buttonAlertes">Mes Alertes</button></a>
<a href="#"><button  name="buttonCompte">Mon Compte</button></a>
<a href="#"><button  name="buttonForum">Forum</button></a><br>



<select name="categories" id="categories" >
<option value="null">Catégories</option>
<option value="legume">Legume</option>
<option value="fruit">Fruit</option>
</select>

<select name="region" id="region" >
<option value="null">Région</option>
<option value="ile_de_france">Ile-de-France</option>
<option value="bourgogne">Bourgogne</option>
</select>

<input type="search" name="recherche_ville" placeholder="Villes ou codes postaux">

<input type="search" name="rechercher"><br>

<select name="nbAnnoncePage" id="nbAnnoncePage" >
<option value="10">10</option>
<option value="20">20</option>
<option value="30">30</option>
</select>

</div>

<div class="left_section" id="categories_section" >
<p>Info Catégories</p>
<ul>
    <li>Légumes</li>
    <li>Fruit</li>
</ul>
</div>

<div class="left_section" id="recettes_section" >
<p>Recettes</p>
<ul>
    <li>Recettes du moment</li>
    <li>Recettes Fruités</li>
</ul>
</div>

<div class="center_section" id="annonce_section" >

<table id="table_annonce">
<tr>
<td>Date</td>
<td rowspan="4"><a href="#"> <img src="#" alt="annonce" height="100" width="300" ></a></td>
<td>Nom de l'annonce</td>
</tr>
<tr>
<td rowspan="3"></td>
<td>Catégories</td>
</tr>
<tr>
<td>Localisation</td>
</tr>
<tr>
<td>Prix</td>
</tr>
</table>

</div>

<hr>

 <?php include("footer.php"); ?>


</body>
</html>
