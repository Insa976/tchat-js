<?php 
	if (session_status() == PHP_SESSION_NONE) session_start();
	if (isset($_SESSION['id'])){
		header('Location: ./');
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
						<!-- <li class="nav-item active"><a href="#" class="nav-link"><i class="fa fa-comments-o fa-lg"></i><span class="badge">10</span></a></li>
						<li class="nav-item"><a href="#" data-toggle="modal" data-target="#inscriptionModal" class="nav-link"><i class="fa fa-user-plus"></i> S'inscrire</a></li>
						<li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-user-circle-o"></i> N. Prénom</a></li>
						<li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-sign-in"></i> Se connecter</a></li>
						<li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-sign-out"></i> Déconnexion</a></li> -->
					</ul>
				</div>
			</div>
		</nav>


		<section class="py-2 text-center">
			<h1>Mot de passe oublié</h1>
		</section>


		<section class="py-3">
			<div class="container">
				<span id="messageMdp">
					
				</span>
				<div class="row">
					<div class="col-md-8">
						<div class="card">
							<div class="card-header">
								<h2>Identifiants</h2>
							</div>
							<div class="card-body">
								<form id="formulaireMdp">
									<div class="form-group">
										<label for="email">Indiquez votre adresse email : </label>
										<input type="email" class="form-control" placeholder="mon_mail@gmail.com" id="email" onkeyup="validChamps(this);">
									</div>
									<button type="submit" class="btn btn-primary">Envoyer un mot de passe</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card">
							<div class="card-header">
								<h2>Infos</h2>
							</div>
							<div class="card-body">
								<h4>Renvois de vos identifiants par mail :</h4>
								<ul>
									<li>Adresse email</li>
									<li>Mot de passe</li>
								</ul>
							</div>
						</div>
					</div>
				</div>	
	  		</div>
		</section>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
	  	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	  	<!-- JS Pour le mdp oublié -->
	    <script type="text/javascript" src="js/mdp.js"></script>
	</body>
</html>
