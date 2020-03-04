$(document).ready(function(){

	/*Fonction qui affiche les messages */
	function affichageMessages(){
		$.get(
			'../server/methode_get_post_ajax/get_msg.php',
			{
				iduser1 : $("#user1").val(),
				iduser2 : $("#user2").val(),
			},
			function(data){
				//Fonction retour
				$('.card-tchat').empty().append(data);
				$('#lesMessages').scrollTop($('.card-tchat').height());
			}
		)
	}
	/*Exécution de la fonction d'affichage des messages*/
	affichageMessages();



	/*Fonction qui compte les messages*/
	function comptageMessages(){
		var countM = 0;
		setInterval(function(){
			
			$.get(
				'../server/methode_get_post_ajax/count_msg.php',
				{
					iduser1 : $("#user1").val(),
					iduser2 : $("#user2").val(),
				},
				function(data){
					
					var dataJson = JSON.parse(data);

					if(countM != dataJson.nbMsge){

						countM = dataJson.nbMsge;

						affichageMessages();
						//alert(dataJson.prenom);
					}

					// Si il n'y a pas de message on affiche "Messagerie vide"
					if (countM != 0) {
						if ($("#lesMessages").hasClass("card-vide")){
							$("#lesMessages").removeClass("card-vide");
						}else{
						}
					}

					// Sinon on affiche les messages
					else{
						$("#lesMessages").addClass("card-vide");
					}
				}
			)
		},1000)
	}
	/*Exécution de la fonction de comptage des messages*/
	comptageMessages();

});