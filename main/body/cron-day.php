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

//increment of tempoh in tapak

$sql="UPDATE tapak SET `tempoh`= `tempoh`+1 WHERE `kmb`!=''";		
$cd = $connect->prepare($sql);
$query = $cd->execute();
?>

<!-- -------------------------------------- -->

<?php

//increment of tempoh_lanjut in tapak

$sql="UPDATE tapak SET `tempoh_lanjut`= `tempoh_lanjut`+1 WHERE status_lawat = 1";		
$cd = $connect->prepare($sql);
$query = $cd->execute();
?>

<!-- -------------------------------------- -->




