//Notification JS

$(document).ready(function(){
	setInterval(function(){
		var nbM = $("#nbMsg").val();
		$.post(
			'../server/notification.php',
			function(data){
				var dataJson = JSON.parse(data);
				if (dataJson.nbM!=nbM){
					alertify.success("Vous avez un nouveau message de "+dataJson.nom+" "+dataJson.prenom);
					$("#nbMsg").attr("value",dataJson.nbM);
				}
			}
		)
	},1000)
})