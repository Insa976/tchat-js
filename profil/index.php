<?php 
	if (session_status() == PHP_SESSION_NONE) session_start();
	require_once "../server.php";
	verifSession_if_Off();

	$leuser = $Users->getUsersById($_SESSION['id']);

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
	  		#enregistrerInfos,
	  		#enregistrerCoord, 
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
				<a href="../" class="navbar-brand">
				<!-- Logo Image -->
				<img src="../images/logo.png" width="45" alt="" class="d-inline-block align-middle mr-2">
				<!-- Logo Text -->
				<span class="font-weight-bold">Tchat - JS</span>
				</a>

				<button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

				<div id="navbarSupportedContent" class="collapse navbar-collapse text-center">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a href="./" class="nav-link"><i class="fa fa-comments-o fa-lg"></i> Tchatter</a></li>&nbsp;
						<li class="nav-item active"><a href="../profil/" class="nav-link"><i class="fa fa-user-circle-o"></i> <?php echo substr($leuser['nom'],0,1).". ".$leuser['prenom'] ;?></a></li>&nbsp;
						<li class="nav-item"><a href="../server/deconnexion.php" id="deconnexion" class="nav-link"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
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
							<button class="btn btn-primary" id="laphoto"><i class="fa fa-photo"></i> Modifier la photo</button>
						</div>
					</div>
				</div>
				<div class="col-md-8 lateral-droit py-3">
					<div class="card">

						<div class="card-header">
							<span style="float: left"><strong>Informations personnelles</strong></span>
							<span style="float: right;">
								<button id="modifInfos">modifier</button>
								<button id="annulInfos">Annuler</button>
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
							<div class="form-group col-md-6" id="enregistrerInfos">
								<button type="submit" id="enregistrerInfosUser" class="btn btn-primary form-control">Enregistrer</button>
							</div>
						</div>

						<div class="card-header"><span style="float: left"><strong>Email et mot de passe</strong></span> 
							<span style="float: right;">
								<button id="modifCoord">modifier</button>
								<button id="annulCoord">Annuler</button>
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
							<div class="form-group col-md-6" id="enregistrerCoord"><button type="submit" class="btn btn-primary form-control" id="enregistrerCoordUser">Enregistrer</button></div>
						</div>

						<div class="card-footer text-center"><button class="btn btn-danger" id="deleteUser">Supprimer mon compte</button></div>

					</div>
				</div>
			</div>
		</div>



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


	  	<!-- JavaScript -->
		<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script type="text/javascript" src="MD5.js"></script>
		<script type="text/javascript">

			$(document).ready(function(){
				/*#################################################################*/
				/*################## DÉCLARATION DE MES VARIBALES #################*/
				/*#################################################################*/
				var nom = $("#nom"); //Le champ NOM
    			var prenom = $("#prenom"); //Le champ PRÉNOM
    			var dateNaissance = $("#dateNaissance"); //Le champ DATE DE NAISSANCE
    			var email = $("#email"); //Le champ "email"
				var pwd_actuel = $("#pwd_actuel"); //Le champ "mmot de passe actuel"
				var pwd1 = $("#pwd1"); //Le champ "nouveau mot de passe"
				var pwd2 = $("#pwd2"); //Le champ "confirmation mot de passe"


				/*#################################################################*/
				/*############## MODIFICATION DE LA PHOTO DE PROFILE ##############*/
				/*#################################################################*/
				//Il s'agit du boutton qui permet ici de choisir une image que l'on souhaite mettre sur le profile
				$("#laphoto").on("click",function(){
					$("#fichier").click();
				})

				//Ici on vérifie si l'image a été uploadée
				$("#fichier").change(function(e) {
			        var file = e.target.files[0].name; //file recupère le nom du fichier uploadé
					var data = new FormData(); // On crée un objet "data" de FormData. 
					data.append("file", e.target.files[0]); //On va ensuite rajouter une nouvelle valeur dans notre objet "data" : append(nom, valeur)
			        $.ajax({
					    url: '../server/profil.php', //l'URL à laquelle la demande est envoyée.
					    data: data, //Données à envoyer au serveur
					    method: 'POST',
						contentType: false,
						processData: false, //En cas de succès
						success: function (data) {
						  // alertify.success(data);
						  swal(data, "Votre photo a bien été mise à jour!", "success",{button:false});
						  setTimeout(function(){ location.reload(); }, 2000);
						},
					});
			    });

				/*#################################################################*/
				/*############## MODIFICATION DES INFOS PERSONNELLES ##############*/
				/*#################################################################*/
				//Si on clique sur le button "modifier"
				$("#modifInfos").on("click",function(){
					$(this).hide(); //Nous allons cacher le button lui même
					$("#annulInfos").show(); //On va ensuite afficher le button "Annuler"
					$("#enregistrerInfos").show(); //On va ensuite afficher le button "Enregistrer"

	    			var tab = [nom, prenom, dateNaissance];
	    			var label = ["Nom", "Prénom", "Date de naissance"];

	    			for (var i = 0; i < tab.length; i++) {
	    				tab[i].prop("disabled", false); //Les champs sont de nouveau modifiables
	    			}

	    			//Si on clique sur "Enregistrer"
	    			$("#enregistrerInfosUser").on("click",function(e){
	    				var nbErreur = 0; //0 si y a pas erreur sinon si nbErreur>0, il existe une erreur
	    				$("#annulCoord").click(); //Nous allons fermer la modification pour les coordonnées
	    				for (var i = 0; i < tab.length; i++) {
	    					$("#msg"+i).remove(); //Supprimer le champ "msg" message d'erreur s'il en existe
	    					//Si un champ est vide
		    				if(tab[i].val()==""){
		    					nbErreur ++; //Compteur d'erreurs
		    					var msgErreur = $("<small id='msg"+i+"'><strong>"+label[i]+" est nécessaire</strong></small>"); //Notre message d'erreur
			                    tab[i].after(msgErreur); //Nous allons afficher notre message juste avant le champ concerné
			                    $("#msg"+i).css("color","red"); //Permet de mettre en couleur rouge notre message
			                    tab[i].css("border","2px solid red"); //Permet de mettre en rouge le champ concerné
		    				}else{ //Sinon
		    					tab[i].css("border","2px solid #00e64d") //Permet de mettre en vert notre champ
		    				}
		    			}

		    			//Si y a pas d'erreur (nbErreur=0)
		    			if(nbErreur==0){
		    				$.post( '../server/profil.php', { 
				    			nom: nom.val(),
				    			prenom : prenom.val(),
				    			dateNaissance : dateNaissance.val(),
				    			updateInfos : "valid"
				    		}, function(data) {
								// alertify.success(data);
								swal(data, "Vos Informations personnelles ont bien été mises à jour!", "success",{button:false});
								setTimeout(function(){ location.reload(); }, 2000);
							});
		    			}
	    			})

				});


				//Si on clique sur le button "annuler"
				$("#annulInfos").on("click",function(e){
					$(this).hide(); //Nous allons cacher le button lui même
					$("#modifInfos").show(); //On va ensuite afficher le button "Modifier"
					$("#enregistrerInfos").hide(); //On va ensuite cacher le button "Enregistrer"

	    			var tab = [nom, prenom, dateNaissance];

	    			for (var i = 0; i < tab.length; i++) {
	    				$("#msg"+i).remove(); //Supprimer le champ "msg" message d'erreur s'il en existe
	    				tab[i].prop("disabled", true); //Les champs sont bloqués
	    				tab[i].css("border", "1px solid #e0e0e0");
	    			}
	    			$("#formInfos")[0].reset(); //Nous allons ensuite réinitialiser notre formulaire 
				})

				/*#################################################################*/
				/*########### MODIFICATION DES COORDONNÉES PERSONNELLES ###########*/
				/*#################################################################*/
				//Si on clique sur le button "modifier"
				$("#modifCoord").on("click",function(){
					$(this).hide(); //Nous allons cacher le button lui même
					$("#annulCoord").show(); //On va ensuite afficher le button "Annuler"
					$("#enregistrerCoord").show(); //On va ensuite afficher le button "Enregistrer"
	    			
	    			var tab1 = [email, pwd_actuel];
	    			var tab2 = [email, pwd_actuel, pwd1, pwd2];
	    			var label = ["Adresse e-mail", "Mot de passe actuel", "Nouveau mot de passe", "Confirmation du mot de passe"];

	    			for (var i = 0; i < tab2.length; i++) {
	    				tab2[i].prop("disabled", false); //Les champs sont de nouveau modifiables
	    			}
	    			//Si on clique sur "Enregistrer"
	    			$("#enregistrerCoordUser").on("click",function(e){
	    				var nbErreur = 0; //0 si y a pas erreur sinon si nbErreur>0, il existe une erreur
	    				$("#annulInfos").click(); //Nous allons fermer la modification pour les infos perso
	    				if($("#changement_mdp").is(":checked")){
		    				for (var i = 0; i < tab2.length; i++) {
		    					$("#msg"+i).remove(); //Supprimer le champ "msg" message d'erreur s'il en existe
		    					//Si un champ est vide
			    				if(tab2[i].val()==""){
			    					nbErreur ++; //Compteur d'erreurs
			    					var msgErreur = $("<small id='msg"+i+"'><strong>"+label[i]+" est nécessaire</strong></small>"); //Notre message d'erreur
				                    tab2[i].after(msgErreur); //Nous allons afficher notre message juste avant le champ concerné
				                    $("#msg"+i).css("color","red"); //Permet de mettre en couleur rouge notre message
				                    tab2[i].css("border","2px solid red"); //Permet de mettre en rouge le champ concerné
			    				}else{ //Sinon
			    					tab2[i].css("border","2px solid #00e64d") //Permet de mettre en vert notre champ
			    				}
			    			}
			    		}else{
			    			for (var i = 0; i < tab1.length; i++) {
		    					$("#msg"+i).remove(); //Supprimer le champ "msg" message d'erreur s'il en existe
		    					//Si un champ est vide
			    				if(tab1[i].val()==""){
			    					nbErreur ++; //Compteur d'erreurs
			    					var msgErreur = $("<small id='msg"+i+"'><strong>"+label[i]+" est nécessaire</strong></small>"); //Notre message d'erreur
				                    tab1[i].after(msgErreur); //Nous allons afficher notre message juste avant le champ concerné
				                    $("#msg"+i).css("color","red"); //Permet de mettre en couleur rouge notre message
				                    tab1[i].css("border","2px solid red"); //Permet de mettre en rouge le champ concerné
			    				}else{ //Sinon
			    					tab1[i].css("border","2px solid #00e64d") //Permet de mettre en vert notre champ
			    				}
			    			}
			    		}

			    		$("#msg").remove(); //On suuprime le champ msg s'il existe
			    		//On vérifie si les deux mot de passe sont identiques 
			    		if((pwd1.val()!=pwd2.val())||(pwd_actuel.val()!="" && MD5(pwd_actuel.val())!=<?php echo '"'.$leuser["mdp"].'"';?>)){
			    			if (pwd1.val()!=pwd2.val()){
			    				pwd1.css("border","2px solid red");
			    				pwd2.css("border","2px solid red");
			    				pwd2.after("<small id='msg'><strong>Les deux mots de passe ne sont pas identiques</strong></small>");
			    				$("#msg").css("color","red");
			    			}
			    			if(MD5(pwd_actuel.val())!=<?php echo '"'.$leuser["mdp"].'"';?>){
			    				pwd_actuel.css("border","2px solid red");
			    				pwd_actuel.after("<small id='msg'><strong>Le mot de passe actuel saisie est incorrect</strong></small>");
			    				$("#msg").css("color","red");
			    			}
			    			nbErreur+=1;
			    		}

			    		console.log(nbErreur);

		    			//Si y a pas d'erreur (nbErreur=0)
		    			if(nbErreur==0){
		    				if($("#changement_mdp").is(":checked")){
		    					$.post( '../server/profil.php', { 
					    			email: email.val(),
					    			pwd_actuel: pwd_actuel.val(),
					    			pwd1: pwd1.val(),
					    			pwd2: pwd2.val(),
					    			updateCoordTout : "valid"
					    		}, function(data) {
									// alertify.success(data);
									swal(data, "Vos coordonnées ont bien été mises à jour!", "success",{button:false});
									setTimeout(function(){ location.reload(); }, 2000);
								});
		    				}else{
		    					$.post( '../server/profil.php', { 
					    			email: email.val(),
					    			pwd_actuel: pwd_actuel.val(),
					    			updateCoordEmail : "valid"
					    		}, function(data) {
									// alertify.success(data);
									swal(data, "Vos coordonnées ont bien été mises à jour!", "success",{button:false});
									setTimeout(function(){ location.reload(); }, 2000);
								});
		    				}
		    			}
	    			})

				});

				
				//Si on clique sur le button "annuler"
				$("#annulCoord").on("click",function(e){
					$(this).hide(); //Nous allons cacher le button lui même
					$("#modifCoord").show(); //On va ensuite afficher le button "Modifier"
					$("#enregistrerCoord").hide(); //On va ensuite cacher le button "Enregistrer"

	    			var tab = [email, pwd_actuel, pwd1, pwd2];
	    			for (var i = 0; i < tab.length; i++) {
	    				$("#msg"+i).remove(); //Supprimer le champ "msg" message d'erreur s'il en existe
	    				tab[i].prop("disabled", true); //Les champs sont bloqués
	    				tab[i].css("border", "1px solid #e0e0e0");
	    			}
	    			$("#formCoord")[0].reset(); //Nous allons ensuite réinitialiser notre formulaire 
				})


				/*#################################################################*/
				/*######################## SUPPRESSION USER #######################*/
				/*#################################################################*/
				$("#deleteUser").on("click",function(){
					if(confirm("Appuyez sur \"OK\" pour confirmer la suppression")){
						$.post( '../server/profil.php', { 
			    			setUsersSup : "0"
			    		}, function(data) {
							swal("Suppession réussie !", data, "success",{button:false});
							setTimeout(function(){ window.location="../server/deconnexion.php"; }, 3000);
						});
					}else{
						swal("Suppession annulée !", "La suppression a été annulée", "error",{button:false});
					}
				})

			});
				


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