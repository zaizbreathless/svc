<?php include 'body/header.php'; ?>

<?php

	$tapak_id = $_POST['id'];
	$tarikhM = $_POST['tarikhM'];
	$jenisM = $_POST['jenisM'];
	$bilM = $_POST['bilM'];
	$tujuanM = $_POST['tujuanM'];
	$lainMesyuarat = $_POST['lainMesyuarat'];
	$keputusanM = $_POST['keputusanM'];
	$lainKeputusan = $_POST['lainKeputusan'];
	$entri = $fullname;

	$sc = $connect->prepare("INSERT INTO mesyuarat (tapak_id, tarikhM, jenisM, bilM, tujuanM, lainMesyuarat, keputusanM, lainKeputusan, entri) VALUES (?,?,?,?,?,?,?,?,?)");
	$asc = array($tapak_id, $tarikhM, $jenisM, $bilM, $tujuanM, $lainMesyuarat, $keputusanM, $lainKeputusan, $entri);
	$sc->execute($asc);	

	header("Location: ?p=Info-Site&id=$tapak_id");
?>