<?php include 'body/header.php'; ?>

<?php
	$term = $_POST['q'];

	if(empty($term)){
		return json_encode([]);
	}else{
	$cd = $connect->prepare("SELECT psp_id, nameArc FROM psp WHERE nameArc LIKE '%".$term."%'");
	$acd = array($id);
	$cd->execute($acd);
	while($rcd = $cd->fetch(PDO::FETCH_ASSOC)){
		$psp_id = $rcd['psp_id'];
		$nameArc = $rcd['nameArc'];
		$results[] = [ 'id' => $psp_id, 'text' => $nameArc ];
		
	}

	echo json_encode($term);
	

    return json_encode($results);
	}	
?>