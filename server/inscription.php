<?php 
	// Connexion de la base de données
	require_once "../server.php";

	if (isset($_POST['envoyer'])) {
		$nom = $_POST['nom_ins'];
		$prenom = $_POST['prenom_ins'];
		$dateN = $_POST['dateN_ins'];
		$mail = $_POST['email_ins'];
		$mdp = md5($_POST['mdp_ins']);

		$count = $Users->getCountUsersByEmail($mail);

		if ($count < 1) {
			/*INSERTION DANS LA BASE DE DONNÉES */
			$Users->setUsersEmail($nom,$prenom,$dateN,$mail,$mdp);
			$arr = array('resultat' => 'Inscrit');
		}else{
			$arr = array('resultat' => 'NonInscrit'/*, 'nom' => $nom, 'prenom' => $prenom, 'dateN' => $dateN, 'mail' => $mail, 'mdp' => $_POST['mdp_ins']*/);
		}

		echo json_encode($arr);
	}
?>



	

