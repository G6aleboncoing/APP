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

<div  id="body_main">

<?php
$id=$_GET['idannonce'];
$reponse = $bdd->query("SELECT * FROM annonces WHERE id_annonce='$id' ");
		
while ($donnees = $reponse->fetch())
{
$id_membre=$donnees['id_membre'];
$reponse2 = $bdd->query("SELECT * FROM membres2 WHERE id_membre='$id_membre' ");
		
while ($donnees2 = $reponse2->fetch())
{
	?>
					
	<div  id="product">

	<h2 id="produit_nom">Produit</h2><br>
		<img src="#" id="img_product" alt="image_produit"><br>

		<p> - Mise en ligne le <span id="date_product"> <?php echo $donnees['data'] ;?></span></p><hr>

		<table id="table_annonce_1">
		<tr>
			<th>
				Prix :
			</th>
			<td id="price">
				<?php echo $donnees['prix'],'€/kg' ;?>
			</td>
		</tr>
		
		<tr>
			<th>
				Ville :
			</th>
			<td id="address">
				<?php echo $donnees2['ville'];?>
			<td>
		</tr>
		<tr>
			<th>
				Code Postal :
			</th>
			<td id="postalCode">
				<?php echo $donnees2['code_postal'];?>
			</td>
		</tr>
		</table>
		
		<hr>

		<table id="table_annonce_2">
		<tr>
			<th>
				Description:
			</th>
		</tr>
		<tr>
			<td id="annonce_description">
				<?php echo $donnees['description'];?>
			</td>
		</tr>
		</table>
		
		<hr>
	</div>

	<div id="contact_div">


		<div class="box">
			<h2 >Contact</h2>
			<div class="box_ribbon">
			</div>
		</div>

		<div id="contact_img">
			<table id="contact_images">
			<tr>
				<td>
					<a href="#"><img src="images/mail_logo.png" id="contact_mail" alt="Envoyer un mail">
					</a>
				</td>
				<td class="view_number">
					<img src="images/phone_logo.png" id="contact_phone" alt="Voir le numero">
				</td>
			</tr>
			<tr>
				<td>
				<?php $adresse_mail=$donnees2['adresse_mail'];
					echo '<a href="Message.php?forme=envoi&&emaildestinataire=',$adresse_mail,'">Envoyer un mail</a>';?>
				</td>
				<td class="view_number" id="view_number_1">
					<a href="#" id="view_number_1">Voir le profil</a>
				</td>
			</tr>
			</table>
		</div>
	</div>
	<?php
}
}
?>
</div>

 
 <?php include("footer.php"); ?>

</body>
</html>