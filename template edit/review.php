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
	</head>

	<body>
<!--====================================================
                        ISI DATA
======================================================--> 
    <section id="contact-p1" class="contact-p1">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="contact-p1-cont">
              <h3><br>UNTUK FREELANCER YANG LEBIH BAIK</h3>
              <div class="heading-border-light"></div> 
            </div>
          </div> 
        </div>
      </div>
    </section>

<div class="container">
  	<div class="row">
  		<div class="col-md-6">
		<?php
			echo '
			<form method="post">
					<div class = "form-group">
						Review:
						<textarea name="komen" rows="10" cols="70" max="500" placeholder="Berikan feedback Anda" required/></textarea>
					</div>
					<div class = "form-group">
						Berikan Penilaian (1-5):
                              <select name="rating">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                         </select>
					</div>
					<div class = "form-group">
						<input type="submit" name="kirim" class="btn btn-general btn-white" value="kirim"/>
					</div>
					</form>
				';
		?>
		</div>
	 </div>
</div>
<?php
$bid = $_GET["bid_id"];
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['kirim'])){
	$komentar = $_POST["komen"];
    $rate = $_POST["rating"];

    $sql = "INSERT INTO `review` VALUES ('', '$bid', '$komentar', NOW(), '$rate');";
    $result = mysqli_query($conn, $sql);
    if($result){
    	header('Location: profilpeng.php');
	}else {
		echo '<div class = "gagal"> gagal</div>';
	}
}               
?>
	</body>
</html>