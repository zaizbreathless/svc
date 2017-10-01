<?php include 'body/header.php'; ?>

<?php

$host = "localhost";
$username = "svc-v4";
$password = "4e2usaty8";
$database = "faisal_svc-v4";

try {
        $connect = new PDO("mysql: host=$host; dbname=$database", $username, $password);  
    }  
catch(PDOException $e) {  
        echo "We are experiencing database connection problems. Sorry for the trouble.<br>";
    } 

//SET status_lawat=0 if tempoh_lanjut>59

$sql="UPDATE tapak SET `tempoh`=0 WHERE `status_lawat`=1";		
$cd = $connect->prepare($sql);
$query = $cd->execute();
?>

<!-- ---------------------------------------------------------- -->

<?php

//SET status_lawat=0 if tempoh_lanjut>59

$sql="UPDATE tapak SET `tempoh`=60,`status_lawat`=0 WHERE `tempoh_lanjut`>59";		
$cd = $connect->prepare($sql);
$query = $cd->execute();

$sql="UPDATE tapak SET `tempoh_lanjut`=0 WHERE `status_lawat`=0";		
$cd = $connect->prepare($sql);
$query = $cd->execute();

$sql="UPDATE tapak SET `tempoh`=0, `tempoh_lanjut`=0, `status_lawat`=2 WHERE `tarikhBorangCCC`!=''";		
$cd = $connect->prepare($sql);
$query = $cd->execute();
?>

<!-- ---------------------------------------------------------- -->

<?php

	$sql="UPDATE `tapak` SET `hantarKP` = DATE_ADD(dariOSC, INTERVAL 1 DAY) WHERE sediaKP = 1";		
	$cd = $connect->prepare($sql);
	$query = $cd->execute();

	$sql="UPDATE `tapak` SET `hantarKP` = DATE_ADD(dariOSC, INTERVAL 3 DAY) WHERE sediaKP = 3";		
	$cd = $connect->prepare($sql);
	$query = $cd->execute();

	$sql="UPDATE `tapak` SET `hantarKP` = DATE_ADD(dariOSC, INTERVAL 7 DAY) WHERE sediaKP = 7";		
	$cd = $connect->prepare($sql);
	$query = $cd->execute();

	$sql="UPDATE `tapak` SET `hantarKP` = DATE_ADD(dariOSC, INTERVAL 14 DAY) WHERE sediaKP = 14";		
	$cd = $connect->prepare($sql);
	$query = $cd->execute();

	$sql="UPDATE `tapak` SET `hantarKP` = DATE_ADD(dariOSC, INTERVAL 30 DAY) WHERE sediaKP = 30";		
	$cd = $connect->prepare($sql);
	$query = $cd->execute();

?>