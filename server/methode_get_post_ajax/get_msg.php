<?php
	require_once "../../server.php";
	if (session_status() == PHP_SESSION_NONE) session_start();
	if (isset($_SESSION['id'])) {
		$user = $Users->getUsersById($_SESSION['id']);
	}
	$lesMessages = $Message->getMessage($_GET['iduser1'], $_GET['iduser2']);

	foreach ($lesMessages as $lesmsg) { 
		$datedif = $lesmsg['datedif'];
		$dateformat = "";

		if ($datedif<365) {

			if ($datedif<2) {
				if ($datedif==0) {
					$dateformat = "Aujoud'hui à ".$lesmsg['date_jour'];
				}else{
					$dateformat = "Hier à ".$lesmsg['date_jour'];
				}
			}
			elseif (2<=$datedif && $datedif<7) {
				$dateformat = $lesmsg['date_semaine'];
			}
			elseif (7<=$datedif && $datedif<365) {
				$dateformat = $lesmsg['date_mois'];
			}
		}else{
			$dateformat = $lesmsg['date_annee'];
		}



		if ($lesmsg['idUsers1']==$_SESSION['id']) { ?>
			<div  class="row justify-content-end ">
				<div class="card-column col-md-7 col-10 mt-2">
					<div class="card bg-warning">
						<div class="card-body">
							<strong><?php /*echo $lesmsg['nom'].' '.$lesmsg['prenom'];*/ ?>Moi</strong><br>
							<p class="card-text text-primary"><?php echo $lesmsg['libelleM']; ?></p>
							<small style="float: right;" id="dateheure"><?php echo $dateformat; ?></small>
						</div>
					</div>
					<small style="float: right;"><i></i></small>
				</div>
			</div>
		<?php }else{ ?>

			<div  class="row justify-content-start">
				<div class="card-column col-md-7 col-10 mt-2">
					<div class="card bg-light">
						<div class="card-body">
							<strong><?php echo substr($lesmsg['nom'],0,1).'. '.$lesmsg['prenom']; ?></strong><br>
							<p class="card-text text-primary"><?php echo $lesmsg['libelleM']; ?></p>
							<small style="float: right;" id="dateheure"><?php echo $dateformat; ?></small>
						</div>
					</div>
					<small><i></i></small>
				</div>
			</div>
		<?php	}	
	} ?>