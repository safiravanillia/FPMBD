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
		
		$pass = $_POST['passwd'];
		$user = $_POST["user"];

		$sql = "SELECT * FROM user WHERE username = '".$user."'";
		//$query = mysqli_query($conn, $sql);
		$rs = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_array($rs)){
			if(password_verify($pass, $row["password"])){
				$_SESSION["name"] = $user;
				$_SESSION["logged"] = true;
				header('Location:index.php');
			}
				else{
				print '<center>Proses Login GAGAL</center>';
			}
		} 

		/*if($rs){
			$_SESSION["name"] = $user;
			$_SESSION["logged"] = true;
			header('Location:index.php');
		}else {
		print '<center>Proses Login GAGAL</center>';
		}*/
	}
 ?>