<?php
	require_once "../../server.php";

	if (isset($_POST['envoyer'])) {
		$msg = nl2br($_POST['msg']);
		$id1 = $_POST['iduser1'];
		$id2 = $_POST['iduser2'];

		$Message->setMessage($id1, $id2, $msg);
	}

?>