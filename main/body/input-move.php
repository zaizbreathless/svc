<?php include 'body/header.php'; ?>

<?php

	$tapak_id = $_POST['id'];
	$pengguna = $fullname;
	$pengguna2 = $_POST["pengguna2"];
	$statusPergerakan = $_POST["statusPergerakan"];
	$memoPergerakan = $_POST["memoPergerakan"];
	$tarikhPergerakan = date("Y/m/d");

	// isi fail
	$sc = $connect->prepare("INSERT INTO fail_pergerakan (tapak_id, pengguna, pengguna2, statusPergerakan, memoPergerakan, tarikhPergerakan) VALUES (?,?,?,?,?,?)");
	$asc = array($tapak_id, $pengguna, $pengguna2, $statusPergerakan, $memoPergerakan, $tarikhPergerakan);
	$sc->execute($asc);	

	
?>

<?php
	
	$id = $_POST['id'];
	$pengguna = $fullname;
	$pengguna2 = $_POST["pengguna2"];	
	$statusPergerakan = $_POST["statusPergerakan"];
	$memoPergerakan = $_POST["memoPergerakan"];
	
	$aic = array($pengguna,$pengguna2,$statusPergerakan,$memoPergerakan,$id);
	$icx = $connect->prepare("UPDATE tapak SET pengguna=?, pengguna2=?, statusPergerakan=?, memoPergerakan=? WHERE id=?");
	$icx->execute($aic);

	header("Location: ?p=Site-Move&id=$tapak_id");


?>

<?php
	
	// $id = $_POST['id'];
	
	// $no_fail = $_POST['no_fail'];
	// $rujukanOSC = $_POST["rujukanOSC"];
	
	// $act = $_POST["act"];
	// $user = $_SESSION["username"];
	// $tarikhAct = date("Y/m/d");
	
	

	// $t = "INSERT INTO activity(act, user, no_fail, rujukanOSC, tarikhAct)
	// 		VALUES (:act, :user, :no_fail, :rujukanOSC, :tarikhAct);";
	// 	$query = $connect->prepare($t);
	// 	$results = $query->execute(array(
				
	// 			":act" => $act,
	// 			":user" => $user,
	// 			":no_fail" => $no_fail,
	// 			":rujukanOSC" => $rujukanOSC,
	// 			":tarikhAct" => $tarikhAct

	// 		));

?>

