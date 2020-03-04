<?php
/********** CONNEXION PDO *************/
class ConnectionPDO{
	public function getConnexionPDO(){
		//En cas succès
		try{
			//Nous allons établir une connexion de notre base de données
			$tchat_js= new PDO('mysql:host=localhost:3308;dbname=tchat;charset=utf8', 'root', '');
			$tchat_js->query(" SET NAMES utf8");
			$tchat_js->query(" SET lc_time_names = 'fr_FR'");
			return $tchat_js;
		}//En cas d'erreur
		catch (Exception $e){
			die('Erreur lors de connexion de BDD: ' . $e->getMessage());
		}
	}
}