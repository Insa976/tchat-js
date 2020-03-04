$(function(){
	function infosUser(){
		/*Récupération des données pour l'utilisateur 2*/
		$.get(
			'../server/methode_get_post_ajax/infos_user2.php',
			{
				iduser2 : $("#user2").val(),
			},
			function(data){
				var dataJson = JSON.parse(data);
				$("#nameUser2").text(dataJson.nom+" "+dataJson.prenom);
				$("#imgUser2").attr("src", "../images/"+dataJson.photo);
			}
		)
	}
	infosUser();

	function statutUser(){
		$.get(
			'../server/methode_get_post_ajax/infos_user2.php',
			{
				iduser2 : $("#user2").val(),
			},
			function(data){
				var dataJson = JSON.parse(data);
				if (dataJson.statut==0) {
					$("#imgUser2").removeClass("statut_connecte").addClass("statut_non_connecte");
				}
				else{
					$("#imgUser2").removeClass("statut_non_connecte").addClass("statut_connecte");
				}				
			}
		)
	}
	setInterval(statutUser,1000);

})
