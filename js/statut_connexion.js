$(function(){

	function statutUsers(){
		/*pour la page de tchat*/
		$.get(
			'../server/methode_get_post_ajax/statut_connexion.php',
			function(data){+
				$("#lesInscrits").empty().append(data);
			}
		)
	}
	statutUsers();


	function comptageNbStatut(){
		var nbStatut = 0;
		
		setInterval(function(){
			$.get(
				'../server/methode_get_post_ajax/nb_statut_connecte.php',
				function(nbMsg){
					
					var dataJson = JSON.parse(nbMsg);

					if(nbStatut != dataJson.nbStatutNonConnecte){

						nbStatut = dataJson.nbStatutNonConnecte;

						statutUsers();
					}
				}
			)
		},1000);
	}
	comptageNbStatut();
})