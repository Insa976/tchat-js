<?php 
	// Connexion de la base de données
	require_once "../server.php";

	if (isset($_POST['envoyer'])) {

		$mail = $_POST['email_con'];
		$mdp = md5($_POST['mdp_con']);
		$message = "";
		$redirection = "";
		
		$user = $Users->getUsersByEmail($mail);

		/*Vérification des informations de l'utilisateur*/
		if ($user['email'] == $mail) {
			if ($user['mdp'] == $mdp) {
				$message .= '<div class="p-3 mb-2 bg-success text-white">Vous êtes connecté !</div>';
				$redirection .='<meta http-equiv="refresh" content="1;URL=./">';
				session_start();
				$_SESSION['id'] = $user['idUsers'];
			}
			else{
				$message .= '<div class="p-3 mb-2 bg-warning text-white">Votre mot de passe n\'est pas correcte !</div>';
			}
		}else{
			$message .= '<div class="p-3 mb-2 bg-danger text-white">Votre adresse email n\'existe pas dans notre base de données ! Veuillez créer un compte !</div>';
		}

		$arr = array('msg' => $message, 'redirection' => $redirection);
		echo json_encode($arr);
	}
?>




	

