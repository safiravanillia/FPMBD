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

  if(isset($_SESSION["name"])){
  	$name = $_SESSION["name"];
 	$sql = "SELECT id FROM user WHERE username = '".$name."'";
 	$result = mysqli_query($conn, $sql);
 	while($row = mysqli_fetch_array($result)){
 		$id = $row["id"];
 	}
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
    		height : auto;
    		padding-bottom : 30px;
    		box-shadow: 0px 4px 8px 0 rgba(0, 0, 0, 0.2);
    		margin-top : 70px;
    		margin-left : 130px;
    	}

    	.form-container{
    		margin-left: 50px;
    		padding-top : 30px;
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

  <body id="page-top">

<!--====================================================
                         HEADER
======================================================--> 

    <header>

      <!-- Top Navbar  -->
      <div class="top-menubar">
        <div class="topmenu">
          <div class="container">
            <div class="row">
              <div class="col-md-7">
                <ul class="list-inline top-contacts">
                  <li>
                    <i class="fa fa-envelope"></i> <a href="mailto:imail@freelancemosv.id" class="">mail@freelancemosv.id</a>
                  </li>
                  <li>
                    <i class="fa fa-phone"></i> (031) 3982200
                  </li>
                </ul>
              </div> 
              <div class="col-md-5">
                <ul class="list-inline top-data"> 
                <?php
                  if(isset($_SESSION["logged"])){
                    echo '
                    <li><div class = "log-top">Selamat datang, '.$_SESSION["name"].'!</div></li>
                    <li><a href="logout.php" class="log-top"">Keluar</a></li>';
                  }elseif (isset($_SESSION["gagal"])) {
                    echo '
                    <li><a href="logout.php" class="log-top"> login gagal, coba lagi </a></li>';
                  }
                  else{
                    echo '
                    <li><a href="#" class="log-top" data-toggle="modal" data-target="#login-modal">Masuk</a></li>';
                  }
                ?>
                </ul>
              </div>
            </div>
          </div>
        </div> 
      </div> 
      
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light" id="mainNav" data-toggle="affix">
        <div class="container">
          <a class="navbar-brand smooth-scroll" href="index.php">
            <img src="img/logo-s.png" alt="logo">
          </a> 
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> 
                <span class="navbar-toggler-icon"></span>
          </button>  
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item" ><a class="nav-link smooth-scroll" href="faq.php">Bantuan</a></li> 
                <li class="nav-item dropdown" >
                  <a class="nav-link dropdown-toggle smooth-scroll" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a> 
                  <div class="dropdown-menu dropdown-cust" aria-labelledby="navbarDropdownMenuLink"> 
                    <a class="dropdown-item"  target="_empty" href="#">Grafis dan Desain</a> 
                    <a class="dropdown-item"  target="_empty" href="#">Web dan Pemograman</a> 
                    <a class="dropdown-item"  target="_empty" href="#">Penulisan dan Penerjemahan</a> 
                    <a class="dropdown-item"  target="_empty" href="#">Visual dan Audio</a> 
                  </div>
                  <?php
                  if(isset($_SESSION["free"])&&isset($_SESSION["logged"])){
                    echo '
                    <li class="nav-item" ><a class="nav-link smooth-scroll" href="profilfree.php">Profil</a></li> ';
                  } elseif(isset($_SESSION["peng"])&&isset($_SESSION["logged"])){
                    echo '
                    <li class="nav-item" ><a class="nav-link smooth-scroll" href="profilpeng.php">Profil</a></li> ';
                  }?>
                </li>
                
                <?php
                	if(isset($_SESSION["role"])&&$_SESSION["role"]=="pengusaha"){
                		echo '
                			<li class="nav-item dropdown" >
			                  <a class="nav-link dropdown-toggle smooth-scroll" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Projek</a> 
			                  <div class="dropdown-menu dropdown-cust" aria-labelledby="navbarDropdownMenuLink"> 
			                    <a class="dropdown-item"  target="_empty" href="insert-project.php">Tambah Projek</a> 
			                    <a class="dropdown-item"  target="_empty" href="project.php">Lihat Projek Aktif</a>
			                  </div>
			                </li>
                		';
                	}
                	else{
                		echo '<li class="nav-item" ><a class="nav-link smooth-scroll" href="project.php">Projek</a></li>';
                	}
                ?>
                <li>
                  <i class="search fa fa-search search-btn"></i>
                  <div class="search-open">
                    <div class="input-group animated fadeInUp">
                      <input type="text" class="form-control" placeholder="Ketikkan Pekerjaan" aria-describedby="basic-addon2">
                      <span class="input-group-addon" id="basic-addon2">Cari</span>
                    </div>
                  </div>
                </li> 
                <li>
                  <div class="top-menubar-nav">
                    <div class="topmenu ">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-9">
                            <ul class="list-inline top-contacts">
                              <li>
                                <i class="fa fa-envelope"></i> <a href="mailto:mail@freelancemosv.id">mail@freelancemosv.id</a>
                              </li>
                              <li>
                                <i class="fa fa-phone"></i> (031) 398 2200
                              </li>
                            </ul>
                          </div> 
                          <div class="col-md-3">
                            <ul class="list-inline top-data">
                              <li><a href="#" class="log-top" data-toggle="modal" data-target="#login-modal">Masuk</a></li>  
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div>
                </li>
            </ul>  
          </div>
        </div>
      </nav>
    </header> 

    <div class = "tempat">
    	<div class = "form-container">
    		<form method = "post">
    			<div class = "form-group">
    				Nama Projek
    				<input type="text" name="nama" class ="form-control col-5" placeholder="Masukkan nama projek" />
    			</div>
    			<div class = "form-group">
    				Deskripsi Projek
    				<textarea name="description" rows="10" cols="70" placeholder="Paparkan deskripsi Projek" ></textarea>
    			</div>
    			<div class = "form-group">
    				Tanggal Penawaran dibuka
    				<input type="date" name="tglbuka" class ="form-control col-3" placeholder="Masukkan deskripsi projek" />
    			</div>
    			<div class = "form-group">
    				Tanggal Penawaran ditutup
    				<input type="date" name="tgltutup" class ="form-control col-3" placeholder="Masukkan deskripsi projek" />
    			</div>
    			<div class = "form-group">
    				Harga minimum penawaran
    				<input type="number" name="hargamin" class ="form-control col-3" placeholder="Harga minimum" />
    			</div>
    			<div class = "form-group">
    				Harga maksimum penawaran
    				<input type="number" name="hargamax" class ="form-control col-3" placeholder="Harga maksimum" />
    			</div>
    			<div class = "form-group">
    				Kategori
    				<input type="radio" name="kategori" class ="form-control" value="Penulisan dan Penerjemahan"> Penulisan dan Penerjemahan
    				<input type="radio" name="kategori" class ="form-control" value="Visual dan Audio"> Visual dan Audio
    				<input type="radio" name="kategori" class ="form-control" value="Web dan Pemrograman"> Web dan Pemrograman
    				<input type="radio" name="kategori" class ="form-control" value="Grafis dan Desain"> Grafis dan Desain
    			</div>
    			<div group = form-group>
    				<input type="submit" class="btn btn-primary" value="Buat Projek">
    			</div>
    		</form>

    		<?php
    			if($_SERVER["REQUEST_METHOD"] == "POST"){
    				//INSERT INTO `pekerjaan` (`k_id`, `pengusaha_id`, `nama`, `deskripsi`, `tglbuka`, `tgltutup`, `hargamin`, `hargamax`, `kategori`) VALUES ('33', '9', 'hh', 'ghkhgkhgl', '2018-05-02', '2018-05-19', '1450000', '1500000', 'Penulisan dan Penerjemahan');

    				$name = $_POST["nama"];
    				$description = $_POST["description"];
    				$tglbuka = $_POST["tglbuka"];
    				$tgltutup = $_POST["tgltutup"];
    				$hargamin = $_POST["hargamin"];
    				$hargamax = $_POST["hargamax"];
    				$kategori = $_POST["kategori"];

    				//echo $kategori;

    				$sql = "INSERT INTO `pekerjaan` (`k_id`, `pengusaha_id`, `nama`, `deskripsi`, `tglbuka`, `tgltutup`, `hargamin`, `hargamax`, `kategori`) VALUES ('31', '$id', '$name', '$description', '$tglbuka', '$tgltutup', '$hargamin', '$hargamax', '$kategori');";
    				$result = mysqli_query($conn, $sql);
    				if($result){
		  					echo '<div class = "berhasil">
		  							Projek berhasil dipublish
		  						</div>';
		  					echo '<br/><a href = "project.php">Kembali</a>';
		  				}
		  				else {
		  					echo '<div class = "gagal">
		  							Projek gagal dipublish
		  						</div>';
		  				}
    			}
    		?>
    	</div>
    </div>

    </body>
</html>