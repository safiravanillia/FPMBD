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
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <title>Freelancer -mosv-</title>
	    <link rel="shortcut icon" href="img/favicon-01.png">

	    <!-- Global Stylesheets -->
	    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
	    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href="css/animate/animate.min.css">
	    <link rel="stylesheet" href="css/owl-carousel/owl.carousel.min.css">
	    <link rel="stylesheet" href="css/owl-carousel/owl.theme.default.min.css">
	    <link rel="stylesheet" href="css/style.css">

	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

		<style>
		.berhasil{
			width : 300px;
			height : auto;
			background-color : #229b60;
			border-radius : 8px;
			border-style: solid;
   		 	border-width: 1px;
   		 	border-color : #1c7a4c;
   		 	padding : 15px 15px 15px 15px;
   		 	margin-top : 10px;
		}

		.gagal{
			width : 300px;
			height : auto;
			background-color : #9b2222;
			border-radius : 8px;
			border-style: solid;
   		 	border-width: 1px;
   		 	border-color : #7a1c1c;
   		 	padding : 15px 15px 15px 15px;
   		 	margin-top : 10px;
		}
		</style>	
	</head>

	<body>

		<?php
			if($_SESSION["role"]== "pengusaha"){
				echo '
					<div class = "edit">
						<form method = "post">	
						<div class = "input-group">
						Ubah Status <br />
						<div class = "checkbox">
							<label>
						      <input type="radio" name ="role" value="TERIMA" checked="checked"> TERIMA
						    </label>
							</div>
							<div class = "checkbox">
								<label>
							      <input type="radio" name ="role" value="TOLAK" checked="checked"> TOLAK
						        </label>
							</div>
						</div>
						<div class = "input-group">
							<button type="submit" class="btn btn-general btn-white">Ubah</button>
						</div>
						</form>
					</div>
				';
			}
			else{
				echo '
					<div class = "edit">
						<form method = "post">	
						<div class = "input-group">
						Ubah Status <br />
						<div class = "checkbox">
							<label>
						      <input type="radio" name ="role" value="PROGRESS" checked="checked"> PROGRESS
						    </label>
							</div>
							<div class = "checkbox">
								<label>
							      <input type="radio" name ="role" value="SELESAI" checked="checked"> SELESAI
						        </label>
							</div>
						</div>
						<div class = "input-group">
							<button type="submit" class="btn btn-general btn-white">Ubah</button>
						</div>
						</form>
					</div>
				';
			}
		?>

		<?php
				$bid = $_GET["bid_id"];
				if($_SERVER["REQUEST_METHOD"]=="POST"){
					$status = $_POST["role"];
					$sql = "UPDATE tawar SET b_status = '".$status."' WHERE bid_id = ".$bid;
					//echo $sql;
					$result = mysqli_query($conn, $sql);
					if($result){
						echo '<div class = "berhasil">Status berhasil di ubah</div>';
						if($_SESSION["role"]=="pengusaha")
							echo '<a href = "profilpeng.php">Kembali</a>';
						else{
							echo '<a href = "profilfree.php">Kembali</a>';
						}
						

					}
					else{
						echo '<div class = "gagal">Perubahan gagal</div>';
					}
				}
			?>
	</body>
</html>