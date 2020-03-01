<?php
/********** CONNEXION PDO *************/
class ConnectionPDO{
	public function getConnexionPDO(){
		$host='localhost:3308';
		$db='tchat';
		$user='root';
		$pass='';
		//En cas succès
		try{
			//Nous allons établir une connexion de notre base de données
			$tchat_js= new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8', $user, $pass);
			$tchat_js->query(" SET NAMES utf8");
			$tchat_js->query(" SET lc_time_names = 'fr_FR'");
			return $tchat_js;
		}//En cas d'erreur
		catch (Exception $e){
			die('Erreur lors de connexion de BDD: ' . $e->getMessage());
		}
	}
}