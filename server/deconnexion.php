<?php
	// Initialisation de la session.
	// Si vous utilisez un autre nom
	// session_name("autrenom")
	session_start();
	// Connexion de la base de données
	require_once "../server.php";
	$Users->setUpdateStatut($_SESSION['id'],0);

	// Détruit toutes les variables de session
	$_SESSION = array();


	// Finalement, on détruit la session.
	session_destroy();
	// Destruction du tableau de session
	unset($_SESSION);
	echo "<p style='text-align: center; top: 40px; vertical-align: middle; width: 100%; font-size: 20px;'>Déconnexion en cours . . .</p>";
	header("Refresh: 2; url=../");


	
	exit;
?>

