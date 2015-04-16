<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=leboncoing', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>