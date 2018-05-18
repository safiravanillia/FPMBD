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

    <style>
    	.tempat{
    		width : 700px;
    		height : 600px;
    		box-shadow: 0px 4px 8px 0 rgba(0, 0, 0, 0.2);
    		margin-top : 70px;
    		margin-left : 130px;
    	}

    	.form-container{
    		margin-left: 50px;
    		padding-top : 30px;
    	}

    	.slidecontainer {
		    width: 50%;
		}

		.slider {
		    -webkit-appearance: none;
		    width: 100%;
		    height: 25px;
		    background: #d3d3d3;
		    outline: none;
		    opacity: 0.7;
		    -webkit-transition: .2s;
		    transition: opacity .2s;
		}

		.slider:hover {
		    opacity: 1;
		}

		.slider::-webkit-slider-thumb {
		    -webkit-appearance: none;
		    appearance: none;
		    width: 25px;
		    height: 25px;
		    background: #4CAF50;
		    cursor: pointer;
		}

		.slider::-moz-range-thumb {
		    width: 25px;
		    height: 25px;
		    background: #4CAF50;
		    cursor: pointer;
		}

		h3{
			color : #e30066;
			text-align : center;
		}

		.berhasil{
			width : 300px;
			height : auto;
			background-color : #229b60;
			border-radius : 8px;
			border-style: solid;
   		 	border-width: 1px;
   		 	border-color : #1c7a4c;
   		 	padding : 15px 15px 15px 15px;
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
		}

    </style>

  </head>

  <body>
  		<div class = "tempat">
  			<h3>Penawaran</h3>
  			<div class = "form-container">
		  		<form method = "post"  enctype="multipart/form-data">
		  			<div class = "form-group">
		  				Ambil pekerjaan dengan harga <br />
		  				<div class ="slidecontainer">
			  				Harga Minimal : <?php echo $min;?>
			  				<input type="range" class = "slider" name="points" min=<?php echo '"'.$min.'"';?> max=<?php echo '"'.$max.'"';?> id = "myRange">
			  				Harga Maksimal : <?php echo $max;?>
			  			</div>
						<p>Harga: <span id="demo"></span></p>
						<input type="submit" class="btn btn-info" value="Ambil">
		  			</div>
		  		</form>
		  		<?php
		  			if($_SERVER["REQUEST_METHOD"] == "POST"){
		  				$harga = $_POST["points"];
		  				$sql = "INSERT INTO `tawar` (`bid_id`, `k_id`, `f_id`, `harga`, `b_status`) VALUES ('', '$k_id', '$id', '$harga', 'TUNGGU')";
		  				//echo $sql;
		  				$result = mysqli_query($conn, $sql);
		  				if($result){
		  					echo '<div class = "berhasil">
		  							Penawaran berhasil, silahkan tunggu sampai perusahaan bersangkutan mengubah status penawaran anda.
		  						</div>';
		  					echo '<br/><a href = "project.php">Kembali</a>';
		  				}
		  				else {
		  					echo '<div class = "gagal">
		  							Penawaran gagal. Data belum lengkap.
		  						</div>';
		  				}
		  			}
		  		?>
		  	</div>
	  	</div>

  		<script>
  			var slider = document.getElementById("myRange");
			var output = document.getElementById("demo");
			output.innerHTML = slider.value;

			slider.oninput = function() {
			  output.innerHTML = this.value;
			}
  		</script>
  </body>
</html>