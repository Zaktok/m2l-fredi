<?php
// Gestion du réaffichage des valeurs saisies dans le formulaire
if (isset($_SESSION["numAdh"])) {
	$numAdh=$_SESSION["numAdh"];
	$mailAdh=$_SESSION["mailAdh"];
	$mdpAdh=$_SESSION["mdpAdh"];
    $nomAdh=$_SESSION["nomAdh"];
    $prenAdh=$_SESSION["prenAdh"];
    $adrAdh=$_SESSION["adrAdh"];
    $cpAdh=$_SESSION["cpAdh"];
    $villeAdh=$_SESSION["villeAdh"];
}
else {
	$numAdh="";
	$mailAdh="";
    $mdpAdh="";
    $nomAdh="";
    $prenAdh="";
    $adrAdh="";
    $cpAdh="";
    $villeAdh="";
}
?>

<div class="operation">

<h2>Inscription</h2>

<form action="index.php?uc=faireInscription" method="post">
<table border="0">
	<tr>
		<td width="108">Num Licence</td>
		<td width="105"><input type="text"  name="numAdh" value="<?php echo $numAdh; ?>" /></td>
	</tr>
    <tr>
		<td width="108">Mail</td>
		<td width="105"><input type="text"  name="mailAdh" value="<?php echo $mailAdh; ?>" /></td>
	</tr>
	<tr>
		<td width="108">Mot de passe</td>
		<td width="105"><input type="text" name="mdpAdh" value="<?php echo $mdpAdh; ?>"/> </td>
	</tr>
	<tr>
		<td width="108">Nom</td>
		<td width="105"><input type="text" name="nomAdh" value="<?php echo $nomAdh; ?>"/> </td>
	</tr>
	<tr>
		<td width="108">Prenom</td>
		<td width="105"><input type="text"  name="prenAdh" value="<?php echo $prenAdh; ?>"/></td>
	</tr>
    <tr>
		<td width="108">Adresse</td>
		<td width="105"><input type="text"  name="adrAdh" value="<?php echo $adrAdh; ?>"/></td>
	</tr>
    <tr>
		<td width="108">Code postal</td>
		<td width="105"><input type="text"  name="cpAdh" value="<?php echo $cpAdh; ?>"/></td>
	</tr>
    <tr>
		<td width="108">Ville</td>
		<td width="105"><input type="text"  name="villeAdh" value="<?php echo $villeAdh; ?>"/></td>
	</tr>
</table>
<input type="submit" value="Ajouter">
</form>
</div>

<?php

unset($_SESSION["numAdh"]);
unset($_SESSION["mailAdh"]);
unset($_SESSION["mdpAdh"]);
unset($_SESSION["nomAdh"]);
unset($_SESSION["prenAdh"]);
unset($_SESSION["adrAdh"]);
unset($_SESSION["cpAdh"]);
unset($_SESSION["villeAdh"]);

?>
