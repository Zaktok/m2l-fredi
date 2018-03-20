<?php
function connexion_bdd()
	try
    {
	   // On se connecte à MySQL
	   $bdd = new PDO('mysql:host=localhost;dbname=fredi;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
	   // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
?>


