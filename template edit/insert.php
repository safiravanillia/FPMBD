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

	$sql = 'SELECT * FROM user';
	$query = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_array($query)){
		if($_SESSION["name"]==$row["username"]){
			$id = $row["id"];
		}
	}

	if($_GET["role"] == "freelancer"){
		$nama = $_POST["nama"];
		$umur = $_POST["umur"];
		$telp = $_POST["telp"];
		$ahli = $_POST["ahli"];
		$bio = $_POST["bio"];

		$s = "
			INSERT INTO freelancer values ('$id', '$nama', '$umur', '$telp', '$ahli', '$bio');
		";
	}
	else if($_GET["role"] == "pengusaha"){
		$nama = $_POST["nama"];
		$alamat = $_POST["alamat"];
		$telp = $_POST["telp"];

		$s = "
			INSERT INTO pengusaha values ('$id', '$nama', '$alamat', '$telp');
		";
	}

	$q = mysqli_query($conn, $s);
	if($q){
		header("location:index.php");
	}
?>