<?php
	if (session_status() == PHP_SESSION_NONE) session_start();
	require_once "../server.php";
	if(!isset($_SESSION["id"])) header("Location:../profil/");

	/********* UPLOAD PHOTO *********/
	if (!$_POST && (file_exists($_FILES['file']['tmp_name']) || is_uploaded_file($_FILES['file']['tmp_name']))){ 

		$user =$Users->getUsersById($_SESSION["id"]); //On récupere les infos de l'utilisateur dont l'id est passé en parametre
		//Si la photo actuelle de l'utilisateur est differente de la photo par défault
		if($user["photo"]!="profil-defaut.png"){
			// filename prend le chemin de la photo
			$filename = '../images/'.$user["photo"];
			//Si la photo existe sur le serveur
			if (file_exists($filename)) {
				unlink('../images/'.$user["photo"]); //On supprime la photo
			}
		}
		//Nous allons ici modifier notre photo 
		$leMsg = $Users->setUpdatePhoto(2, $_FILES['file']['tmp_name']);
		echo $leMsg;
	}

	/********* INFOS PERSO ***********/
	if(isset($_POST["updateInfos"])){
		$leMsg = $Users->setUpdateInfosPerso($_SESSION["id"], $_POST["nom"], $_POST["prenom"], $_POST["dateNaissance"]);
		echo $leMsg;
	}

	/************* COORDONNÉES ************/
	// Si on modifie juste l'adresse email
	if(isset($_POST["updateCoordEmail"])){
		$leMsg = $Users->setUpdateCoordonnesEmail($_SESSION["id"], $_POST["email"], $_POST["pwd_actuel"]);
		echo $leMsg;
	}

	//Si on modifie juste tout
	if(isset($_POST["updateCoordTout"])){
		$leMsg = $Users->setUpdateCoordonnesTout($_SESSION["id"], $_POST["email"], $_POST["pwd_actuel"], $_POST["pwd1"], $_POST["pwd2"]);
		echo $leMsg;
	}

	/************* SUPPRESSION DU COMPTE ************/
	if(isset($_POST["setUsersSup"])){
		$leMsg = $Users->setUsersSup($_SESSION["id"]);
		echo $leMsg;
	}