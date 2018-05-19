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
  	<header>
  	<!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light" id="mainNav" data-toggle="affix">
        <div class="container">
          <a class="navbar-brand smooth-scroll" href="#">
            <img src="img/logo-s.png" alt="logo">
          </a> 
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> 
                <span class="navbar-toggler-icon"></span>
          </button> 
      </nav>
    </header> 

<!--====================================================
                       HOME-P
======================================================-->
    <div id="home-p" class="home-p pages-head4 text-center">
      <div class="container">
        <h1 class="wow fadeInUp" data-wow-delay="0.1s">SATU LANGKAH LAGI</h1>
      </div><!--/end container-->
    </div> 

<!--====================================================
                        ISI DATA
======================================================--> 
    <section id="contact-p1" class="contact-p1">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="contact-p1-cont">
              <h3><br>LENGKAPI DATA DIRIMU</h3>
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
  			if($_SESSION["role"] == "freelancer"){
	 			echo ' 
					<form method="post" action="insert.php?role=freelancer" enctype="multipart/form-data">
					<div class = "form-group">
						Nama Terang
						<input type="text" name="nama" class ="form-control" placeholder="Masukkan nama" required/>
					</div>
					<div class = "form-group">
						Usia
						<input type="number" name="umur" class ="form-control" placeholder="Masukkan usia" required/>
					</div>
					<div class = "form-group">
						No. Telepon
						<input type="number" name="telp" class ="form-control" placeholder="Masukkan nomor telepon" required/>
					</div>
					<div class = "form-group">
						Keahlian
						<input type="text" name="ahli" class ="form-control" placeholder="Masukkan gelar" required/>
					</div>
					<div class = "form-group">
						Deskripsi <br />
						<textarea name="bio" rows="10" cols="70" placeholder="Paparkan pengalaman Anda" required></textarea>
					</div>
					<div class = "form-group">
						Portofolio
						<input id="porto" name="porto" class="form-control" type="file"/>
					</div>
					<div class = "modal-footer">
						<input type="submit" class="btn btn-general btn-white" value="Simpan"/>
					</div>
					</form>
						';
	 		}
	 		else if($_SESSION["role"] == "pengusaha"){
	 			echo '
					<form method="post" action="insert.php?role=pengusaha">
					<div class = "form-group">
						Nama Perusahaan
						<input type="text" name="nama" class ="form-control" placeholder="Masukkan nama" required/>
					</div>
					<div class = "form-group">
						Alamat
						<input type="text" name="alamat" class ="form-control" placeholder="Masukkan alamat lengkap" required/>
					</div>
					<div class = "form-group">
						No. Telepon
						<input type="number" name="telp" class ="form-control" placeholder="Masukkan nomor telepon" required/>
					</div>
					<div class = "form-group">
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>
					</form>
	 			';
	 		}
	 		?>
	 		</div>
	 	</div>
	</div>
  </body>
 </html>
