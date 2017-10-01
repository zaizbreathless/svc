<?php include 'body/header.php'; ?>

<?php

	$tapak_id = $_POST['id'];
	$borang = $_POST['borang'];
	$tarikhBorang = $_POST['tarikhBorang'];
	$terimaBorang = $_POST['terimaBorang'];

	// isi visits
	$sc = $connect->prepare("INSERT INTO borang (tapak_id, borang, tarikhBorang, terimaBorang) VALUES (?,?,?,?)");
	$asc = array($tapak_id, $borang, $tarikhBorang, $terimaBorang);
	$sc->execute($asc);	

	header("Location: ?p=Info-Site&id=$tapak_id");

?>


