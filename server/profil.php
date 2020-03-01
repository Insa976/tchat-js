<?php
require_once "../server.php";

/********* UPLOAD PHOTO *********/
if (!$_POST && (file_exists($_FILES['file']['tmp_name']) || is_uploaded_file($_FILES['file']['tmp_name']))){ 
	$leMsg = $Users->setUpdatePhoto(1, $_FILES['file']['tmp_name']);
	echo $leMsg;
}

/********* INFOS PERSO ***********/
if(isset($_POST["updateInfos"])){
	$leMsg = $Users->setUpdateInfosPerso(1, $_POST["nom"], $_POST["prenom"], $_POST["dateNaissance"]);
	echo $leMsg;
}

/************* COORDONNÉES ************/
// Si on modifie juste l'adresse email
if(isset($_POST["updateCoordEmail"])){
	$leMsg = $Users->setUpdateCoordonnesEmail(1, $_POST["email"], $_POST["pwd_actuel"]);
	echo $leMsg;
}

//Si on modifie juste tout
if(isset($_POST["updateCoordTout"])){
	$leMsg = $Users->setUpdateCoordonnesTout(1, $_POST["email"], $_POST["pwd_actuel"], $_POST["pwd1"], $_POST["pwd2"]);
	echo $leMsg;
}

/************* SUPPRESSION DU COMPTE ************/
if(isset($_POST["setUsersSup"])){
	$leMsg = $Users->setUsersSup(2);
	echo $leMsg;
}