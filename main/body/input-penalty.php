<?php include 'body/header.php'; ?>

<?php

	$tapak_id = $_POST['id'];
	$no_bkb = $_POST["no_bkb"];
	$kepada = $_POST["kepada"];
	$alamat = $_POST["alamat"];
	$akta = $_POST["akta"];
	$kecil = $_POST["kecil"];
	$kesalahan = $_POST["kesalahan"];
	$tempat = $_POST["tempat"];
	$tarikh = $_POST["tarikh"];
	$masa = $_POST["masa"];
	$tarikh_luput = $_POST["tarikh_luput"];
	$no_fail = $_POST["no_fail"];
	$rujukanOSC = $_POST["rujukanOSC"];

	// isi kompaun
	$sc = $connect->prepare("INSERT INTO kompaun (tapak_id, no_bkb, kepada, alamat, akta, kecil, kesalahan, tempat, tarikh, masa, tarikh_luput, no_fail, rujukanOSC) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
	$asc = array($tapak_id, $no_bkb, $kepada, $alamat, $akta, $kecil, $kesalahan, $tempat, $tarikh, $masa, $tarikh_luput, $no_fail, $rujukanOSC);
	$sc->execute($asc);	

	header("Location: ?p=Site-Penalty&id=$tapak_id");


?>
