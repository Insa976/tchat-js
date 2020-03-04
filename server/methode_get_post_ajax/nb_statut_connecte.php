<?php
	require_once "../../server.php";

	$nb = $Users->getNbStatutConnexion();
	$nbJson = array('nbStatutNonConnecte' => $nb);

	echo json_encode($nbJson);
?>