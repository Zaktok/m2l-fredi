<?php
$ajout = $pdo->ajoutClient($_REQUEST["numCli"],$_REQUEST["nomCli"]);
if ($ajout == 0){
	$erreur = "Le client n'a pas &eacute;t&eacute; ajout&eacute;. Le num&eacute;ro du nouveau client existait peut-&ecirc;tre d&eacute;j&agrave;.";
	$_SESSION["numCli"]=$_REQUEST["numCli"];
	$_SESSION["nomCli"]=$_REQUEST["nomCli"];
}
?>