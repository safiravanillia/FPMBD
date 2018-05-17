<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pweb";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if($conn->connect_error){
		die("Connection failed: ". $conn->connect_error);
	}
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$pass = $_POST['passwd'];
		$user = $_POST["user"];
		$email = $_POST["email"];
		$nrp = $_POST["nrp"];
		$depan = $_POST["depan"];
		$blkg = $_POST["blkg"];
		$ttl = $_POST["ttl"];
		$kota = $_POST["kota"];
		$asal = $_POST["asal"];
		$sby = $_POST["sby"];
		$telp = $_POST["telp"];
		$agama = $_POST["agama"];
		$foto = $_FILES['foto']['name'];
		$sql = "INSERT INTO user VALUES(NULL, '$user', '$email', '$pass', '$nrp', '$depan', '$blkg', '$ttl', '$kota', '$asal', '$sby', '$telp', '$agama', '$foto');";
		move_uploaded_file($_FILES['foto']['tmp_name'],'images/'.$foto);
		$query = mysqli_query($conn, $sql);
		if($query){
			$_SESSION["logged"] = true;
			$_SESSION["name"] = $user;
			header("location:index.php");	
		}
	}
?>
