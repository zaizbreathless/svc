<?php
include('../config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>SVC JKB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="http://ariestelecoms.com.my/assets/favicon.ico" />
    <style type="text/css">
          body {
    padding-top: 120px;
    padding-bottom: 40px;
    background-color: #eee;

  }
  .btn
  {
   outline:0;
   border:none;
   border-top:none;
   border-bottom:none;
   border-left:none;
   border-right:none;
   box-shadow:inset 2px -3px rgba(0,0,0,0.15);
  }
  .btn:focus
  {
   outline:0;
   -webkit-outline:0;
   -moz-outline:0;
  }
  .fullscreen_bg {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-size: cover;
    background-position: 50% 50%;
    background-image: url('http://wallpapercave.com/wp/wp1842894.jpg');
    background-repeat:repeat;
  }
  .form-signin {
    max-width: 280px;
    padding: 15px;
    margin: 0 auto;
      margin-top:50px;
  }
  .form-signin .form-signin-heading, .form-signin {
    margin-bottom: 10px;
  }
  .form-signin .form-control {
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }
  .form-signin .form-control:focus {
    z-index: 2;
  }
  .form-signin input[type="text"] {
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: none;
    border-left-style: solid;
    border-color: #000;
  }
  .form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-top-style: none;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
    border-color: rgb(0,0,0);
    border-top:1px solid rgba(0,0,0,0.08);
  }
  .form-signin-heading {
    color: #fff;
    text-align: center;
    text-shadow: 0 2px 2px rgba(0,0,0,0.5);
  }
  .alert-group>.alert:first-child:not(:last-child){
    -webkit-border-top-left-radius:5px;
    -webkit-border-top-right-radius:5px;
    -webkit-border-bottom-right-radius:0;
    -webkit-border-bottom-left-radius:0;
       -moz-border-radius-topleft:5px;
       -moz-border-radius-topright:5px;
       -moz-border-radius-bottomright:0;
       -moz-border-radius-bottomleft:0;
            border-top-left-radius:5px;
            border-top-right-radius:5px;
            border-bottom-right-radius:0;
            border-bottom-left-radius:0;
    margin-bottom:0
}
.alert-group>.alert:not(:first-child):not(:last-child){
    -webkit-border-radius:0;
       -moz-border-radius:0;
            border-radius:0;
    border-top:0;
    margin-bottom:0
}
.alert-group>.alert:last-child:not(:first-child){
    -webkit-border-top-left-radius:0;
    -webkit-border-top-right-radius:0;
    -webkit-border-bottom-right-radius:5px;
    -webkit-border-bottom-left-radius:5px;
       -moz-border-radius-topleft:0;
       -moz-border-radius-topright:0;
       -moz-border-radius-bottomright:5px;
       -moz-border-radius-bottomleft:5px;
            border-top-left-radius:0;
            border-top-right-radius:0;
            border-bottom-right-radius:5px;
            border-bottom-left-radius:5px;
    border-top:0
}
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="fullscreen_bg" class="fullscreen_bg"/>

<div class="container">

<?php
//If the user is logged, we log him out
if(isset($_SESSION['username']))
{
	//We log him out by deleting the username and userid sessions
	unset($_SESSION['username'], $_SESSION['userid']);
?>

<?php
}
else
{
	$ousername = '';
	//We check if the form has been sent
	if(isset($_POST['username'], $_POST['password']))
	{
		//We remove slashes depending on the configuration
		if(get_magic_quotes_gpc())
		{
			$ousername = stripslashes($_POST['username']);
			$username = mysql_real_escape_string(stripslashes($_POST['username']));
			$password = stripslashes($_POST['password']);
		}
		else
		{
			$username = mysql_real_escape_string($_POST['username']);
			$password = $_POST['password'];
		}
		//We get the password of the user
		$req = mysql_query('select password,id from users where username="'.$username.'"');
		$dn = mysql_fetch_array($req);
		//We compare the submited password and the real one, and we check if the user exists
		if($dn['password']==$password and mysql_num_rows($req)>0)
		{
			//If the password is good, we dont show the form
			$form = false;
			//We save the user name in the session username and the user Id in the session userid
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['userid'] = $dn['id'];
?>

<meta http-equiv="refresh" content="3; URL='../main/'" />

<?php
//Login Security Alert

date_default_timezone_set("Asia/Dubai");
$masa = date("d/M/Y");
$ipaddress = $_SERVER['REMOTE_ADDR'];

$to = 'zaizbreathless@yahoo.com.my';
$subject = 'Security Login Alert';
$from = 'zaizbreathless@gmail.com';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Compose a simple HTML email message
$message = '<html><body>';
$message .= 'Hi Admin<br><br>';
$message .= '<p><b>'.$username.'</b> are login into the SVC Online system using IP: <b>'.$ipaddress.'</b> <br><br><b>Date:</b> '.$masa.' | <b>Time:</b> '.date("h:i:sa").'</p>';
$message .= '<br>Thank You.<br><br>This email is automatically generated through the SVC Online system.';
$message .= '</body></html>';

// Sending email
if(mail($to, $subject, $message, $headers)){
    echo '
		<p>
		<div class="alert-group">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Disahkan!</strong> Anda berjaya dan bersedia untuk mengakses sistem dalam masa 3 saat.
            </div>
		</div>
		</p>
		 ';
} else{
}

?>

<?php
		}
		else
		{
			//Otherwise, we say the password is incorrect.
			$form = true;
      echo '
    <p>
    <div class="alert-group">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>ID atau KATA LALUAN salah!</strong> Sila masukkan ID dan Kata Laluan yang betul atau hubungi ADMIN untuk bantuan.
            </div>
    </div>
    </p>
     ';
		}
	}
	else
	{
		$form = true;
	}
	if($form)
	{
		//We display a message if necessary
	if(isset($message))
	{
		echo '<div class="message">'.$message.'</div>';
	}
	//We display the form
?>

	<form class="form-signin" action="" method="post">
		<h2 class="form-signin-heading text-muted"><img src="" />SVC JKB</h2><div align="right"><font color="#FFFFFF">SVC v4.0</font></div>
		<input type="text" class="form-control" placeholder="ID" name="username" id="username" value="<?php echo htmlentities($ousername, ENT_QUOTES, 'UTF-8'); ?>" required autofocus>
		<input type="password" class="form-control" placeholder="Kata Laluan" name="password" id="password" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
	</form>

    <div align="center"><font color="#FFFFFF">Viz Tech &COPY; 2016 - <?php echo date('Y') ?><br>
<?php

$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

function getOS() {

    global $user_agent;

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) {

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }

    return $os_platform;

}

function getBrowser() {

    global $user_agent;

    $browser        =   "Unknown Browser";

    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld Browser'
                        );

    foreach ($browser_array as $regex => $value) {

        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }

    }

    return $browser;

}


$user_os        =   getOS();
$user_browser   =   getBrowser();

$device_details =   "".$user_os."";

print_r($device_details);

//echo("<br /><br /><br />".$_SERVER['HTTP_USER_AGENT']."");

?>
    </div>

<?php
	}
}
?>
</font><br>
</div>
<script type="text/javascript">

</script>
</body>
</html>
