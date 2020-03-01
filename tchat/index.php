<?php
	if (session_status() == PHP_SESSION_NONE) session_start();
	require_once "../server.php";
	verifSession_if_Off();

	$user = $Users->getUsersById($_SESSION['id']);

	$lesUsers = $Users->getUsers();
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
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
	  	<style type="text/css">
	  		.list1.list-group{
			    overflow-x: scroll;
			    overflow-y: hidden;
			    -webkit-overflow-scrolling: touch;
			}
			.list-Users{
				background-color: #6f6f6f;
				padding: 15px 0;
			}
			#lesMessages{
				overflow-y: scroll; 
				max-height: 300px;
				height: 300px; 
				position: relative;
			}

			/*.card-tchat{
				height: 300px;
			}*/

			.card-vide{
				background: url('https://via.placeholder.com/500x300?text=Messagerie vide') no-repeat center ; 
				-webkit-background-size: cover;
				background-size: cover;
			}

			.statut_connecte{
				border:3px solid green;
			}

			.statut_non_connecte{
				border:3px solid red;
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
						<li class="nav-item active"><a href="./" class="nav-link"><i class="fa fa-comments-o fa-lg"></i><span class="badge">10</span></a></li>
						<li class="nav-item"><a href="../profil/" class="nav-link"><i class="fa fa-user-circle-o"></i><?php echo substr($user['nom'],0,1).". ".$user['prenom'] ;?></a></li>
						<li class="nav-item"><a href="../server/deconnexion.php" class="nav-link"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
					</ul>
				</div>
			</div>
		</nav>

		
		<div class="container-fluid">
			<div class="row justify-content-center list-Users">

				<div class="pb-3 col-md-4">
					<input type="text" class="form-control" name="" id="rechercher" placeholder="Rechercher une personne ...">
				</div>

				<div class="col-md-12">
					<div class="list1 list-group list-group-horizontal text-center flex-row flex-nowrap">
						<?php foreach ($lesUsers as $users): ?>
							<?php if ($users["idUsers"]!=$user['idUsers']): ?>
								<a href="./?idUser2=<?php echo $users['idUsers']; ?>" class="list-group-item list-group-item-action" id="liste_tchatter">
									<img src="../images/<?php echo $users["photo"]; ?>" alt="<?php echo $users["nom"]." ".$users["prenom"]; ?>" class="rounded-circle" style="width:50px; "><br>
									<?php echo substr($users["nom"],0,1).".".$users["prenom"];?><br>
									<span class="badge badge-primary mt-2 badge-pill">12</span>
								</a>
							<?php endif ?>
						<?php endforeach ?>
					</div>
				</div>
			</div>


			<div class="row justify-content-center">
				<div class="col-md-6 py-3">
					<?php if(isset($_GET['idUser2']) && $_GET['idUser2'] != ""){ ?>
						<div class="card conversation">
							<!--  -->
								<div class="card-header">
									<button class="btn btn-default border btn-sm"  style="float: right;"><span class="fa fa-trash-o mt-2"></span></button>
									<strong id="nameUser2" style="font-size: 25px;"></strong> 
									<span style="float: left;"><img src="" id="imgUser2" class="mr-3 rounded-circle" style="width:40px;"></span>
								</div>

								<div  id="lesMessages">
									<div class="card-body card-tchat">
										<!-- Ici les messages -->
									</div>
								</div>

								<div class="card-footer">
									<ul class="list-group" id="messageChampsvide"></ul>
									<form id="formulaireMessage">
										<div class="row">
											<div class="col-md-9">
												<input type="hidden" id="user1" value="<?php echo $user['idUsers'];?>">
												<input type="hidden" id="user2" value="<?php if(isset($_GET['idUser2'])){ echo $_GET['idUser2'];}?>">
												<textarea class="form-control" rows="2" id="message"></textarea>
											</div>
											<div class="col-md-3">
												<button type="submit" class="btn btn-primary mt-2"  id="sendMessage"><span class="fa fa-send"></span></button>
											</div>
										</div>
									</form>
								</div>
						
							<!--  -->
						</div>
					<?php }else{ ?>
						<img src="../images/img_conversation_null.png" class="img-fluid">
					<?php } ?>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="../js/sendMessage.js"></script>

		<?php if(isset($_GET['idUser2']) && $_GET['idUser2'] != ""){ ?>
			<!-- GETTER MESSAGES -->
			<script type="text/javascript" src="../js/infos_user2.js"></script>
			<script type="text/javascript" src="../js/receiveMessage.js"></script>

		<?php } ?>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#rechercher").on("keyup", function() {
					var value = $(this).val().toLowerCase();
					$("#liste_tchatter li").filter(function() {
						$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
			});
		</script>
	</body>
</html>