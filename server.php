<?php 
require_once "connexionPDO.php";

/********** CLASSE USERS *************/
Class Users{

	public function getUsers(){
		//Connexion PDO
		$connect = new ConnectionPDO();
		$connect = $connect->getConnexionPDO();

		$req = $connect->prepare("SELECT * FROM Users");
		$req->execute(); 
		$donnees = $req->fetchAll();
		return $donnees;
	}

	public function getUsersById($idUsers){
		//Connexion PDO
		$connect = new ConnectionPDO();
		$connect = $connect->getConnexionPDO();

		$req = $connect->prepare("SELECT * FROM Users WHERE idUsers='".$idUsers."'");
		$req->execute(); 
		$donnees = $req->fetch();
		return $donnees;
	}

	public function setUsers($nom, $prenom, $dateNaissance, $email, $pwd, $pwd1){
		//Connexion PDO
		$msg="";
		$connect = new ConnectionPDO();
		$connect = $connect->getConnexionPDO();
		if ($pwd==$pwd1) {
			$req = $connect->prepare("INSERT INTO Users(nom, prenom, dateNaissance, email, mdp, photo, statut, dateInscrit) VALUES(:nom, :prenom, :dateNaissance, :email, :pwd, 'profile.png', 0, :dateInscrit)");
			$req->bindParam(':nom', $nom);
			$req->bindParam(':prenom', $prenom);
			$req->bindParam(':dateNaissance', $dateNaissance);
			$req->bindParam(':email', $email);
			$req->bindParam(':pwd', md5($pwd));
			$req->bindParam(':dateInscrit', date("Y-m-d H:i:s"));
			$req->execute();
			$msg="Vous êtes inscrits! Veuillez patientez, vous allez être redirigé vers l'espace TCHAT !";
		}else{
			$msg="Les deux mots de passe ne sont pas identiques";
		}
		return $msg;
	}

	public function setUpdatePhoto($idUsers, $file_upload_tmp){
		$msg=""; 
		//Connexion PDO
		$connect = new ConnectionPDO();
		$connect = $connect->getConnexionPDO();
		//Nom du fichier recuperer
	    $fic = $_FILES['file']['name'];
	    $fic_tmp= $file_upload_tmp;
	    $infos = pathinfo($fic);
	    $extension=$infos['extension'];

	    $fichier = date("dmY_His").".".$extension;

	    copy($fic_tmp, "../images/".$fichier);
		
	    $req = $connect->prepare("UPDATE Users SET photo='".$fichier."' WHERE idUsers=1");
		$req->execute();
		$msg="Photo mise à jour!";
		return $msg;
	}

	public function setUpdateInfosPerso($idUsers, $nom, $prenom, $dateNaissance){
		$msg="";
		//Connexion PDO
		$connect = new ConnectionPDO();
		$connect = $connect->getConnexionPDO();

		$req = $connect->prepare("UPDATE Users SET nom='".$nom."', prenom='".$prenom."', dateNaissance='".$dateNaissance."' WHERE idUsers='".$idUsers."'");
		$req->execute(); 
		$msg="Données mises à jour!";
		return $msg;
	}

	public function setUpdateCoordonnesTout($idUsers, $email, $pwdActuelle, $pwd, $pwd1){
		$msg="";
		//Connexion PDO
		$connect = new ConnectionPDO();
		$connect = $connect->getConnexionPDO();

		$req = $connect->prepare("UPDATE Users SET email='".$email."', mdp='".md5($pwd)."' WHERE idUsers='".$idUsers."'");
		$req->execute(); 
		$msg="Coordonnées mises à jour!";
		return $msg;
	}

	/*Modification du mot de passe*/
	public function setUpdateCoordonnesMdp($email, $pwd){
		//Connexion PDO
		$connect = new ConnectionPDO();
		$connect = $connect->getConnexionPDO();

		$req = $connect->prepare("UPDATE Users SET  mdp='".md5($pwd)."' WHERE email='".$email."'");
		$req->execute(); 
	}


	public function setUpdateCoordonnesEmail($idUsers, $email, $pwdActuelle){
		$msg="";
		//Connexion PDO
		$connect = new ConnectionPDO();
		$connect = $connect->getConnexionPDO();

		$req = $connect->prepare("UPDATE Users SET email='".$email."' WHERE idUsers='".$idUsers."'");
		$req->execute(); 
		$msg="Adresse email mise à jour!";
		return $msg;
	}

	public function setUsersSup($idUsers){
		$msg="";
		//Connexion PDO
		$connect = new ConnectionPDO();
		$connect = $connect->getConnexionPDO();

		$req = $connect->prepare("DELETE FROM Users WHERE idUsers='".$idUsers."'");
		$req->execute(); 
		$msg="Votre compte a été supprimé avec succès. Vous allez être déconnecté automatiquement";
		return $msg;
	}

	/*Retourne le comptage selon l'adresse email*/
	public function getCountUsersByEmail($mail){
		//Connexion PDO
		$connect = new ConnectionPDO();
		$connect = $connect->getConnexionPDO();

		$req = $connect->prepare("SELECT * FROM Users WHERE email='".$mail."'");
		$req->execute(); 
		$count = $req->rowCount();
		return $count;
	}

	/*Retourne les données selon l'adresse email*/
	public function getUsersByEmail($mail){
		//Connexion PDO
		$connect = new ConnectionPDO();
		$connect = $connect->getConnexionPDO();

		$req = $connect->prepare("SELECT * FROM Users WHERE email='".$mail."'");
		$req->execute(); 
		$donnees = $req->fetch();
		return $donnees;
	}

	/*Insertion dans la base de données*/
	public function setUsersEmail($nom,$prenom,$dateN,$mail,$mdp){

		//Connexion PDO
		$connect = new ConnectionPDO();
		$connect = $connect->getConnexionPDO();

		$insert_User = $connect->prepare("INSERT INTO `Users`(`nom`, `prenom`, `dateNaissance`, `email`, `mdp`, `dateInscrit`) VALUES (:nom,:prenom,:datenaisse,:email,:mdp, NOW())");
		$insert_User->bindParam(':nom', $nom);
		$insert_User->bindParam(':prenom', $prenom);
		$insert_User->bindParam(':datenaisse', $dateN);
		$insert_User->bindParam(':email', $mail);
		$insert_User->bindParam(':mdp', $mdp);
		$insert_User->execute();
	}



}
$Users = new Users();


/*CONSTRUCTION D'UN MOT DE PASSE OUBLIÉ POUR 8 CARACTERES*/
function GeraHash(){
	
	$Caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMOPQRSTUVXWYZ0123456789@*';
	$QuantidadeCaracteres = strlen($Caracteres);
	$QuantidadeCaracteres--;

	$Hash=NULL;
	    for($x=1;$x<=8;$x++){
	        $Posicao = rand(0,$QuantidadeCaracteres);
	        $Hash .= substr($Caracteres,$Posicao,1);
	    }

	return $Hash;
}


/************FONCTIONS QUI VÉRIFIENT LES SESSIONS*********/


function verifSession_if_Off(){
	if (!isset($_SESSION['id'])) {
		header('Location: ../');
		exit;
	}
}

/********** CLASSE MESSAGE *************/
Class Message{

	/*Fonction qui retourne les messages*/
	public function getMessage($idUser1, $idUser2){

		//Connexion PDO
		$connect = new ConnectionPDO();
		$connect = $connect->getConnexionPDO();
/*select U1.nom, U2.nom from message M INNER JOIN users U1 ON M.idUsers1=U1.idUsers INNER JOIN users U2 ON M.idUsers2=U2.idUsers WHERE (`idUsers1`="1" AND `idUsers2`="8") OR (`idUsers1`="8" AND `idUsers2`="1") ORDER BY dateM ASC
*/
		$req = $connect->prepare(" SELECT *, DATEDIFF(NOW(), dateM) AS datedif, DATE_FORMAT(dateM, '%a %e %b %Y à %H:%i') AS date_annee, DATE_FORMAT(dateM, '%a %e %b à %H:%i') AS date_mois, DATE_FORMAT(dateM, '%a à %H:%i') AS date_semaine, DATE_FORMAT(dateM, '%H:%i') AS date_jour FROM message M INNER JOIN users U1 ON M.idUsers1=U1.idUsers  WHERE (`idUsers1`=".$idUser1." AND `idUsers2`=".$idUser2.") OR (`idUsers1`=".$idUser2." AND `idUsers2`=".$idUser1.") ORDER BY dateM ASC");
		$req->execute();
		$donnees = $req->fetchAll();
		return $donnees;
	}

	/*Fonction qui retroune le comptage des messages*/
	public function getMessageCount($idUser1, $idUser2){

		//Connexion PDO
		$connect = new ConnectionPDO();
		$connect = $connect->getConnexionPDO();

		$req = $connect->prepare(" SELECT * FROM `message` WHERE (`idUsers1`=".$idUser1." AND `idUsers2`=".$idUser2.") OR (`idUsers1`=".$idUser2." AND `idUsers2`=".$idUser1.")");
		$req->execute();
		$donnees = $req->rowCount();
		return $donnees;
	}

	public function setMessage($idUser1, $idUser2, $msg){

		//Connexion PDO
		$connect = new ConnectionPDO();
		$connect = $connect->getConnexionPDO();

		$req = $connect->prepare("INSERT INTO `message` (`dateM`, `libelleM`, `idUsers1`, `idUsers2`) VALUES (NOW(), :message, :idUser_envoyer, :idUser_recevoir)");
		$req->bindParam(':message', $msg);
		$req->bindParam(':idUser_envoyer', $idUser1);
		$req->bindParam(':idUser_recevoir', $idUser2);
		$req->execute();
	}
}
$Message = new Message();