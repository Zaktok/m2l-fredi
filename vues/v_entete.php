<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <title>Gestion des factures</title>
    <meta http-equiv="content-type" content="text/html; charset=utf8" />
    <link href="./styles/styles.css" rel="stylesheet" type="text/css" />
 </head>
 <body>
 	<div id="bandeau">Gestion des factures</div>
 	<div id="deconnexion">
	<?php
	if (isset($_SESSION["sessid"]))
		echo "<a href='index.php?uc=faireDeconnexion'> D&eacute;connexion </a>";
	?>
	</div>
 	<div id="menu">
 		<a href="index.php?uc=faireIndentification"> Indentification </a>
 		<a href="index.php?uc=ajoutProduit"> Produits </a>
 	</div>
     <div id="corps">

