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

   $conns = new mysqli($servername, $username, $password, $dbname);
  if($conns->connect_error){
    die("Connection failed: ". $conns->connect_error);
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
      .wadah{
        margin-top : 10px;
        margin-left : 120px;
        margin-bottom : 70px;
      }
      .isi{
        width: 93%;
        height : auto;
        margin-left : 30px;
        margin-bottom : 15px;
        border-bottom : 1px solid #e30066;
      }
      .judul{
        font-size : 24px;
        color : #e30066;
        text-align : center;
      }
      .italic{
        font-style : italic;
        font-size : 12px;
      }

      .tombol{
        width : 70px;
        height : 35px;
        background-color : #e08a8a;
        border-radius : 5%;
        margin-bottom : 10px;
        margin-left : 100px;
        text-align: center;
        text-decoration: none;
        border: none;
        outline: none;
        cursor: pointer;
        padding-top: 3px;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
        color : white;
      }

      .tombol:hover{
        background-color : #c57575;
      }

      .tombol a{
        text-decoration: none;
        color: white;
        display: block;
      }

      .box{
        width: 300px;
        height : auto;
        padding-bottom : 10px;
        padding-right : 30px;
        border-radius : 15px;
        border : 2px solid #e30066;
        float : left;
        margin-right : 30px;
        margin-left : 30px;
        margin-bottom : 60px;
      }

      .box:hover{
        transition: transform 0.5s ease;
      transform: scale(1.1);
      }

      .description{
        width : 300px;
        height : auto;
        padding-bottom : 20px;
        background-color : #e30066
        color : white;
      }

      .jumlah{
      font-size : 12px;
      font-style : italic;
    }

      img {
        border-top-left-radius: 15px;
        border-top-right-radius : 15px;
      }

      .price-range{
        width : 900px;
        height : 100px;
        background-color : white;
        margin-top : 1px;
        margin-left : 200px;
      }

      .pricing{
        width : 280px;
        height : 80px;
        background-color : white;
        float : left;
        padding-top : 1px;
        padding-left : 30px;
        margin-left : 80px;
      }

      .price-submit{
        margin-left : 60px;
        float : left;
      }

      h2{
      color : #e30066;
      text-align : center;
      margin-top : 18px;
      margin-bottom : 18px;
      font-size: 18px;
    }

    h1{
      text-align : center;
      margin-top : 18px;
      font-size: 10px;
    }

    .form-container{
      margin : auto;
      width : 400px;
      height : auto;
      padding-bottom : 10px;
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
                    <a class="dropdown-item"  target="_empty" href="desain.php">Grafis dan Desain</a> 
                    <a class="dropdown-item"  target="_empty" href="pemrograman.php">Web dan Pemograman</a> 
                    <a class="dropdown-item"  target="_empty" href="penulisan.php">Penulisan dan Penerjemahan</a> 
                    <a class="dropdown-item"  target="_empty" href="visual.php">Visual dan Audio</a>  
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
<!--====================================================
                       HOME-P
======================================================-->
    <div id="home-p" class="home-p pages-head4 text-center">
      <div class="container">
        <h1 class="wow fadeInUp" data-wow-delay="0.1s">Penulisan dan Penerjemahan</h1>
      </div><!--/end container-->
    </div> 

    <h2></h2>
    <form method="post">
      <div class="form-container">
      <div class = "form-group" >
            <input type="text" name="nama_pk" class ="form-control" placeholder="Ketikkan nama pekerjaan"/>
      </div>
      <h1>atau</h1>
      </div>
      <div class = "price-range">
        <div class = "pricing">
          <input type="number" name="hargamin" class ="form-control" placeholder="Harga minimum" />
        </div>
        <div class = "pricing">
          <input type="number" name="hargamax" class ="form-control" placeholder="Harga maximum" />
        </div>
        <div class = "price-submit"> 
         <input type="submit" class="btn btn-general btn-white" value="Cari"> 
        </div>
      </div>
    </form>
    <div class = "wadah">
    <?php
    /*Function : 
    DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `jumlah_penawar`(id INT) RETURNS int(11)
    DETERMINISTIC
BEGIN
  DECLARE jumlah INTEGER;
  SELECT COUNT(*) into jumlah
  FROM pekerjaan, tawar
  where pekerjaan.`k_id` = tawar.`k_id` and
    pekerjaan.`k_id` = id;
  RETURN jumlah;
END$$
DELIMITER ;

  PROCEDURE : 
  DELIMITER$$
  CREATE OR REPLACE PROCEDURE price_range (IN minimum INT, IN maximum INT, IN kategori VARCHAR(50))
  BEGIN
    SELECT DISTINCT pekerjaan.* , pengusaha.nama AS p_nama
    FROM pekerjaan LEFT JOIN pengusaha ON pekerjaan.pengusaha_id = pengusaha.pengusaha_id 
    WHERE pekerjaan.`hargamin` >= minimum AND
      pekerjaan.`hargamax` <= maximum AND
      pekerjaan.`kategori` = kategori;
  END$$
  DELIMITER$$
  */

    if($_SERVER["REQUEST_METHOD"] == "POST"){
      //echo 'hai dalam';
      $min = $_POST["hargamin"];
      $max = $_POST["hargamax"];
      $pk= $_POST["nama_pk"];
      if (!empty($min)&&!empty($max)) {
        $sql = "CALL price_range('$min', '$max', 'Penulisan dan Penerjemahan');";
      }elseif(!empty($pk)) {
        $sql = "SELECT DISTINCT pekerjaan.* , pengusaha.nama AS p_nama
      FROM pekerjaan LEFT JOIN pengusaha ON pekerjaan.pengusaha_id = pengusaha.pengusaha_id 
      WHERE pekerjaan.kategori = 'Penulisan dan Penerjemahan' 
      AND pekerjaan.`tgltutup` >= NOW()
      AND pekerjaan.`nama` LIKE '$pk%'
UNION      
SELECT DISTINCT pekerjaan.* , pengusaha.nama AS p_nama
      FROM pekerjaan LEFT JOIN pengusaha ON pekerjaan.pengusaha_id = pengusaha.pengusaha_id 
      WHERE pekerjaan.kategori = 'Penulisan dan Penerjemahan' 
      AND pekerjaan.`tgltutup` >= NOW()
      AND pekerjaan.`nama` LIKE '%$pk%'
UNION
SELECT DISTINCT pekerjaan.* , pengusaha.nama AS p_nama
      FROM pekerjaan LEFT JOIN pengusaha ON pekerjaan.pengusaha_id = pengusaha.pengusaha_id 
      WHERE pekerjaan.kategori = 'Penulisan dan Penerjemahan' 
      AND pekerjaan.`tgltutup` >= NOW()
      AND pekerjaan.`nama` LIKE '%$pk'";
      }else{
        $sql = "CALL price_range('$min', '$max', 'Penulisan dan Penerjemahan');";
      }
    }else{
      $sql = "SELECT DISTINCT pekerjaan.* , pengusaha.nama AS p_nama
      FROM pekerjaan LEFT JOIN pengusaha ON pekerjaan.pengusaha_id = pengusaha.pengusaha_id 
      WHERE pekerjaan.kategori = 'Penulisan dan Penerjemahan' 
      AND pekerjaan.`tgltutup` >= NOW()
      ORDER BY pekerjaan.k_id asc;";
    }
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
      $s = "SELECT jumlah_penawar(".$row["k_id"].") AS jum;";
      $r = mysqli_query($conns, $s);
      while($baris = mysqli_fetch_array($r)){
        $jum = $baris["jum"];
      }
      echo '<div class = "box">';
        if(!$row["picture"]){
              echo '<img src = "foto/no_image_available.jpg" style="width : 296px; height : 296px">';
          } else {
              echo '<img src ="data:image/jpeg;base64,'.base64_encode($row['picture']).'" style = "width:296px;height:296px;">';
          }
          echo '
              <div class = "description">
                <p class = "judul">'.$row["nama"].'</p>
                <p class = "jumlah">Penawar : '.$jum.'</p>
                <p>'.$row["deskripsi"].'</p>
              <p class = "italic">dibuat oleh <span style="font-weight : bold">'.$row["p_nama"].'</span> berakhir pada <span style = "color:blue">'.$row["tgltutup"].'</span></p>
              </div>
          ';
        if(isset($_SESSION["role"])&&$_SESSION["role"]=="freelancer"){
          echo '<button class = "tombol"><a href = "tawar.php?id='.$id.'&k_id='.$row["k_id"].'"">Tawar</a></button>';
        }else if(isset($_SESSION["role"])&&$_SESSION["role"]=="pengusaha"&&$id == $row["pengusaha_id"]){
          echo '<button class = "tombol" style="width : 100px;height : auto; padding-bottom : 3px;"><a href = "change-project.php?k_id='.$row["k_id"].'"">Ubah Detil Projek</a></button>';
        }
        echo'</div>';
      }
    ?>
  </div>


    <!--Global JavaScript -->
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/popper/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/wow/wow.min.js"></script>
    <script src="js/owl-carousel/owl.carousel.min.js"></script>

   </body>
</html>
