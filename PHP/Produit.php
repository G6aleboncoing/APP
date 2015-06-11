<?php
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" media="screen" type="text/css" href="../CSS/main.css" />
<link href='http://fonts.googleapis.com/css?family=Brawler' rel='stylesheet' type='text/css'>
<link rel="icon" type="image/png" href="images/lbc_logo.png" />
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="../JavaScript/main.js"></script>
<title>LeBonCoing</title>
</head>

<body>


<?php include("header.php"); ?> 

<div class="left_section" id="produit">
<label id="produit_nom">Produit</label></br>
<img src="#" alt="image_produit">
</div>

<div class="right_section" id="description_produit_section">
<textarea id="description">description du produit</textarea>
</div>

<div id="bouton_contact_div">
<button  name="button_contact">Contacter le vendeur</boutton>
</div>

<?php include("footer.php"); ?> 

</body>
</html>

