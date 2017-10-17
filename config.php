<?php
//We start sessions
session_start();

date_default_timezone_set("Asia/Dubai");

/******************************************************
------------------Required Configuration---------------
Please edit the following variables so the members area
can work correctly.
******************************************************/

//We log to the DataBase
mysql_connect('localhost', 'root', '');
mysql_select_db('svc');

//Webmaster Email
// $mail_webmaster = 'mdkhussairiee.a@gmail.com';

//Top site root URL
// $url_root = 'http://www.ariescrm.com/';

/******************************************************
-----------------Optional Configuration----------------
******************************************************/

//Home page file name
$url_home = 'index.php';

//Design Name
$design = 'default';
?>

<?php
            $dnn = mysql_fetch_array(mysql_query('select username,staff_id,password,email,role,fullname from users where username="'.$_SESSION['username'].'"'));
            $username = htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8');
            $staff_id = htmlentities($dnn['staff_id'], ENT_QUOTES, 'UTF-8');
            $password = htmlentities($dnn['password'], ENT_QUOTES, 'UTF-8');
            $email = htmlentities($dnn['email'], ENT_QUOTES, 'UTF-8');
            $role = htmlentities($dnn['role'], ENT_QUOTES, 'UTF-8');
            $fullname = htmlentities($dnn['fullname'], ENT_QUOTES, 'UTF-8');
?>

<?php
//load database connection
    $host = "";
    $user = "root";
    $password = "";
    $database_name = "svc";
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
?>


<?php

$host = "";
$username = "root";
$password = "";
$database = "svc";
$connect = new PDO("mysql: host=$host; dbname=$database", $username, $password);


?>

<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "svc";

try {
        $connect = new PDO("mysql: host=$host; dbname=$database", $username, $password);
    }
catch(PDOException $e) {
        echo "We are experiencing database connection problems. Sorry for the trouble.<br>";
    }

?>
