<?php include("controleurs/c_listeClients.php"); 
// Gestion du réaffichage des valeurs saisies dans le formulaire
if (isset($_SESSION["numCli"])) {
	$numCli=$_SESSION["numCli"];
	$nomCli=$_SESSION["nomCli"];
}
else {
	$numCli="";
	$nomCli="";
}
?>

<div class="operation">

<h2>Saisie d'un nouveau client</h2>

<form action="index.php?uc=faireAjoutClient" method="post">
<table border="0">
	<tr>
		<td width="108">Num&eacute;ro</td>
		<td width="105"><input type="text"  name="numCli" value="<?php echo $numCli; ?>" size="4" maxlength="4"/></td>
	</tr>
			
	<tr>
		<td width="108">Nom</td>
		<td width="105"><input type="text" name="nomCli" value="<?php echo $nomCli; ?>"size="30" maxlength="30"/> </td>
	</tr>
</table>
<input type="submit" value="Ajouter">
</form>
</div>

<?php 

unset($_SESSION["numCli"]);
unset($_SESSION["nomCli"]);

?>