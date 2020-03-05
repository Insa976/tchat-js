/***************************************************************************************************************/
/********************************************** PATRTIE INSCRITPION ********************************************/
/***************************************************************************************************************/
$("#formulaireInscription").submit(function(e){
	e.preventDefault();
	Inscription();
});

//Initialisation des valeurs
var nom, prenom, dateNaissance, email, pwd, pwd1;

//Affectation de mes identifiants
nom = $("#nom"); 
prenom = $("#prenom");  
dateNaissance = $("#dateNaissance"); 
email = $("#in_email");
pwd = $("#in_pwd");
pwd1 = $("#in_pwd1"); 

/*		FONCTION QUI VÉRIFIE LES CHAMPS SI SONT BIEN SAISIS		*/
function Inscription(){
	//Création des tableaux
	var champs = [nom, prenom, dateNaissance, email, pwd, pwd1];
	var valeur = [nom.val(), prenom.val(), dateNaissance.val(), email.val(), pwd.val(), pwd1.val()];
	var infosNom = ["Nom", "Prénom", "Date de naissance", "Email", "Mot de passe", "Confirmation de mot de passe"];
	
	// Les valeurs
	lenom = nom.val();
	leprenom = prenom.val();
	ledateNaissance = dateNaissance.val();
	leemail = email.val();
	lepwd = pwd.val();

	//Message après
	var messageInfo = $("#mere_liste_li");
	var msg = "";
	var nb_i = 0;
	for (var i = 0; i<valeur.length ; i++) {

		//Si le champ est vide
		if(valeur[i]==""){
			//console.log(infosNom[i]+" est vide");
			champs[i].css("border", "1px solid red");
			msg += "<li class='text-danger'>Veuillez remplir le champ "+infosNom[i]+".</li>";
		}else{
			if(valeur[i]==valeur[4] && valeur[4]!=valeur[5]){
				champs[i].css("border", "1px solid red");
				msg += "<li class='text-warning'>Les deux mots de passe ne sont pas identiques !</li>";
			}else{
				champs[i].css("border", "1px solid green");
				nb_i++;

				if (nb_i==6) {
					//champs[0].css("border", "1px solid #CCCCCC");
					
					$.post('server/inscription.php',
					    {	
					    	envoyer: '',
					        nom_ins: lenom,
					        prenom_ins: leprenom,
					        dateN_ins: ledateNaissance,
					        email_ins: leemail,
					        mdp_ins: lepwd

					    }, function(data) {
					    	var dataJson = JSON.parse(data);
					    	if (dataJson.resultat == "Inscrit") {
					    		$("#formulaireInscription").trigger("reset");
					        	$("#inscriptionModal").modal('toggle');
					        	swal("Inscription réussie !", "Merci de votre inscription 🙂 !", "success");
					    	}else{
					    		messageInfo.html("<li class='text-danger'>L'adresse email existe déjà ! Veuillez choisir une autre !</li>");
					    		champs[3].css("border", "1px solid red");
					    	}
						}
					);
				}
			}
		}
	}
	messageInfo.html(msg);
}	
/*************************************** FIN PARTIE INSCRIPTION ***********************************************/
/**************************************************************************************************************/





/**************************************************************************************************************/
/*********************************************  PARTIE CONNEXION **********************************************/
/**************************************************************************************************************/
$("#formulaireConnexion").submit(function(e){
	e.preventDefault();
	Connexion();
});

//Initialisation des valeurs
var emailConnec, pwdConnec;

//Affectation de mes identifiants 
emailConnec = $("#email");
pwdConnec = $("#pwd"); 

/*		FONCTION QUI VÉRIFIE LES CHAMPS SI SONT BIEN SAISIS		*/
function Connexion(){
	//Création des tableaux
	var champs = [emailConnec, pwdConnec];
	var valeur = [emailConnec.val(), pwdConnec.val()];
	var infosNom = ["Adresse email", "Mot de passe"];
	
	// Les valeurs
	leemail = emailConnec.val();
	lepwd = pwdConnec.val();

	//Message après
	var messageInfo = $("#mere_liste_liConnec");
	var msg = "";
	var nb_i = 0;
	for (var i = 0; i<valeur.length ; i++) {

		//Si le champ est vide
		if(valeur[i]==""){
			//console.log(infosNom[i]+" est vide");
			champs[i].css("border", "1px solid red");
			msg += "<li class='text-danger'>Veuillez remplir le champ "+infosNom[i]+".</li>";
			$("#messageConnexion").empty();
		}else{
			champs[i].css("border", "1px solid green");
			nb_i++;

			if (nb_i==2) {

				//champs[i].css("border", "1px solid #CCCCCC");

				
				$.post('server/connexion.php',
				    {	
				    	envoyer: '',
				        email_con: leemail,
				        mdp_con: lepwd

				    }, function(data) {
				    	var dataJson = JSON.parse(data);
				    	//console.log(dataJson);
				        $("#formulaireConnexion").trigger("reset");
				        $("#messageConnexion").empty().append(dataJson.msg);
				        $("#le_head").append(dataJson.redirection);
					}
				);
			}
		}
	}
	messageInfo.html(msg);
}	
/***************************************** FIN PARTIE CONNEXION ***********************************************/
/**************************************************************************************************************/


/*Modification du champs*/
function validChamps(mtest){
	var value = $(mtest).val().toLowerCase();
	var nb = $(mtest).text().toLowerCase().indexOf(value);
	//S'il y a rien ça reste rouge
	if (nb > -1) {
		$(mtest).css("border", "1px solid red");
	}
	// Sinon ça change en vert
	else{
		$(mtest).css("border", "1px solid green");
	}
}