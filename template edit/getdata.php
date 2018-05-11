<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Freelancer -mosv-</title>
    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- Global Stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate/animate.min.css">
    <link rel="stylesheet" href="css/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body id="page-top">
  <div class = "col-md-8 m-4">
	  <?php
	 		if($_SESSION["role"] == "freelancer"){
	 			echo ' 
	 				<br />
					<h3 align="center">Isi data dirimu!</h3>
					<br />
					<form method="post" action="insert.php?role=freelancer">
					<div class = "form-group">
						Nama Terang
						<input type="text" name="nama" class ="form-control" placeholder="Nama" required/>
					</div>
					<div class = "form-group">
						Usia
						<input type="text" name="umur" class ="form-control" placeholder="usia" required/>
					</div>
					<div class = "form-group">
						No. Telepon
						<input type="text" name="telp" class ="form-control" placeholder="No. Telpon" />
					</div>
					<div class = "form-group">
						Keahlian
						<input type="text" name="ahli" class ="form-control" placeholder="Your title" />
					</div>
					<div class = "form-group">
						Biodata! <br />
						<textarea name="bio" rows="10" cols="100"></textarea>
					</div>
					<div class = "form-group">
						<input type="submit" class="btn btn-primary" value="Submit Data">
					</div>
					</form>
						';
	 		}
	 		else if($_SESSION["role"] == "pengusaha"){
	 			echo '
	 				<br />
					<h3 align="center">Isi data perusahaanmu!</h3>
					<br />
					<form method="post" action="insert.php?role=pengusaha">
					<div class = "form-group">
						Nama Perusahaan
						<input type="text" name="nama" class ="form-control" placeholder="Nama" required/>
					</div>
					<div class = "form-group">
						Alamat
						<input type="text" name="alamat" class ="form-control" placeholder="Alamat Lengkap" required/>
					</div>
					<div class = "form-group">
						No. Telepon
						<input type="text" name="telp" class ="form-control" placeholder="No. Telpon" />
					</div>
					<div class = "form-group">
						<input type="submit" class="btn btn-primary" value="Submit Data">
					</div>
					</form>
	 			';
	 		}
	  ?>
	</div>
  </body>
 </html>