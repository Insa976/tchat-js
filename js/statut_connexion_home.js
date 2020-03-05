$(function(){

	function statutUsersPageAccueil(){
		/*Pour la page d'accueil*/
		$.get(
			'./server/methode_get_post_ajax/statut_connexion_home.php',
			function(data){+
				$("#liste_tchatter").empty().append(data);
			}
		)
	}
	statutUsersPageAccueil();


	function comptageNbStatutPageAccueil(){
		var nbStatut = 0;
		
		setInterval(function(){
			$.get(
				'./server/methode_get_post_ajax/nb_statut_connecte.php',
				function(nbMsg){
					
					var dataJson = JSON.parse(nbMsg);

					if(nbStatut != dataJson.nbStatutNonConnecte){

						nbStatut = dataJson.nbStatutNonConnecte;

						statutUsersPageAccueil();
					}
				}
			)
		},1000);
	}
	comptageNbStatutPageAccueil();
})