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

  $id = $_GET["id"];
  $k_id = $_GET["k_id"]; 

  $sql = "SELECT hargamin, hargamax FROM pekerjaan WHERE pekerjaan.k_id = ".$k_id;
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)){
  	$min = $row["hargamin"];
  	$max = $row["hargamax"];
  }
?>

<!DOCTYPE html>
<html lang="en">

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

  </head>

  <body>
  		<form method = "post">
  			<div class = "form-group">
  				Ambil dengan harga <br />
  				<?php echo $min;?>
  				<input type="range" name="points" min=<?php echo '"'.$min.'"';?> max=<?php echo '"'.$max.'"';?> onchange="updateTextInput(this.value);">
  				<?php echo $max;?>
  				<br />
				<input type="text" id="textInput" value="">
				<input type = "submit">
  			</div>
  		</form>

  		<?php
  			if($_SERVER["REQUEST_METHOD"] == "POST"){
  				$harga = $_POST["points"];
  				$sql = "INSERT INTO `tawar` (`bid_id`, `k_id`, `f_id`, `harga`, `b_status`) VALUES ('', '$k_id', '$id', '$harga', 'TUNGGU')";
  				echo $sql;
  				$result = mysqli_query($conn, $sql);
  				if($result){
  					echo "query success";
  				}
  				else {echo "failure";}
  			}
  		?>

  		<script>
  			function updateTextInput(val) {
          		document.getElementById('textInput').value=val; 
        	}
  		</script>
  </body>
</html>