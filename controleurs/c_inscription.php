<?php
$ajout = $pdo->ajoutAdh($_REQUEST["numAdh"],$_REQUEST["mailAdh"],$_REQUEST['mdpAdh'],$_REQUEST["nomAdh"],$_REQUEST["prenAdh"],$_REQUEST["adrAdh"],$_REQUEST["cpAdh"],$_REQUEST["villeAdh"],0);
if ($ajout == 0){
	$erreur = "Le client n'a pas &eacute;t&eacute; ajout&eacute;. Le num&eacute;ro du nouveau client existait peut-&ecirc;tre d&eacute;j&agrave;.";
	$_SESSION["numAdh"]=$_REQUEST["numAdh"];
	$_SESSION["mailAdh"]=$_REQUEST["mailAdh"];
    $_SESSION["mdpAdh"]=$_REQUEST["mdpAdh"];
    $_SESSION["nomAdh"]=$_REQUEST["nomAdh"];
	$_SESSION["prenAdh"]=$_REQUEST["prenAdh"];
    $_SESSION["adrAdh"]=$_REQUEST["adrAdh"];
	$_SESSION["cpAdh"]=$_REQUEST["cpAdh"];
    $_SESSION["villeAdh"]=$_REQUEST["villeAdh"];
    header('Refresh: 5; URL=index.php?uc=inscription');
}
else{
    header("location:index.php");
}
?>
