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
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$options = [
			'cost' => 11,
		];
		$pass = $_POST['passwd'];
		$hash = password_hash($pass, PASSWORD_BCRYPT, $options);
		$user = $_POST["user"];

		$sql = "select * from user where username='$user' and password='$hash'";
		//$query = mysqli_query($conn, $sql);
		$rs = mysqli_query($conn, $sql) or die (mysql_error());

		if($row=mysqli_fetch_assoc($rs)) {
			$_SESSION["name"] = $user;
			$_SESSION["logged"] = true;
			header('Location:index.php');
		}else {
		print '<center>Proses Login GAGAL</center>';
	}
	}
 ?>