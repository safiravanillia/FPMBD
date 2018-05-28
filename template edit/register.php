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

		$s = "SELECT * FROM user WHERE username = '$user'";
		$q = mysqli_query($conn, $s);
		if($q){
			$r=mysqli_num_rows($q);
			if($r > 0){
				echo "<script>
				alert('Pendaftaran gagal, username yang anda masukan sudah ada');
				window.location.href='index.php';
				</script>";
			}
			else{
				$sql = "INSERT INTO user VALUES(null,'$user', '$email', '$pass', '$role');";
			
				$query = mysqli_query($conn, $sql);
				if($query){
					$_SESSION["logged"] = true;
					$_SESSION["name"] = $user;
					$_SESSION["role"] = $role;
					header("location:getdata.php");	
				}
			}
		}
		

		
	}
?>