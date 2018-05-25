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
			.badan{
				width : 100%;
				height : auto;
				padding-bottom : 70px;
				margin-top : 70px;
				color : black;
			}

			.penawar{
				width : 95%;
				height : auto;
				padding : 20px 20px 20px 20px;
				border-bottom : 1px solid #e30066;
			}

			.job-available{
      width : 635px;
      height : auto;
      border-bottom : 1px solid #e30066;
    }

    .nama{
      font-weight : bold;
      font-size : 20px;
      color : #e30066 ;
    }

    .tanda {
    color: orange;
    }
		</style>
	</head>

	<body>
		<section id="contact-p1" class="contact-p1">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="contact-p1-cont">
              <h3><br>LIST PENAWAR</h3>
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
						$kerja = $_GET["k_id"];
						$sql = "SELECT  tawar.`bid_id`,freelancer.`f_nama`,freelancer.`f_ahli`,freelancer.`f_deskripsi`,freelancer.`f_portofolio` ,tawar.`harga`,tawar.`b_status`,r.rate as rating
						FROM (SELECT freelancer.`id` AS idf, ROUND(AVG(review.`rating`),1) AS rate
						FROM review RIGHT JOIN tawar 
						ON review.`bid_id`=tawar.`bid_id` RIGHT JOIN freelancer
						ON tawar.`f_id`=freelancer.`id` RIGHT JOIN pekerjaan
						ON tawar.k_id=pekerjaan.k_id RIGHT JOIN pengusaha
						ON pekerjaan.pengusaha_id=pengusaha.pengusaha_id
						WHERE freelancer.`id` IN (SELECT freelancer.`id`
						FROM pekerjaan, freelancer, tawar
						WHERE pekerjaan.`k_id` = tawar.`k_id` 
						AND tawar.`f_id` = freelancer.`id` 
						AND pekerjaan.`pengusaha_id` = '$id'
						AND tawar.`k_id` = '$kerja')
						GROUP BY freelancer.`f_nama`)AS r, pekerjaan, freelancer, tawar
						WHERE pekerjaan.`k_id` = tawar.`k_id` 
						AND tawar.`f_id` = freelancer.`id` 
						AND pekerjaan.`pengusaha_id` = '$id'
						AND tawar.`k_id` = '$kerja'
						AND r.idf=freelancer.`id`;";
						
						$result = mysqli_query($conn, $sql);
						if($result){
							while($row = mysqli_fetch_array($result)){
								$nama=$row["f_nama"];
								$ahli=$row["f_ahli"];
								$desk=$row["f_deskripsi"];
								$harga=$row["harga"];
								$status=$row["b_status"];
								$bid=$row["bid_id"];
								$porto=$row["f_portofolio"];
								$rating=$row["rating"];
								echo '
								<div class = "penawar">
									<div class="nama">'.$nama.'</div>
									<table class="table">
									<tr>
									<td>Penilaian </td>';
									if($rating==null){
									echo' <td><span class="fa fa-star tanda"></span> 0.0  </td>';
								}else{
									echo' <td><span class="fa fa-star tanda"></span> '.$rating.'  </td>';
								}
								echo'
									<tr>
									<td>Keahlian </td>
									<td> '.$ahli.' </td>
									</tr>

									<tr>
									<td>Deskripsi Penawar</td>
									<td>'.$desk.' </td>
									</tr>

									<tr>
									<td>Portofolio </td>
									<td> <img src ="data:image/jpeg;base64,'.base64_encode($row['f_portofolio']).'" style = "width:50% ;height:50%;"> </td>
									</tr>


									<tr>
									<td>Permintaan Bayaran</td>
									<td>'.$harga.' </td>
									</tr>

									<tr>
									<td>Status</td>
									<td>'.$status.' </td>
									</tr>

									</table>
									<br><a href="status.php?bid_id='.$bid.'" class="btn btn-general btn-white">Ubah Status</a>
								</div>
								';		
							}
						}
						
					?>
				<div class = "modal-footer">
            <a href="profilpeng.php"><button class="btn btn-general btn-white">Kembali</button></a>
          </div>
	</div>
</div>
</div>
	</body>
</html>
