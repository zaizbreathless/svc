<?php include 'body/header.php'; ?>

<?php

	$tapak_id = $_POST['id'];
	$noBil = $_POST['noBil'];
	$tarikhBil = $_POST['tarikhBil'];
	$amaunBil = $_POST['amaunBil'];
	$tujuan = $_POST['tujuan'];
	$noResit = $_POST['noResit'];
	$tarikhResit = $_POST['tarikhResit'];
	$entri = $fullname;

	// isi bayaran
	$sc = $connect->prepare("INSERT INTO bayaran (tapak_id, noBil, tarikhBil, amaunBil, tujuan, noResit, tarikhResit, entri) VALUES (?,?,?,?,?,?,?,?)");
	$asc = array($tapak_id, $noBil, $tarikhBil, $amaunBil, $tujuan, $noResit, $tarikhResit, $entri);
	$sc->execute($asc);		

	header("Location: ?p=Info-Site&id=$tapak_id");

?>



	


