<?php
	require_once "../../server.php";

	$user2 = $Users->getUsersById($_GET['iduser2']);

	$arr = array('id' => $user2['idUsers'], 'nom' => $user2['nom'], 'prenom' => $user2['prenom'], 'photo' => $user2['photo'], 'statut' => $user2['statut']);

	echo json_encode($arr);
?>

	