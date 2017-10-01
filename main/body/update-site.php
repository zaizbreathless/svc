<?php include 'body/header.php'; ?>

<?php

	
	$id = $_POST['id'];
	$dariOSC = $_POST["dariOSC"];
	$sediaKP = $_POST["sediaKP"];
	$tahun = $_POST["tahun"];
	$noPermohonan = $_POST["noPermohonan"];
	$no_fail = $_POST['no_fail'];
	$rujukanOSC = $_POST["rujukanOSC"];
	$jenisPermohonan = $_POST["jenisPermohonan"];
	$kategoriProjek = $_POST["kategoriProjek"];
	$jenisPemajuan = $_POST["jenisPemajuan"];
	$kategoriPermohonan = $_POST["kategoriPermohonan"];
	$kaw = $_POST['kaw'];
	$kod = $_POST['kod'];

	if($kmb==''){
		$tempoh = '0';
	}else{
		$start = date("Y/m/d");
		$end = $kmb;
		$tempoh = (strtotime($start) - strtotime($end))/24/3600;
	}
	
	$perkara = $_POST['perkara'];
	$lokasiTapak = $_POST["lokasiTapak"];
	$pemohonPSP = $_POST["pemohonPSP"];
	$firmaPemohon = $_POST["firmaPemohon"];
	$alamatPemohon = $_POST["alamatPemohon"];
	$telPemohon = $_POST["telPemohon"];
	$faxPemohon = $_POST["faxPemohon"];
	$pemilikPemaju = $_POST["pemilikPemaju"];
	$firmaPemaju = $_POST["firmaPemaju"];
	$alamatPemaju = $_POST["alamatPemaju"];
	$telPemaju = $_POST["telPemaju"];
	$faxPemaju = $_POST["faxPemaju"];

	$luasTapak = $_POST['luasTapak'];
	$luasLantai = $_POST['luasLantai'];
	$sediaPerakuan = $_POST['sediaPerakuan'];
	$kepMesyuarat = $_POST['kepMesyuarat'];
	$pelanStruktur = $_POST['pelanStruktur'];
	$terimaPelanStruktur = $_POST['terimaPelanStruktur'];
	$pelanSaniteri = $_POST['pelanSaniteri'];
	$terimaPelanSaniteri = $_POST['terimaPelanSaniteri'];
	$kpb = $_POST['kpb'];
	$kmb = $_POST['kmb'];
	$tarikhBorangB = $_POST['tarikhBorangB'];
	$tarikhBorangCCC = $_POST['tarikhBorangCCC'];
	$dlmPemantauan = $_POST['dlmPemantauan'];
	$client = $_POST['client'];

	// $act = $_POST["act"];
	// $user = $_SESSION["username"];
	// $tarikhAct = date("Y/m/d");
	
	

	$aic = array($dariOSC,$sediaKP,$tahun,$noPermohonan,$no_fail,$rujukanOSC,$jenisPermohonan,
		$kategoriProjek,$jenisPemajuan,$kategoriPermohonan,$kaw,$kod,$tempoh,$perkara,
		$lokasiTapak,$pemohonPSP,$firmaPemohon,$alamatPemohon,$telPemohon,$faxPemohon,$pemilikPemaju,
		$firmaPemaju,$alamatPemaju,$telPemaju,$faxPemaju,$luasTapak,$luasLantai,
		$sediaPerakuan,$kepMesyuarat,$pelanStruktur,$terimaPelanStruktur,$pelanSaniteri,$terimaPelanSaniteri,
		$kpb,$kmb,$tarikhBorangB,$tarikhBorangCCC,$dlmPemantauan,$client,$id);
	$icx = $connect->prepare("UPDATE tapak SET dariOSC=?, sediaKP=?, tahun=?, noPermohonan=?, 
		no_fail=?, rujukanOSC=?, jenisPermohonan=?, kategoriProjek=?, jenisPemajuan=?, kategoriPermohonan=?,  
		kaw=?, kod=?, tempoh=?, perkara=?, lokasiTapak=?, pemohonPSP=?, firmaPemohon=?, alamatPemohon=?, 
		telPemohon=?, faxPemohon=?, pemilikPemaju=?, firmaPemaju=?, alamatPemaju=?, 
		telPemaju=?, faxPemaju=?, luasTapak=?, luasLantai=?, sediaPerakuan=?, kepMesyuarat=?,
		pelanStruktur=?, terimaPelanStruktur=?, pelanSaniteri=?, terimaPelanSaniteri=?, kpb=?,
		kmb=?, tarikhBorangB=?, tarikhBorangCCC=?, dlmPemantauan=?, client=? WHERE id=?");
	$icx->execute($aic);

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


	header("Location: ?p=Info-Site&id=$id");
?>
