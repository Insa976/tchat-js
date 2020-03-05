<?php 
	// Connexion de la base de données
	require_once "../server.php";

	if (isset($_POST['envoyer'])) {

		$mail = $_POST['email_mdp'];

		$mdp = GeraHash();
		$message = "";
		$redirection = "";
		
		$user = $Users->setUpdateCoordonnesMdp($mail, $mdp);

		$user = $Users->getUsersByEmail($mail);

		/*Vérification des informations de l'utilisateur*/
		if ($user['email'] == $mail) {
			$subject = 'Tchat-JS : Identifiant et mot de passe';
			$message .= "<!DOCTYPE html>
						<html>
						<head>
							<title>Identifiants</title>
						</head>
						<body>
							<p>Madame, Monsieur,</p>
							<p>
								Suite à votre inscription effectuée sur notre site, nous vous communiquons vos identifiants pour vous connecter sur votre compte Tchat-JS.
							</p>
							<p>
								Connectez vous à votre espace client via ce lien : <a href='http://inssa-insa.ascmtsahara.fr/projet-js/' target='_blank'>http://inssa-insa.ascmtsahara.fr/projet-js/</a>.
								<ul>
									<li>Identifiant : ".$mail."</li>
									<li>Mot de passe : ".$mdp."</li>
								</ul>
							</p>
							<p>
								Nous vous remercions de la confiance que vous nous accordez.
							</p>
						</body>
						</html>";
				$headers = 'From: noreply@tchat-js.com' . "\r\n" .
						'Reply-To: noreply@tchat-js.com' . "\r\n" .
						'Content-Type: text/html; charset="utf-8';

			mail($mail, $subject, $message, $headers);

			$arr = array('adresseEmail' => $mail);
			echo json_encode($arr);

		}
	}
?>


