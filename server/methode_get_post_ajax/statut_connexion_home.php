<?php
	if (session_status() == PHP_SESSION_NONE) session_start();
	require_once "../../server.php";

	$user = $Users->getUsersById($_SESSION['id']);

	$lesUsers = $Users->getUsers();
?>
<?php foreach ($lesUsers as $users): ?>
	<?php if ($users["idUsers"]!=$user['idUsers']): ?>
		<li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
			<img src="images/<?php echo $users["photo"]; ?>" alt="<?php echo $users["nom"]." ".$users["prenom"]; ?>" class="<?php if($users['statut']==1){echo 'statut_connecte';}else{echo 'statut_non_connecte';} ?> rounded-circle"  style="width:50px; ">
			<?php echo $users["nom"]." ".$users["prenom"];?>
			<img src="images/flech_right.gif" class="img-fluid" style="height: 63px;">
			<a href="tchat/?idUser2=<?php echo $users['idUsers']; ?>"><span class="badge badge-primary badge-pill p-2">Tchatter</span></a>
		</li>
	<?php endif ?>
<?php endforeach ?>