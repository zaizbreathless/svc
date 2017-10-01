<?php include 'body/header.php'; ?>

<?php

	$tapak_id = $_POST['id'];
	$laporan = $_POST['laporan'];
	$tindakan = $_POST['tindakan'];
	$pegawai = $fullname;
	$tarikh = $_POST['tarikh'];
	$masa = $_POST['masa'];

	// isi visits
	$sc = $connect->prepare("INSERT INTO lawat (tapak_id, laporan, tindakan, pegawai, tarikh, masa) VALUES (?,?,?,?,?,?)");
	$asc = array($tapak_id, $laporan, $tindakan, $pegawai, $tarikh, $masa);
	$sc->execute($asc);	

?>


<?php
	if(isset($_FILES['selectfile']))
		{
			for($i = 0; $i < count($_FILES['selectfile']['name']); $i++)
				{	
					$id = $connect->lastInsertId();
					$filetmp = $_FILES["selectfile"]["tmp_name"][$i];
					$filename = $_FILES["selectfile"]["name"][$i];
					$filename = preg_replace("#[^a-z0-9.]#i", "", $filename);
					$filename2 = mt_rand(100000, 999999).$filename;
					$filedescription = $_POST['filedescription'][$i];
					$filetype = $_FILES["selectfile"]["type"][$i];
					$filepath = "./files/".$filename2;
				
				move_uploaded_file($filetmp,$filepath);
				
				$sql = "INSERT INTO fail_lawat (lawat_id,nama_ori,nama_baru,file_desc,fail_path,fail_type) 
				VALUES ('$id','$filename','$filename2','$filedescription','$filepath','$filetype')";
				$result = mysql_query($sql);
				
				}

		}


?>

<?php

	$tapak_id = $_POST['id'];
	$status_lawat = "1";

	//update status_lawat = 1 in tapak
	$aic = array($status_lawat);
	$icx = $connect->prepare("UPDATE tapak SET status_lawat=1 WHERE id=$tapak_id");
	$icx->execute($aic);

	header("Location: ?p=Site-Visit&id=$tapak_id");
?>

<br>
    Complete Visiting Site
    

