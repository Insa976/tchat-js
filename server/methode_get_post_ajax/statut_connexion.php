<?php
	if (session_status() == PHP_SESSION_NONE) session_start();
	require_once "../../server.php";

	$user = $Users->getUsersById($_SESSION['id']);

	$lesUsers = $Users->getUsers();
?>
<?php foreach ($lesUsers as $users): ?>
	<?php if ($users["idUsers"]!=$user['idUsers']): ?>
		<a href="./?idUser2=<?php echo $users['idUsers']; ?>" class="lestchatteurs list-group-item list-group-item-action" >
			<img src="../images/<?php echo $users["photo"]; ?>" alt="<?php echo $users["nom"]." ".$users["prenom"]; ?>" class=" <?php if($users['statut']==1){echo 'statut_connecte';}else{echo 'statut_non_connecte';} ?> rounded-circle" style="width:50px; " id="tchatteur<?php echo $users['idUsers']; ?>"><br>
			<?php echo $users["nom"]." ".$users["prenom"];?><br>
		</a>
	<?php endif ?>
<?php endforeach ?>