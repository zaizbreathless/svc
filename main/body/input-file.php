<?php include 'body/header.php'; ?>

<?php

	$tapak_id = $_POST['id'];

	if(isset($_FILES['selectfile']))
		{
			for($i = 0; $i < count($_FILES['selectfile']['name']); $i++)
				{	
					// $id = $connect->lastInsertId();
					$filetmp = $_FILES["selectfile"]["tmp_name"][$i];
					$filename = $_FILES["selectfile"]["name"][$i];
					$filename = preg_replace("#[^a-z0-9.]#i", "", $filename);
					$filename2 = mt_rand(100000, 999999).$filename;
					$filedescription = $_POST['filedescription'][$i];
					$filetype = $_FILES["selectfile"]["type"][$i];
					$filepath = "./files-client/".$filename2;
				
				move_uploaded_file($filetmp,$filepath);
				
				$sql = "INSERT INTO fail_tapak (tapak_id,nama_ori,nama_baru,file_desc,fail_path,fail_type) 
				VALUES ('$tapak_id','$filename','$filename2','$filedescription','$filepath','$filetype')";
				$result = mysql_query($sql);
				
				}

		}

	header("Location: ?p=Site-File&id=$tapak_id");


?>
    

