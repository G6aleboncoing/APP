<?php
include('configuration.php');
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

<div class="left_section" id="categories_section" >
<h4>Info Catégories</h4>
<ul>
    <li>Légumes</li>
    <li>Fruit</li>
</ul>

<h4>Recettes</h4>
<ul>
    <li>Recettes du moment</li>
    <li>Recettes Fruités</li>
</ul>
</div>

<div class="right_section" id="annonce_section" >

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
