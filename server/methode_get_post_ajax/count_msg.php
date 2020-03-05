<?php
	require_once "../../server.php";

	$nb = $Message->getMessageCount($_GET['iduser1'], $_GET['iduser2']);
	$nbJson = array('nbMsge' => $nb['nbMessage'], 'prenom'=>$nb['prenom_user2']);

	echo json_encode($nbJson);
?>