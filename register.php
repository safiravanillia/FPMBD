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
		$pass = $_POST['passwd'];
		$user = $_POST["user"];
		$email = $_POST["email"];
		$role = $_POST["role"];
		$sql = "INSERT INTO user VALUES(null,'$user', '$email', '$pass', '$role');";
		
		$query = mysqli_query($conn, $sql);
		if($query){
			$_SESSION["logged"] = true;
			$_SESSION["name"] = $user;
			$_SESSION["role"] = $role;
			header("location:getdata.php");	
		}
	}
?>
