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
		$hasil = $_FILES['foto']['name'];

		move_uploaded_file($_FILES['foto']['tmp_name'],'images/'.$hasil);
		$s = "INSERT INTO freelancer(id,f_nama,f_usia,f_telepon,f_ahli,f_deskripsi,f_portofolio) values ('$id', '$nama', '$umur', '$telp', '$ahli', '$bio', '$hasil');";

		$_SESSION["role"] = "freelancer";
		$_SESSION["name"] = $user;
		$_SESSION["logged"] = true;
		$_SESSION["free"] = true;
	}
	else if($_GET["role"] == "pengusaha"){
		$nama = $_POST["nama"];
		$alamat = $_POST["alamat"];
		$telp = $_POST["telp"];

		$s = "INSERT INTO pengusaha(pengusaha_id,nama,alamat,telepon) values ('$id', '$nama', '$alamat', '$telp');";
		$_SESSION["role"] = "pengusaha";
				$_SESSION["name"] = $user;
				$_SESSION["logged"] = true;
				$_SESSION["peng"] = false;
	}

	$q = mysqli_query($conn, $s);
	if($q){
		mysqli_close();
		header("location:index.php");
	}
?>
