<?php
class PdoFact{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=factures';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoFact=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
    	PdoFact::$monPdo = new PDO(PdoFact::$serveur.';'.PdoFact::$bdd, PdoFact::$user, PdoFact::$mdp); 
		PdoFact::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoFact::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoFact = PdoFact::getPdoFact();
 
 * @return l'unique objet de la classe PdoFact
 */
	public  static function getPdoFact(){
		if(PdoFact::$monPdoFact==null){
			PdoFact::$monPdoFact= new PdoFact();
		}
		return PdoFact::$monPdoFact;  
	}

	/**
	 * Vérifie que le nom et mot de passe correspond bien à un utilisateur
	
	 * @param $id Nom d'utilisateur
	 * @param $mdp Mot de passe de l'utilisateur
	 * @return vrai si l'utilisateur existe, faux sinon
	 */
	function verifid($id, $mdp) {
		$req = "select * from Utilisateur where Id = '$id' and MotDePasse = '$mdp'";
		$res = PdoFact::$monPdo->query($req);

		if (count($res)>0) {
			return true;
		}
		else
			return false;

	}
	
/**
 * Retourne la liste des clients
 * @return le numéro et le nom sous la forme d'un tableau associatif 
*/
	public function getListeClients(){
		$req = "select * from client";
		$res = PdoFact::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
/**
* Ajoute un client
* @param $num numéro du client
* @param $nom nom du client
* @return 1 si l'ajout est rélisé, 0 sinon. 
*/
	public function ajoutClient($num,$nom){
		$req = "insert into client	values($num,'$nom')";
		$ok = PdoFact::$monPdo->exec($req);
		return $ok;
	}
	
/**
 * Modifie le nom d'un client
 * @param $num numéro du client
 * @param $nom nom du client
 * @return 1 si la modification est rélisée, 0 sinon.
 */
	public function modificationClient($num, $nom){
		$req = "update client set NomCli='$nom' where NumCli=$num ";
		$ok = PdoFact::$monPdo->exec($req);
		return $ok;
	}	
	
/**
 * Supprime un client
 * @param $num numéro du client
 * @return 1 si la suppression est rélisée, 0 sinon.
 */
	public function suppressionClient($num){
		$req = "delete from client	where NumCli=$num";
		$ok = PdoFact::$monPdo->exec($req);
		return $ok;
	}
	
	/**
	 * Retourne la liste des produits
	 * @return le numéro, le libellé et le prix unitaire sous la forme d'un tableau associatif
	 */
	public function getListeProduits(){
		$req = "select * from Produit";
		$res = PdoFact::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	
	/**
	 * Ajoute un produit
	 * @param $num numéro du produit
	 * @param $lib libellé du produit
	 * @param $pu prix unitaire du produit
	 * @return 1 si l'ajout est rélisé, 0 sinon.
	 */
	public function ajoutProduit($num,$lib, $pu){
		$req = "insert into produit	values($num,'$lib',$pu)";
		$ok = PdoFact::$monPdo->exec($req);
		return $ok;
	}
	
	/**
	 * Modifie le libellé et le prix unitaire d'un produit
	 * @param $num numéro du produit
	 * @param $lib libellé du produit
	 * @param $pu prix unitaire du produit
	 * @return 1 si la modification est rélisée, 0 sinon.
	 */
	public function modificationProduit($num, $lib, $pu){
		$req = "update produit set LibProd='$lib', PUProd=$pu where NumProd=$num ";
		$ok = PdoFact::$monPdo->exec($req);
		return $ok;
	}
	
	/**
	 * Supprime un produit
	 * @param $num numéro du produit
	 * @return 1 si la suppression est rélisée, 0 sinon.
	 */
	public function suppressionProduit($num){
		$req = "delete from produit	where NumProd=$num";
		$ok = PdoFact::$monPdo->exec($req);
		return $ok;
	}	
	
	
	/**
	 * Retourne la liste des factures
	 * @return le numéro, la date de la facture et le nom du client sous la forme d'un tableau associatif
	 */
	public function getListeFactures(){
		$req = "select NumFact, DateFact, NumCli, NomCli from facture, client where Client=NumCli";
		$res = PdoFact::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	/**
	 * Retourne la liste des factures
	 * @return le numéro, la date de la facture et le nom du client sous la forme d'un tableau associatif
	 */
	public function getDetailsFacture($numFact){
		$req = "select Facture, Produit, Qte, LibProd, PUProd from composer, produit where Produit=NumProd and Facture=$numFact";
		$res = PdoFact::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	/**
	 * Ajoute une Facture
	 * @param $num numéro de la facture
	 * @param $date date de la facture
	 * @param $cli numéro du client
	 * @return 1 si l'ajout est rélisé, 0 sinon.
	 */
	public function ajoutFacture($num,$date, $cli){
		$req = "insert into facture	values($num,'$date', $cli)";
		$ok = PdoFact::$monPdo->exec($req);
		return $ok;
	}
	
	/**
	 * Modifie la date et le client d'une facture
	 * @param $num numéro de la facture
	 * @param $date date de la facture
	 * @param $cli numéro du client
	 * @return 1 si la modification est rélisée, 0 sinon.
	 */
	public function modificationFacture($num, $date, $cli){
		$req = "update facture set DateFact='$date', Client=$cli where NumFact=$num ";
		$ok = PdoFact::$monPdo->exec($req);
		return $ok;
	}
	
	/**
	 * Met à jour les lignes de la facture
	 * @param $num numéro de la facture
	 * @param $produits tableau des produits de la facture
	 * @param $qte tableau des quantitées de produit
	 * @return 1 si la modification est rélisée, 0 sinon.
	 */
	public function majLignesFacture($num, $produits, $qte){
		//Suppression des lignes de la facture
		$req = "delete from composer where Facture=$num";
		PdoFact::$monPdo->exec($req);
		// Ajout des lignes de la facture
		$ok = true; $i=0;
		foreach($produits as $p) {
			$req = "insert into composer values($num,$p, $qte[$i])";
			if (PdoFact::$monPdo->exec($req)<1)
				$ok=false;
			$i++;
		}
		return $ok;
	}
	
	/**
	 * Supprime une facture
	 * @param $num numéro de la facture
	 * @return 1 si la suppression est rélisée, 0 sinon.
	 */
	public function suppressionFacture($num){
		//Suppression des lignes de la facture
		$req = "delete from composer where Facture=$num";
		PdoFact::$monPdo->exec($req);
		//Suppression de la facture
		$req = "delete from facture	where NumFact=$num";
		$ok = PdoFact::$monPdo->exec($req);
		return $ok;
	}
}

?>