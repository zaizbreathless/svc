<?php
//load database connection
    $host = "";
    $user = "svc-v4";
    $password = "4e2usaty8";
    $database_name = "faisal_svc-v4";
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
?>
<?php
	 $sql = $_GET['id'];
	 $header = $_GET['head'];
	//$id = rawurldecode($_GET['id']);
	
		//echo $sql;
		
	// echo $id[0][0];

	$query = $pdo->prepare($sql);
                                            
    $query->execute();



?>



<html>
<style>
table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
}

td ,th {
    font-style: arial;
    font-size: 12px;
}

</style>
	<body>
		<h4 align='center'>SENARAI PROJEK YANG TELAH MENDAPAT KEBENARAN MEMDIRIKAN BANGUNAN</h4>
		<table border='1' width='100%'>
			<tr>
				<th>BIL</th>
                <th>BP</th>
                <th>OSC</th>
                <th>PROJEK</th>
                <th>LOKASI</th>
                <th>PEMILIK</th>
                <th>PSP</th>
                 <?php if(strpos($header,'1')!== false){?><th>KAW</th><?php }?>
                <?php if(strpos($header,'2')!== false){?><th>KPB</th><?php }?>
                <?php if(strpos($header,'3')!== false){?><th>Borang B</th><?php }?>
                <?php if(strpos($header,'4')!== false){?><th>KMB</th><?php }?>
                <?php if(strpos($header,'5')!== false){?><th>Borang CCC</th><?php }?>



			</tr>


		<?php

		$index = 1;
			while ($row = $query->fetch()) {?>

					<tr>
						<td><?php echo $index++;?></td>
						<td><?php echo $row['no_fail'];?></td>
						<td><?php echo $row['rujukanOSC'];?></td>
						<td><?php echo $row['perkara']?></td>
						<td><?php echo $row['lokasiTapak']?></td>
						<td><?php echo $row['pemilikPemaju'];?></td>
						<td><?php echo $row['pemohonPSP'];?></td>
						<?php if(strpos($header,'1')!== false){?><td><?php echo $row['kaw'];?></td><?php }?>
						<?php if(strpos($header,'2')!== false){?><td><?php echo $row['kpb'];?></td><?php }?>
						<?php if(strpos($header,'3')!== false){?><td><?php echo $row['tarikhBorangB'];?></td><?php }?>
						<?php if(strpos($header,'4')!== false){?><td><?php echo $row['kmb'];?></td><?php }?>
						<?php if(strpos($header,'5')!== false){?><td><?php echo $row['tarikhBorangCCC'];?></td><?php }?>


					</tr>

			<?php } ?>
		</table>
	</body>

</html>