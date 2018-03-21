<?php
header( 'content-type: text/html; charset=utf-8' );
require_once ("modele/class.pdofredi.inc.php");
session_start();
$pdo = pdofredi::getpdofredi();
include("vues/v_entete.php");
if(!isset($_REQUEST['uc'])){
     $_REQUEST['uc'] = 'indentification';
}
$uc = $_REQUEST['uc'];
switch($uc){
	case 'faireIndentification' :{
		include("controleurs/c_identification.php");
        break;
	}
        case 'faireInscription' :{
		include("controleurs/c_inscription.php");
        break;
        }
}

switch($uc){
	case 'indentification' :{
		include("vues/v_identification.php");break;
	}
        case 'inscription' :{
		include("vues/v_inscription.php");break;
	}
}

include("vues/v_pied.php") ;
?>
