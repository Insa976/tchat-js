<?php
	require_once "../../server.php";

	$nb = $Message->getMessageCount($_GET['iduser1'], $_GET['iduser2']);
	$nbJson = array('nbMsge' => $nb);

	echo json_encode($nbJson);
?>