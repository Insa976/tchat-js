<?php
	if (session_status() == PHP_SESSION_NONE) session_start();
	require_once "server.php";
	if (isset($_SESSION['id'])) {
		$user = $Users->getUsersById($_SESSION['id']);
	}	
?>
<!DOCTYPE html>
	<html>
	<head id="le_head">
		<title>Tchat - JS</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<meta name="description" content="">
	  	<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
	  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
	  	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  	<style type="text/css">
	  		#liste_tchatter{
	  			height: 200px;
	  			overflow-y: auto;
	  			overflow-x: hidden;
	  		}
			.statut_connecte{
				border:3px solid green;
			}

			.statut_non_connecte{
				border:3px solid red;
			}
	  	</style>
	</head>
	<body>
		<!-- NAVBAR-->
		<nav class="navbar sticky-top navbar-expand-lg py-3 navbar-dark bg-dark shadow-sm">
			<div class="container">
				<a href="./" class="navbar-brand">
				<!-- Logo Image -->
				<img src="images/logo.png" width="45" alt="" class="d-inline-block align-middle mr-2">
				<!-- Logo Text -->
				<span class="font-weight-bold">Tchat - JS</span>
				</a>

				<button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

				<div id="navbarSupportedContent" class="collapse navbar-collapse text-center">
					<ul class="navbar-nav ml-auto">
						
						
						<?php if(!isset($_SESSION['id'])){ ?>
							<li class="nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#inscriptionModal"><i class="fa fa-user-plus"></i> S'inscrire</a></li>&nbsp;
							<li class="nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#connexionModal"><i class="fa fa-sign-in"></i> Se connecter</a></li>&nbsp;
						<?php }else { ?>
							<li class="nav-item"><a href="tchat/" class="nav-link"><i class="fa fa-comments-o fa-lg"></i> Tchatter</a></li>&nbsp;
							<li class="nav-item"><a href="profil/" class="nav-link" title="Profil"><i class="fa fa-user-circle-o"></i> <?php echo substr($user['nom'],0,1).". ".$user['prenom'] ;?></a></li>&nbsp;
							<li class="nav-item"><a href="server/deconnexion.php" class="nav-link"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</nav>


		<section class="py-2 text-center">
			<h1>Bienvenue sur Tchat-JS</h1>
		</section>


		<section class="py-3">
			<div class="container">
				<div class="row">
					<div class="col-md-6" align="center">
						<img src="images/espace-tchat.png" class="center-block" alt="Application mobile Tchat JS">
					</div>
					<div class="col-md-6">
						<p>
                            <strong>Tchat-JS</strong>, qui désigne Tchat pour JavaScript. Notre application Tchat-JS permet à deux personnes de discuter virtuellement par écran interposé en étant connecté.
                        </p>
                        <p>
                        	Pour poster un message à un utilisateur B, l'utilisateur A doit s'inscrire. Il doit ensuite se connecter pour voir la liste des utilisateurs inscrits (connectés ou déconnectés). Et enfin laisser un message à l'utilisateur B. 
                        </p>
                        <?php if(!isset($_SESSION['id'])){ ?>
							<div class="form-group"><button type="button" class="btn btn-primary bouton-page_accueil center-block form-control" data-toggle="modal" data-target="#inscriptionModal">S'inscrire maintenant</button></div>
                        	<div class="form-group"><button type="button" class="btn btn-primary bouton-page_accueil center-block form-control" data-toggle="modal" data-target="#connexionModal">Je suis déjà membre</button></div>
						<?php }else { ?>
							<h3 class="text-center">Tchatter rapidement</h3>
							<div class="card bg-info">
								<div class="card-header">
									<input type="text" id="rechercher" class="form-control" placeholder="Rechercher une personne ...">
								</div>
								<ul class="list-group" id="liste_tchatter">
		
								</ul>
							</div>

						<?php } ?>
                       
					</div>
				</div>	
	  		</div>
		</section>

		<section class="py-3">
			<div class="container">
				<div class="row" id="resultat">
					
				</div>	
	  		</div>
		</section>


		<div id="connexionModal" class="modal fade" role="dialog">
	        <div class="modal-dialog  modal-dialog-centered">

	            <!-- Modal content-->
	            <div class="modal-content">
	            	<form id="formulaireConnexion">
		            	<div class="modal-header">
		                    <h4 class="modal-title">Connexion</h4>
		                    <button type="button" class="close" data-dismiss="modal">&times;</button>
		                </div>
		                <div class="modal-body cadre-deco">

		                    <span id="messageConnexion">
		                    	<ul id="mere_liste_liConnec">
		                    		<!-- Ici la liste des messages des champs après avoir cliquer inscription -->
		                    	</ul>
		                    </span>

		                    <div class="form-group">
		                        <label for="email">Adresse email:</label>
		                        <input type="email" class="form-control" id="email" onkeyup="validChamps(this);">
		                    </div>
		                    <div class="form-group">
		                        <label for="pwd">Mot de passe :</label>
		                        <input type="password" class="form-control" id="pwd" onkeyup="validChamps(this);">
		                    </div>
		                    <span class="text-center"><a href="./mdp_oublie.php">Mot de passe oublié ?</a></span>
		                </div>
		                <div class="modal-footer cadre-deco">
		                    <button type="submit"  class="btn btn-primary center-block">Se connecter</button>
		                </div>
	            	</form>
	            </div>
	        </div>
	    </div>

	    <!-- Modal INSCRIPTION-->
	    <div id="inscriptionModal" class="modal fade" role="dialog">
	        <div class="modal-dialog  modal-dialog-centered">

	            <!-- Modal content-->
	            <div class="modal-content">
	            	<form id="formulaireInscription">
		                <div class="modal-header">
		                    <h4 class="modal-title">Inscription</h4>
		                    <button type="button" class="close" data-dismiss="modal">&times;</button>
		                </div>
		                <div class="modal-body cadre-deco" id="corpModalInscrit">


		                    <span id="messageInscription">
		                    	<ul id="mere_liste_li">
		                    		<!-- Ici la liste des messages d'erreurs des champs après avoir cliquer inscription s'il y en a -->
		                    	</ul>
		                    </span>

		                
		                    <div class="form-group">
		                        <label for="nom">Nom : </label>
		                        <input type="nom" class="form-control" id="nom" onkeyup="validChamps(this);">
		                    </div>
		                    <div class="form-group">
		                        <label for="prenom">Prénom : </label>
		                        <input type="prenom" class="form-control" id="prenom" onkeyup="validChamps(this);">
		                    </div>
		                    <div class="form-group">
		                        <label for="email">Date de naissance :</label>
		                        <input type="date" class="form-control" id="dateNaissance" onkeyup="validChamps(this);">
		                    </div>
		                    <div class="form-group">
		                        <label for="email">Adresse email :</label>
		                        <input type="email" class="form-control" id="in_email" onkeyup="validChamps(this);">
		                    </div>
		                    <div class="form-group">
		                        <label for="pwd">Mot de passe :</label>
		                        <input type="password" class="form-control" id="in_pwd" onkeyup="validChamps(this);">
		                    </div>
		                    <div class="form-group">
		                        <label for="pwd">Confirmation de mot de passe :</label>
		                        <input type="password" class="form-control" id="in_pwd1" onkeyup="validChamps(this);">
		                    </div>
		                </div>
		                <div class="modal-footer cadre-deco">
		                    <button type="submit" class="btn btn-primary center-block" id="insciption" >S'inscrire</button>
		                </div>
		            </form>
	            </div>

	        </div>
	    </div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
	  	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	  	<!-- JS Pour l'inscription et la connection -->
	    <script type="text/javascript" src="js/ins_conn.js"></script>
	    <?php if (isset($_SESSION['id'])){ ?>
	    	<script type="text/javascript" src="js/statut_connexion_home.js"></script>
	    <?php } ?>
		<script type="text/javascript">
			$(document).ready(function(){

				$("#rechercher").on("keyup", function() {
					var value = $(this).val().toLowerCase();
					$("#liste_tchatter li").filter(function() {
						$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
					});
				});
			});
		</script>
	</body>
</html>