<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=test', 'root', 'NO', 'YES');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>