<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mosv";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if($conn->connect_error){
		die("Connection failed: ". $conn->connect_error);
	}

	if($_SERVER["REQUEST_METHOD"]=="POST"){
		
		$options = [
			'cost' => 11,
		];

		$pass = $_POST['passwd'];
		$hash = password_hash($pass, PASSWORD_BCRYPT, $options);

		$user = $_POST["user"];
		$email = $_POST["email"];
		$role = $_POST["role"];

		$sql = "
			INSERT INTO user VALUES(NULL, '$user', '$email', '$hash', '$role');
		";
		$query = mysqli_query($conn, $sql);

		if($query){
			$_SESSION["logged"] = true;
			$_SESSION["name"] = $user;
			$_SESSION["role"] = $role;
			header("location:getdata.php");	
		}
	}
?>