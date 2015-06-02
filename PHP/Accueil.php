<?php 
(include"configuration.php"); ?>
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

<div id="body_main">
 
<div id="slideshow">
<ul>
<li><a href="Accueil.php"> <img src="images/banniere.jpg" id="banniere" alt="Bannière de LeBonCoing.fr"  title="Accueil" ></a></li>
<li><a href="Accueil.php"> <img src="images/banniere.jpg" id="banniere" alt="Bannière de LeBonCoing.fr"  title="Accueil" ></a></li>
<li><a href="Accueil.php"> <img src="images/banniere.jpg" id="banniere" alt="Bannière de LeBonCoing.fr"  title="Accueil" ></a></li>
<li><a href="Accueil.php"> <img src="images/banniere.jpg" id="banniere" alt="Bannière de LeBonCoing.fr"  title="Accueil" ></a></li>
</ul>
</div>

<div id="categories_section" class="white_background">
<h4>Info Catégories</h4>
<hr>
<li>Fruit
<ul>
    <li><a href="#">Pommes</a></li>
    <li><a href="#">Poires</a></li>
</ul>
</li>

<li>Légumes
<ul>
    <li><a href="#">Carottes</a></li>
    <li><a href="#">Haricots verts</a></li>
</ul>
</li>


</div>

<div class="annonce_section" id="annonce_section" >

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
</div>
 <?php include("footer.php"); ?>

</body>
</html>
