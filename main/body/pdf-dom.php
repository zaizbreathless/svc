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
// include autoloader
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
?>

<?php

$type = $_POST['type'];
$results = $_POST['data'];
$header = $_POST['header'];

$tmp = urlencode($results);

// foreach ($results as $i) {
// 	echo $i;
// }
	
// $passvar = (object) [
// 		    'name' => 'query',
// 		    'data' => $results,
// 		];

if ($type == "site"){

	// $query = $pdo->prepare($results);
 //    $query->execute();

	//$dompdf->loadHtml('<h4>SENARAI PROJEKYANG TELAH MENDAPAT KMB 2017</h4>');

	$html = file_get_contents("http://svc-jkb.com/v4/main/body/pdf-site.php?id=$tmp&head=$header");


	//$postdata = http_build_query($results);

	// $opts = array('http' =>
	//     array(
	//         'method'  => 'POST',
	//         'header'  => 'Content-type: application/x-www-form-urlencoded',
	//         'content' => $postdata
	//     )
	// );

	// $context  = stream_context_create($opts);
	//$html = file_get_contents("pdf-site.php?id=".$results);

}

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF (1 = download and 0 = preview)
$dompdf->stream("codexworld",array("Attachment"=>0));
?>