<?php 
	require_once "../server.php";
	$leuser = $Users->getUsersById(1);

?>
<!DOCTYPE html>
	<html>
	<head>
		<title>Tchat - JS</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<meta name="description" content="">
	  	<link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
	  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
	  	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
		<!-- Default theme -->
		<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
		<!-- Semantic UI theme -->
		<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
		<!-- Bootstrap theme -->
		<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="../css/style_profil3.css">
	  	<style type="text/css">
	  		#annulInfos,
	  		#annulCoord,
	  		#buttonInfos,
	  		#buttonCoord, 
	  		#id_pwd1, 
	  		#id_pwd2{
				display: none;
			}
	  	</style>
	</head>
	<body>
		

		<!-- NAVBAR-->
		<nav class="navbar sticky-top navbar-expand-lg py-3 navbar-dark bg-dark shadow-sm">
			<div class="container">
				<a href="#" class="navbar-brand">
				<!-- Logo Image -->
				<img src="../images/logo.png" width="45" alt="" class="d-inline-block align-middle mr-2">
				<!-- Logo Text -->
				<span class="font-weight-bold">Tchat - JS</span>
				</a>

				<button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

				<div id="navbarSupportedContent" class="collapse navbar-collapse text-center">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a href="#" class="nav-link"><i class="fa fa-comments-o fa-lg"></i><span class="badge">10</span></a></li>
						<li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-user-plus"></i> S'inscrire</a></li>
						<li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-user-circle-o"></i> N. Prénom</a></li>
						<li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-sign-in"></i> Se connecter</a></li>
						<li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
					</ul>
				</div>
			</div>
		</nav>

		
		<div class="container-fluid">
			<div class="row corps"> 
				<div class="col-md-4 lateral-gauche py-3 align-middle">
					<div class="row">
						<div class="col-md-12 col-6">
							<div class="photoModif">
								<img src="../images/<?php echo $leuser["photo"];?>" alt="<?php echo $leuser["prenom"]." ".$leuser["nom"];?>" class="align-middle mr-2 image-profil img-fluid">
							</div>
						</div>
						<div class="col-md-12 col-6 titreModif">
							<h3><?php echo $leuser["prenom"]." ".$leuser["nom"];?></h3>
							<input type="file" id="fichier" accept="image/*">
							<button class="btn btn-primary" onclick="modificationPhoto()"><i class="fa fa-photo"></i> Modifier la photo</button>
						</div>
					</div>
				</div>
				<div class="col-md-8 lateral-droit py-3">
					<div class="card">

						<div class="card-header">
							<span style="float: left"><strong>Informations personnelles</strong></span>
							<span style="float: right;">
								<button id="modifInfos" onclick="modifierInfos(this)">modifier</button>
								<button id="annulInfos" onclick="annulInfos(this)">Annuler</button>
							</span>
						</div>

						<div class="card-body" align="center">
							<form id="formInfos">
								<div class="row">
									<div class="form-group col-md-6"><input type="text" class="form-control" id="nom" onkeyup="validChamps(this)" placeholder="Votre nom" value="<?php echo $leuser["nom"];?>" disabled></div>
									<div class="form-group col-md-6"><input type="text" class="form-control" id="prenom" onkeyup="validChamps(this)" placeholder="Votre prénom" value="<?php echo $leuser["prenom"];?>" disabled></div>
									<div class="form-group col-md-6"><label style="float: left">Date de Naissance</label><input type="date" class="form-control" id="dateNaissance" value="<?php echo $leuser["dateNaissance"];?>" onkeyup="validChamps(this)" disabled></div>
								</div>
							</form>
							<div class="form-group col-md-6" id="buttonInfos"><button type="submit" onclick="updateInfosUsers()" class="btn btn-primary form-control">Enregistrer</button></div>
						</div>

						<div class="card-header"><span style="float: left"><strong>Email et mot de passe</strong></span> 
							<span style="float: right;">
								<button id="modifCoord" onclick="modifierCoord(this)">modifier</button>
								<button id="annulCoord" onclick="annulCoord(this)">Annuler</button>
							</span>
						</div>
						<div class="card-body" align="center">
							<form id="formCoord">
								<div class="row">
									<div class="form-group col-md-6"><input type="email" onkeyup="validChamps(this)" class="form-control" placeholder="Votre adresse email" value="<?php echo $leuser["email"];?>" id="email" disabled></div>
									<div class="form-group col-md-6"><input type="password" onkeyup="validChamps(this)" class="form-control" placeholder="Votre mot de passe actuel" id="pwd_actuel" disabled></div>
									
									<div class="form-group col-md-6" id="id_pwd1"><input type="password" onkeyup="validChamps(this)" class="form-control" placeholder="Nouveau mot de passe" id="pwd1" disabled></div>
									<div class="form-group col-md-6" id="id_pwd2"><input type="password" onkeyup="validChamps(this)" class="form-control" placeholder="Confirmation mot de passe" id="pwd2" disabled></div>
									
									<div class="form-group col-md-12" style="float: left"><input type="checkbox" id="changement_mdp" onclick="toggleMDP()"><label for="changement_mdp"> Changer le mot de passe</label></div>
								</div>
							</form>
							<div class="form-group col-md-6" id="buttonCoord"><button type="submit" class="btn btn-primary form-control" onclick="updateCoordUsers()">Enregistrer</button></div>
						</div>

						<div class="card-footer text-center"><button class="btn btn-danger" onclick="deleteUser()">Supprimer mon compte</button></div>

					</div>
				</div>
			</div>
		</div>



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


	  	<!-- JavaScript -->
		<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
		<script type="text/javascript" src="MD5.js"></script>
		<script type="text/javascript">
			function modifierInfos(monButton){
				$(monButton).hide();
				$("#annulInfos").show();
				$("#buttonInfos").show();

				var nom = document.getElementById("nom");
    			var prenom = document.getElementById("prenom");
    			var dateNaissance = document.getElementById("dateNaissance");
    			var tab = [nom, prenom, dateNaissance];

    			for (var i = 0; i < tab.length; i++) {
    				tab[i].disabled=false;
    			}
			}
			function annulInfos(monButton){
				$(monButton).hide();
				$("#modifInfos").show();
				$("#buttonInfos").hide();

				var nom = document.getElementById("nom");
    			var prenom = document.getElementById("prenom");
    			var dateNaissance = document.getElementById("dateNaissance");
    			var tab = [nom, prenom, dateNaissance];

    			for (var i = 0; i < tab.length; i++) {
    				tab[i].disabled=true;
    				tab[i].style.border="1px solid #e0e0e0";
    			}
    			document.getElementById("formInfos").reset();
			}

			function modifierCoord(monButton){
				$(monButton).hide();
				$("#annulCoord").show();
				$("#buttonCoord").show();

				var email = document.getElementById("email");
				var pwd_actuel = document.getElementById("pwd_actuel");
				var pwd1 = document.getElementById("pwd1");
				var pwd2 = document.getElementById("pwd2");
    			var tab = [email, pwd_actuel, pwd1, pwd2];

    			for (var i = 0; i < tab.length; i++) {
    				tab[i].disabled=false;
    			}
			}
			function annulCoord(monButton){
				$(monButton).hide();
				$("#modifCoord").show();
				$("#buttonCoord").hide();

				var email = document.getElementById("email");
				var pwd_actuel = document.getElementById("pwd_actuel");
				var pwd1 = document.getElementById("pwd1");
				var pwd2 = document.getElementById("pwd2");
    			var tab = [email, pwd_actuel, pwd1, pwd2];

    			for (var i = 0; i < tab.length; i++) {
    				tab[i].disabled=true;
    				tab[i].style.border="1px solid #e0e0e0";
    			}
    			document.getElementById("formCoord").reset();
			}	

			function deleteUser(){
				if(confirm("Appuyez sur \"OK\" pour confirmer la suppression")){
					$.post( "../server/profil.php", { 
		    			setUsersSup : "0"
		    		}, function(data) {
						alertify.success(data);
					});
				}else{
					alertify.error("Suppession annulée");
				}
			}

			function modificationPhoto(){
				$("#fichier").click();
			}

			$(document).ready(function(){
				$('#fichier').change(function(e) {
			        var file = e.target.files[0].name;
					var data = new FormData();
					data.append("file", e.target.files[0]);
					console.log(data)
			        $.ajax({
					    url: '../server/profil.php',
					    data: data,
					    method: 'POST',
						contentType: false,
						processData: false,
						success: function (data) {
						  alertify.success(data);
						  setTimeout(function(){ location.reload(); }, 2000);
						},
					});
			    });
			})

			function updateInfosUsers(){
	    		var u_nom = document.getElementById("nom");
    			var u_prenom = document.getElementById("prenom");
    			var u_dateNaissance = document.getElementById("dateNaissance");
    			var msgErreur="";

    			if (u_nom.value==""||u_nom.value==null) {
    				msgErreur+="Veuillez remplir le champs NOM\n";
    				u_nom.style.borderColor = "red";
    				alertify.error(msgErreur);
    			}else if(u_prenom.value==""||u_prenom.value==null){
    				msgErreur+="Veuillez remplir le champs PRENOM\n";
    				u_prenom.style.borderColor = "red";
    				alertify.error(msgErreur);
    			}else if(u_dateNaissance.value==""||u_dateNaissance.value==null){
    				msgErreur+="Veuillez remplir le champs DATE DE NAISSANCE\n";
    				u_dateNaissance.style.borderColor = "red";
    				alertify.error(msgErreur);
    			}else{
    				u_nom.style.borderColor = "green";
					u_prenom.style.borderColor = "green";
					u_dateNaissance.style.borderColor = "green";
		    		$.post( "../server/profil.php", { 
		    			nom: u_nom.value,
		    			prenom : u_prenom.value,
		    			dateNaissance : u_dateNaissance.value,
		    			updateInfos : "0"
		    		}, function(data) {
						alertify.success(data);
						setTimeout(function(){ location.reload(); }, 2000);
					});
		    	}
	    	}	


	    	function updateCoordUsers(){
	    		var u_email = document.getElementById("email");
				var u_pwd_actuel = document.getElementById("pwd_actuel");
				var u_pwd1 = document.getElementById("pwd1");
				var u_pwd2 = document.getElementById("pwd2");
				var msgErreur="";
	    		if($("#changement_mdp").is(":checked")){
	    			if (u_email.value==""||u_email.value==null) {
	    				msgErreur+="Veuillez remplir le champs ADRESSE EMAIL\n";
	    				u_email.style.borderColor = "red";
	    				alertify.error(msgErreur);
	    			}else if(u_pwd_actuel.value==""||u_pwd_actuel.value==null){
	    				msgErreur+="Veuillez remplir le champs MOT DE PASSE ACTUEL\n";
	    				u_pwd_actuel.style.borderColor = "red";
	    				alertify.error(msgErreur);
	    			}else if(u_pwd1.value==""||u_pwd1.value==null){
	    				msgErreur+="Veuillez remplir le champs NOUVEAU MOT DE PASSE\n";
	    				u_pwd1.style.borderColor = "red";
	    				alertify.error(msgErreur);
	    			}else if(u_pwd2.value==""||u_pwd2.value==null){
	    				msgErreur+="Veuillez remplir le champs CONFIRMATION MOT DE PASSE\n";
	    				u_pwd2.style.borderColor = "red";
	    				alertify.error(msgErreur);
	    			}else if(u_pwd1.value!=u_pwd2.value){
	    				msgErreur+="Les deux mot de passe ne sont pas identiques\n";
	    				u_pwd1.style.borderColor = "red";
	    				u_pwd2.style.borderColor = "red";
	    				alertify.error(msgErreur);
	    			}else if(MD5(u_pwd_actuel.value)!=<?php echo '"'.$leuser["mdp"].'"';?>){
	    				msgErreur+="Le mot de passe actuel saisie est incorrect\n";
	    				u_pwd_actuel.style.borderColor = "red";
	    				alertify.error(msgErreur);
	    			}else{
	    				u_email.style.borderColor = "green";
	    				u_pwd_actuel.style.borderColor = "green";
	    				u_pwd1.style.borderColor = "green";
	    				u_pwd2.style.borderColor = "green";

			    		$.post( "../server/profil.php", { 
			    			email: u_email.value,
			    			pwd_actuel: u_pwd_actuel.value,
			    			pwd1: u_pwd1.value,
			    			pwd2: u_pwd2.value,
			    			updateCoordTout : "0"
			    		}, function(data) {
							alertify.success(data);
							setTimeout(function(){ location.reload(); }, 2000);
						});
			    	}
			    }else{
			    	if (u_email.value==""||u_email.value==null) {
	    				msgErreur+="Veuillez remplir le champs ADRESSE EMAIL\n";
	    				u_email.style.borderColor = "red";
	    				alertify.error(msgErreur);
	    			}else if(u_pwd_actuel.value==""||u_pwd_actuel.value==null){
	    				msgErreur+="Veuillez remplir le champs MOT DE PASSE ACTUEL\n";
	    				u_pwd_actuel.style.borderColor = "red";
	    				alertify.error(msgErreur);
	    			}else if(MD5(u_pwd_actuel.value)!=<?php echo '"'.$leuser["mdp"].'"';?>){
	    				msgErreur+="Le mot de passe actuel saisie est incorrect\n";
	    				u_pwd_actuel.style.borderColor = "red";
	    				alertify.error(msgErreur);
	    			}else{
	    				u_email.style.borderColor = "green";
	    				u_pwd_actuel.style.borderColor = "green";

			    		$.post( "../server/profil.php", { 
			    			email: u_email.value,
			    			pwd_actuel: u_pwd_actuel.value,
			    			updateCoordEmail : "0"
			    		}, function(data) {
							alertify.success(data);
							setTimeout(function(){ location.reload(); }, 2000);
						});
			    	}
			    }
	    	}

	    	function toggleMDP(){
	    		$('#id_pwd1').toggle();
	    		$('#id_pwd2').toggle();
	    	}	


			function validChamps(mtest){
				var value = $(mtest).val().toLowerCase();
				var nb = $(mtest).text().toLowerCase().indexOf(value);
				if (nb > -1) {
					$(mtest).css("border", "1px solid red");
				}else{
					$(mtest).css("border", "1px solid green");
				}
			}
			
		</script>

	</body>
</html>