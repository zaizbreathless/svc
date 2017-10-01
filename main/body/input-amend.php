<?php include 'body/header.php'; ?>

<?php


	session_start();
	if(isset($_SESSION['username']))
	{
		$pindaan_id = $_POST["id"];
		$dariOSC = $_POST["dariOSC"];
		$sediaKP = $_POST["sediaKP"];
		$tahun = $_POST["tahun"];
		$noPermohonan = $_POST["noPermohonan"];
		$no_fail = $_POST["no_fail"];
		$rujukanOSC = $_POST["rujukanOSC"];
		$jenisPermohonan = $_POST["jenisPermohonan"];
		$kategoriProjek = $_POST["kategoriProjek"];
		$jenisPemajuan = $_POST["jenisPemajuan"];
		$kategoriPermohonan = $_POST["kategoriPermohonan"];
		$kaw = $_POST["kaw"];
		$kod = $_POST["kod"];
		$perkara = $_POST["perkara"];
		$lokasiTapak = $_POST["lokasiTapak"];

		$daftarOleh = $fullname;
		$tarikhDaftar = date("Y/m/d");

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

		$luasTapak = $_POST["luasTapak"];
		$luasLantai = $_POST["luasLantai"];
		$sediaPerakuan = $_POST["sediaPerakuan"];
		$kepMesyuarat = $_POST["kepMesyuarat"];
		$pelanStruktur = $_POST["pelanStruktur"];
		$terimaPelanStruktur = $_POST["terimaPelanStruktur"];
		$pelanSaniteri = $_POST["pelanSaniteri"];
		$terimaPelanSaniteri = $_POST["terimaPelanSaniteri"];
		$kpb = $_POST["kpb"];
		$kmb = $_POST["kmb"];
		$tarikhBorangB = $_POST["tarikhBorangB"];
		$tarikhBorangCCC = $_POST["tarikhBorangCCC"];
		$dlmPemantauan = $_POST["dlmPemantauan"];

		if($kmb==''){
			$tempoh = '0';
		}else{
			$start = date("Y/m/d");
			$end = $kmb;
			$tempoh = (strtotime($start) - strtotime($end))/24/3600;
		}

		
		

		$q = "INSERT INTO tapak(pindaan_id,dariOSC, sediaKP, tahun, noPermohonan, no_fail, rujukanOSC, jenisPermohonan, kategoriProjek, jenisPemajuan, kategoriPermohonan, 
			kaw, kod, tempoh, perkara, lokasiTapak, daftarOleh, tarikhDaftar, pemohonPSP, firmaPemohon, alamatPemohon, telPemohon, faxPemohon, pemilikPemaju, 
			firmaPemaju, alamatPemaju, telPemaju, faxPemaju, luasTapak, luasLantai, sediaPerakuan, kepMesyuarat, pelanStruktur, terimaPelanStruktur, 
			pelanSaniteri, terimaPelanSaniteri, kpb, kmb, tarikhBorangB, tarikhBorangCCC, dlmPemantauan)
			VALUES (:pindaan_id, :dariOSC, :sediaKP, :tahun, :noPermohonan, :no_fail, :rujukanOSC, :jenisPermohonan, :kategoriProjek, :jenisPemajuan, :kategoriPermohonan, 
				:kaw, :kod, :tempoh, :perkara, :lokasiTapak, :daftarOleh, :tarikhDaftar, :pemohonPSP, :firmaPemohon, :alamatPemohon, :telPemohon, :faxPemohon, :pemilikPemaju, 
			:firmaPemaju, :alamatPemaju, :telPemaju, :faxPemaju, :luasTapak, :luasLantai, :sediaPerakuan, :kepMesyuarat, :pelanStruktur, :terimaPelanStruktur, 
			:pelanSaniteri, :terimaPelanSaniteri, :kpb, :kmb, :tarikhBorangB, :tarikhBorangCCC, :dlmPemantauan);";
		$query = $connect->prepare($q);
		$results = $query->execute(array(
				":pindaan_id" => $pindaan_id,
				":dariOSC" => $dariOSC,
				":sediaKP" => $sediaKP,
				":tahun" => $tahun,
				":noPermohonan" => $noPermohonan,
				":no_fail" => $no_fail,
				":rujukanOSC" => $rujukanOSC,
				":jenisPermohonan" => $jenisPermohonan,
				":kategoriProjek" => $kategoriProjek,
				":jenisPemajuan" => $jenisPemajuan,
				":kategoriPermohonan" => $kategoriPermohonan,
				":kaw" => $kaw,
				":kod" => $kod,
				":tempoh" => $tempoh,
				":perkara" => $perkara,
				":lokasiTapak" => $lokasiTapak,

				":daftarOleh" => $daftarOleh,
				":tarikhDaftar" => $tarikhDaftar,

				":pemohonPSP" => $pemohonPSP,
				":firmaPemohon" => $firmaPemohon,
				":alamatPemohon" => $alamatPemohon,
				":telPemohon" => $telPemohon,
				":faxPemohon" => $faxPemohon,
				":pemilikPemaju" => $pemilikPemaju,
				":firmaPemaju" => $firmaPemaju,
				":alamatPemaju" => $alamatPemaju,
				":telPemaju" => $telPemaju,
				":faxPemaju" => $faxPemaju,

				":luasTapak" => $luasTapak,
				":luasLantai" => $luasLantai,
				":sediaPerakuan" => $sediaPerakuan,
				":kepMesyuarat" => $kepMesyuarat,
				":pelanStruktur" => $pelanStruktur,
				":terimaPelanStruktur" => $terimaPelanStruktur,
				":pelanSaniteri" => $pelanSaniteri,
				":terimaPelanSaniteri" => $terimaPelanSaniteri,
				":kpb" => $kpb,
				":kmb" => $kmb,
				":tarikhBorangB" => $tarikhBorangB,
				":tarikhBorangCCC" => $tarikhBorangCCC,
				":dlmPemantauan" => $dlmPemantauan
				

			));

		$id = $connect->lastInsertId();

		// $r = "INSERT INTO psp(nameArc, firmaArc, addArc, telArc, faxArc)
		// 	VALUES (:pemohonPSP, :firmaPemohon, :alamatPemohon, :telPemohon, :faxPemohon);";
		// $query = $connect->prepare($r);
		// $results = $query->execute(array(
				
		// 		":pemohonPSP" => $pemohonPSP,
		// 		":firmaPemohon" => $firmaPemohon,
		// 		":alamatPemohon" => $alamatPemohon,
		// 		":telPemohon" => $telPemohon,
		// 		":faxPemohon" => $faxPemohon

		// 	));

		// $s = "INSERT INTO owner(nameOwn, firmaOwn, addOwn, telOwn)
		// 	VALUES (:pemilikPemaju, :firmaPemaju, :alamatPemaju, :noTelPemaju);";
		// $query = $connect->prepare($s);
		// $results = $query->execute(array(
				
		// 		":pemilikPemaju" => $pemilikPemaju,
		// 		":firmaPemaju" => $firmaPemaju,
		// 		":alamatPemaju" => $alamatPemaju,
		// 		":noTelPemaju" => $noTelPemaju

		// 	));

		// $t = "INSERT INTO activity(act, user, no_fail, rujukanOSC, tarikhAct)
		// 	VALUES (:act, :user, :no_fail, :rujukanOSC, :tarikhAct);";
		// $query = $connect->prepare($t);
		// $results = $query->execute(array(
				
		// 		":act" => $act,
		// 		":user" => $user,
		// 		":no_fail" => $no_fail,
		// 		":rujukanOSC" => $rujukanOSC,
		// 		":tarikhAct" => $tarikhAct

		// 	));

		
		// header("Location: site_detail.php?id=$id");
		header("Location: ?p=Site-Amend&id=$pindaan_id");
	}



?>


		