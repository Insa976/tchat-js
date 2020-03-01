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

/**************************************************************************************************************/
/***************************************************  PARTIE Mdp **********************************************/
/**************************************************************************************************************/
$("#formulaireMdp").submit(function(e){
	e.preventDefault();
	Mdp();
});

//Initialisation des valeurs
var emailMdp;

//Affectation de mes identifiants 
emailMdp = $("#email");

/*		FONCTION QUI VÉRIFIE LES CHAMPS SI SONT BIEN SAISIS		*/
function Mdp(){
	//affectation des variables
	var champs = emailMdp;
	var valeur = emailMdp.val();
	var infosNom = "\"Indiquez votre adresse email\"";

	//Message après
	var messageInfo = $("#messageMdp");
	var msg = "";

	//Si le champ est vide
	if(valeur==""){
		champs.css("border", "1px solid red");
		msg += "  <div class=\"alert alert-danger\"><strong>Veuillez remplir le champ "+infosNom+" !</strong></div>";
	}else{
		$.post('server/mdp.php',
		    {	
		    	envoyer: '',
		        email_mdp: valeur

		    }, function(data) {
		    	var dataJson = JSON.parse(data);
		        $("#formulaireMdp").trigger("reset");
		        champs.css("border", "1px solid #CCCCCC");
		        $("#messageMdp").empty().append("<div class=\"alert alert-success\"><p>Votre mot de passe vient de vous être envoyé à votre adresse Email (<strong>"+dataJson.adresseEmail+"</strong>)</p><p>Si vous n'avez pas recus le mail d'ici quelques minutes, vérifiez également dans vos courriers spam si vous n'avez pas reçus directement le mail.<p></div>");
			}
		);
	}

	messageInfo.html(msg);
}	
/********************************************* FIN PARTIE Mdp *************************************************/
/**************************************************************************************************************/
