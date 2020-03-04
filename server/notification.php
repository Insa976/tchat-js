<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once "../server.php";

if(!isset($_SESSION["id"])){
	header("Location:../");
}else{
	$msgUser = new Message();
	$nbMsg = $msgUser->getNbMsgByUser1($_SESSION["id"]);

	$arr = array(
		'nbM' => $nbMsg["nbMsg"], 
		'nom' => $nbMsg["nom"], 
		'prenom' => $nbMsg["prenom"] 
	);
	echo json_encode($arr);
}
