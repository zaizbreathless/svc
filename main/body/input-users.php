<?php include 'body/header.php'; ?>

<?php

	session_start();
	if(isset($_SESSION['username']))
	{
		$fullname = $_POST["fullname"];
		$staff_id = $_POST["staff_id"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$email = $_POST["email"];
		$role = $_POST["role"];
		$signup_date = date("Y/m/d");


		$q = "INSERT INTO users(fullname, staff_id, username, password, email, role, signup_date)
			VALUES (:fullname, :staff_id, :username, :password, :email, :role, :signup_date);";
		$query = $connect->prepare($q);
		$results = $query->execute(array(
				":fullname" => $fullname,
				":staff_id" => $staff_id,
				":username" => $username,
				":password" => $password,
				":email" => $email,
				":role" => $role,
				":signup_date" => $signup_date

			));

		
		header("Location: ?p=Users-List");
	}



?>


		