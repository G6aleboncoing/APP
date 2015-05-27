<?php
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" media="screen" type="text/css" href="../CSS/PageAccueil.css" />
<link rel="icon" type="image/png" href="images/coing.png" />
<title>LeBonCoing</title>
</head>

<body>


 <?php include("header.php"); ?>


<div class="left_section" id="message_1">

<a href="#"><button  id="nouveau_message">Nouveau Message</button></a></br>
<a href="#"><button  name="boite_de_reception">Boite de réception</button></a></br>
<a href="#"><button  name="corbeille">Corbeille</button></a>

<div class="center_section" id="message_2">

<table id="table_message">
<thead>
<tr>
<th>Message de</th>
<th>Sujet</th>
<th>Date</th>
<th><input type="checkbox" id="check_message_all"></th>
</tr>
</thead>
<tbody>
<tr>
<td><input type="text" id="message_auteur"></td>
<td><input type="text" id="message_sujet"></td>
<td><input type="text" id="message_date"></td>
<td><input type="checkbox" id="check_message_1"></td>
</tr>
</tbody>
</table>

<div id="bouton_supprime_div">
<button  name="button_supprime">Supprimer</button>
</div>

</div>

<?php include("footer.php"); ?> 


</body>
</html>
