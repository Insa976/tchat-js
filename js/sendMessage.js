$(document).ready(function(){

	$("#sendMessage").click(function(e){
		e.preventDefault();

		/*les variables simples*/
		var formulaire = $("#formulaireMessage"),
		lemessage = $("#message"), 
		message = lemessage.val(),
		/*champs vide*/
		messageChampsvide = $("#messageChampsvide"),
		msg_champ = "",
		/*Les tableaux des valeurs*/
		champs = "votre message";

		if (message == "") {
			msg_champ += '<li class="list-group-item list-group-item-danger">Veuilez remplir le champs '+champs+'</li>';
		}else{
			$.post(
				'../server/methode_get_post_ajax/set_msg.php',
				{
					envoyer : "",
					iduser1 : $("#user1").val(),
					iduser2 : $("#user2").val(),
					msg : message
				}
			);
			formulaire[0].reset();
		}
		messageChampsvide.html(msg_champ);
	});
}); 