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

  $sql1 = "SELECT * FROM user where username = '".$_SESSION["name"]."' ";
  $query1 = mysqli_query($conn, $sql1);
  while($free1 = mysqli_fetch_array($query1)){
    $sql = "SELECT * FROM freelancer where id = '".$free1['id']."' ";
    $query = mysqli_query($conn, $sql);

    while($free = mysqli_fetch_array($query)){
           $email = $free1['email'];
           $id = $free['id'];
           $name = $free['f_nama'];
           $usia = $free['f_usia'];
           $telpon = $free['f_telepon'];
           $master = $free['f_ahli'];
           $description = $free['f_deskripsi'];
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate/animate.min.css">
    <link rel="stylesheet" href="css/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
    .bio{
        width : 300px;
        height : 450px;
        background-color : #a34e4e;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        margin-left : 80px;
        margin-top : 40px;
        float : left;
        color : white;
        border-radius : 15px;
    }

    .details{
        width : 750px;
        height : 450px;
        margin-left : 50px;
        margin-top : 40px;
        box-shadow: 0px 4px 8px 0 rgba(0, 0, 0, 0.2);
        float : left;
        border-radius : 15px;
    }

    .photo{
        width : 150px;
        height : 150px;
        background-color : white;
        margin-left : 70px;
        margin-top : 50px;
        border-radius : 50%;
    }

    .bar{
        height : 70px;
    }

    .bar-button{
        width : 150px;
        height : 100%;
        background-color : white;
        float : right;
        color : #808282;
        margin : center;
        border-radius : 15px;
        font-weight : bold;
        text-align : center;
        cursor : pointer;
        padding-top :25px;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
    }

    .bio p{
        color : white;
    }

    .bar-button:hover{
        background-color : #f0f0f0;
        color : #e30066;
        border-bottom : 1px solid #e30066;
    }

    .active{
      background-color : #f0f0f0;
        color : #e30066;
        border-bottom : 1px solid #e30066;
    }

    .desc{
        width : 650px;
        height : 350px;
        margin-top : 15px;
        margin-left : 30px;
        overflow : auto;
    }

    .edit{
        width : 120px;
        height : 50px;
        background-color : #e08a8a;
        margin-top : 10px;
        margin-left : 160px;
        text-align: center;
        text-decoration: none;
        border: none;
        border-radius : 15px;
        outline: none;
        cursor: pointer;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
        color : white;
        margin-bottom : 50px;
    }

    .edit:hover{
        background-color : #c57575;
    }

    .edit a{
        text-decoration: none;
        color: white;
        display: block;
    }

    .nama{
      font-weight : bold;
      font-size : 20px;
      color : #e30066 ;
    }

    .kategori{
      font-size : 12px;
      font-style : italic;
    }

    .job-progress{
      width : 635px;
      height : auto;
      border-bottom : 1px solid #e30066;
    }

    .status{
      width : 100px;
      height : auto;
      padding : 5px 5px 5px 5px;
      text-align : center;
      cursor : pointer;
      border-radius : 5px;
      -webkit-transition-duration: 0.4s; /* Safari */
      transition-duration: 0.4s;
      background-color : #bc5454;
      font-size : 14px;
      margin-bottom : 5px;
    }

    .status:hover{
      background-color : #8c3d3d;
    }

    .status a{
      text-decoration: none;
        color: white;
        display: block;
    }

    .komentar{
      width : 635px;
      height : auto;
      border-bottom : 1px solid #e30066;
    }

    .fromwho{
      font-size : 12px;
      font-style : italic;
    }

    .tanda {
    color: orange;
    }
    </style>
   </head>

<body id = "page-top">
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
                          <a class="dropdown-item"  target="_empty" href="#">Tambah Projek</a> 
                          <a class="dropdown-item"  target="_empty" href="project.php">Lihat Projek Aktif</a>
                        </div>
                      </li>
                    ';
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

<!--====================================================
                    LOGIN OR REGISTER
======================================================-->
    <section id="login">
      <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header" align="center">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span class="fa fa-times" aria-hidden="true"></span>
                      </button>
                  </div>
                  <div id="div-forms">
                      <form id="login-form" method="post" action="login.php">
                          <h3 class="text-center">Masuk</h3>
                          <div class="modal-body">
                              <label for="username">Username</label> 
                              <input id="login_username" class="form-control" type="text" placeholder="Masukkan username " name="user" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" required>
                              <label for="username">Kata Sandi</label> 
                              <input id="login_password" class="form-control" type="password" placeholder="Masukkan kata sandi" name="passwd" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>"required>
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox" name="remember"<?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> > Ingat saya!
                                  </label>
                              </div>
                          </div>
                          <div class="modal-footer text-center">
                              <div>
                                  <button type="submit" class="btn btn-general btn-white">Masuk</button>
                              </div>
                              <div>
                                  <button id="login_register_btn" type="button" class="btn btn-link">Daftar</button>
                              </div>
                          </div>
                      </form>
                      <form id="register-form" style="display:none;" method="post" action="register.php">
                          <h3 class="text-center">Daftar</h3>
                          <div class="modal-body"> 
                              <label for="username">Username</label> 
                              <input id="register_username" class="form-control" type="text" placeholder="Masukkan username" name="user" required>
                              <label for="register_email">E-mail</label> 
                              <input id="register_email" name="email" class="form-control" type="email" placeholder="Masukkan E-mail" required>
                              <label for="register_password">Kata Sandi</label> 
                              <input id="register_password" name="passwd" class="form-control" type="password" placeholder="Masukkan kata sandi" required>
                              <label for="register_password">Pilih peran:</label>
                              <div class="checkbox"> 
                                <label>
                                  <input type="radio" name ="role" value="freelancer" checked="checked"> Freelancer
                                </label>
                              </div>
                              <div class="checkbox">
                                <label>
                                  <input type="radio" name="role" value="pengusaha"> Pengusaha
                                </label>
                              </div>
                          <div class="modal-footer">
                              <div>
                                  <button type="submit" class="btn btn-general btn-white">Daftar</button>
                              </div>
                              <div>
                                  <button id="register_login_btn" type="button" class="btn btn-link">Masuk</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </section>      


   
<div class = "bio">
    <div class ="photo">
      <?php
      $s = "SELECT picture FROM freelancer WHERE id = '".$id."'";
      $q = mysqli_query($conn, $s);
      if($row = mysqli_fetch_array($q)){
        if(!$row["picture"]){
          echo '<img src = "foto/default-user-image.png">';
        } else {
          echo '<img src ="data:image/jpeg;base64,'.base64_encode($row['picture']).'" style = "width:150px;height:150px;">';
        }
      }
    ?>
    </div>
    <?php
      $s = "SELECT freelancer.`f_nama` ,ROUND(AVG(review.`rating`),1) AS rating 
           FROM review RIGHT JOIN tawar 
           ON review.`bid_id`=tawar.`bid_id` RIGHT JOIN freelancer
           ON tawar.`f_id`=freelancer.`id` RIGHT JOIN pekerjaan
           ON tawar.k_id=pekerjaan.k_id RIGHT JOIN pengusaha
           ON pekerjaan.pengusaha_id=pengusaha.pengusaha_id
           WHERE freelancer.`id`= '$id'
           GROUP BY freelancer.`f_nama`";
      $q = mysqli_query($conn, $s);
      if($row = mysqli_fetch_array($q)){
        $rate=$row["rating"];
      }
      if($rate==null){
        echo '<p style = "margin-top : 20px; margin-left : 115px;"><span class="fa fa-star tanda"></span> 0.0</p>';
      } else {
        echo '<p style = "margin-top : 20px; margin-left : 115px;"><span class="fa fa-star tanda"></span> '.$rate.'</p>';
      }
    ?>

    <p style = "margin-top : 20px; margin-left : 20px;">Nama : <?php echo $name;?></p> 
    <p style = "margin-left : 20px;">Usia : <?php echo $usia;?></p>
    <p style = "margin-left : 20px">Keahlian : <?php echo $master;?></p>
    <p style = "margin-left : 20px">No. Telp : <?php echo $telpon;?></p>
    <p style = "margin-left : 20px">E-mail : <?php echo $email;?></p>
</div>
<div class = "details">
    <div class = "bar">
        <div class = "bar-button" onclick="openTab('review', this, event)"><b>Review</b></div>
        <div class = "bar-button" onclick="openTab('selesai', this, event)"><b>Pekerjaan Selesai</b></div>
        <div class = "bar-button" style = "padding-top : 12px;" onclick="openTab('histori', this, event)">Pekerjaan OnProgress</div>
        <div class = "bar-button" onclick="openTab('portofolio', this, event)">Portofolio</div>
        <div class = "bar-button" onclick="openTab('deskripsi', this, event)"  id="defaultOpen">Deskripsi</div>
    </div>
    <div class = "desc" id="deskripsi">
        <?php
          if($description == NULL){
        echo '<p class = "kategori">Deskripsi belum dipaparkan</p>';
      }
      else{
        echo '<p class = "nama">Deskripsi '.$name.'</p>';
        echo '<p>'.$description.'</p>';
      }
    ?>
    </div>
    <div class = 'desc' id='portofolio'>
    <?php
      $s = "SELECT * FROM freelancer WHERE id = '".$id."'";
      $q = mysqli_query($conn, $s);
      if($row = mysqli_fetch_array($q)){
        echo '<span><img src ="data:image/jpeg;base64,'.base64_encode($row['f_portofolio']).'"></span>';
      }
    ?>
    </div>
    <div class = "desc" id="selesai">
      <?php
      //run di sql function di bawah
      /*DELIMITER $$
      CREATE OR REPLACE FUNCTION hitung_kerja(id INT)
    RETURNS INT
    DETERMINISTIC
    BEGIN
    DECLARE jml INT;
    SELECT COUNT(pekerjaan.`k_id`)INTO jml
      FROM tawar, freelancer, pengusaha, pekerjaan
      WHERE freelancer.`id`=id
      AND freelancer.`id`=tawar.`f_id`
      AND tawar.`k_id`=pekerjaan.`k_id`
      AND pekerjaan.`pengusaha_id`=pengusaha.`pengusaha_id`
      AND tawar.`b_status` = 'SELESAI';
    RETURN jml;
    END$$
      DELIMITER$$*/

      $jumlah= "SELECT DISTINCT hitung_kerja($id) AS jum";
      $res = mysqli_query($conn, $jumlah);
      while($row = mysqli_fetch_array($res)){
        echo '<p style = "font-size : 20px; font-weight : bold;">Total '.$row["jum"].' pekerjaan selesai</p>';
      }

      //run di sql procedure di bawah
      /*$DELIMITER $$
        CREATE OR REPLACE PROCEDURE tampil_kerja(IN id INT)
        BEGIN
        SELECT pengusaha.`nama` AS nm_peng, pekerjaan.`nama` AS kerja, tawar.`bid_id`
      FROM tawar, freelancer, pengusaha, pekerjaan
      WHERE freelancer.`id`=id
      AND freelancer.`id`=tawar.`f_id`
      AND tawar.`k_id`=pekerjaan.`k_id`
      AND pekerjaan.`pengusaha_id`=pengusaha.`pengusaha_id` 
      AND tawar.`b_status` = 'SELESAI';
        END$$
        DELIMITER$$*/

      $result = mysqli_query($conns, "CALL tampil_kerja($id)");
      while($row = mysqli_fetch_array($result)){
        echo '
          <div class = "job-progress">
            <div class = "nama">'.$row["kerja"].'</div>
            <p class = "kategori">Perusahaan terkait : <span style = "font-weight : bold; color : blue;">'.$row["nm_peng"].'</span></p>
          </div>
        ';
      }    
      ?>
    </div>
    <div class = "desc" id="review">
      <?php
      $komen = "CREATE or REPLACE VIEW view_komen as SELECT pengusaha.nama AS namapengusaha, pekerjaan.nama AS namapekerjaan, review.komentar AS komentar ,review.`tgl` AS tgl ,review.`rating` AS rating
           FROM review JOIN tawar 
           ON review.`bid_id`=tawar.`bid_id` JOIN freelancer
           ON tawar.`f_id`=freelancer.`id` JOIN pekerjaan
           ON tawar.k_id=pekerjaan.k_id JOIN pengusaha
           ON pekerjaan.pengusaha_id=pengusaha.pengusaha_id
           WHERE freelancer.`id`= '$id'";
      $result = mysqli_query($conn, $komen);
      $komenview= "SELECT * from view_komen;";
      $result2 = mysqli_query($conn, $komenview);
      while($row = mysqli_fetch_array($result2)){
        $rate= $row["rating"];
        echo '<div class = "komentar">
              <div class = "nama">'.$row["namapekerjaan"].'</div>';
              if($rate==1) {
                echo' <span class="fa fa-star tanda"></span><br>';
              }elseif($rate==2) {
                echo' <span class="fa fa-star tanda"></span>';
                echo' <span class="fa fa-star tanda"></span><br>';
              }elseif($rate==3) {
                echo' <span class="fa fa-star tanda"></span>';
                echo' <span class="fa fa-star tanda"></span>';
                echo' <span class="fa fa-star tanda"></span><br>';
              }elseif($rate==4) {
                echo' <span class="fa fa-star tanda"></span>';
                echo' <span class="fa fa-star tanda"></span>';
                echo' <span class="fa fa-star tanda"></span>';
                echo' <span class="fa fa-star tanda"></span><br>';
              }elseif($rate==5) {
                echo' <span class="fa fa-star tanda"></span>';
                echo' <span class="fa fa-star tanda"></span>';
                echo' <span class="fa fa-star tanda"></span>';
                echo' <span class="fa fa-star tanda"></span>';
                echo' <span class="fa fa-star tanda"></span><br>';
              }
        echo  '<div>'.$row["komentar"].'</div>
              <p class = "fromwho">Dari <span style="font-weight : bold">'.$row["namapengusaha"].'</span> pada <span style = "color:blue">'.$row["tgl"].'</span></p>
              </div> 
        ';
      } 
      ?>
    </div>
    <div class = "desc" id="histori">
      <?php
      $histori = "SELECT pengusaha.`nama` AS nm_peng, pekerjaan.`nama` AS kerja, tawar.`bid_id`
      FROM tawar, freelancer, pengusaha, pekerjaan
      WHERE freelancer.`id`='$id'
      AND freelancer.`id`=tawar.`f_id`
      AND tawar.`k_id`=pekerjaan.`k_id`
      AND pekerjaan.`pengusaha_id`=pengusaha.`pengusaha_id` 
      AND tawar.`b_status` = 'TERIMA'
      UNION
      SELECT pengusaha.`nama` AS nm_peng, pekerjaan.`nama` AS kerja, tawar.`bid_id`
      FROM tawar, freelancer, pengusaha, pekerjaan
      WHERE freelancer.`id`='$id'
      AND freelancer.`id`=tawar.`f_id`
      AND tawar.`k_id`=pekerjaan.`k_id`
      AND pekerjaan.`pengusaha_id`=pengusaha.`pengusaha_id` 
      AND tawar.`b_status` = 'PROGRESS'";

      $result = mysqli_query($conn, $histori);
      while($row = mysqli_fetch_array($result)){
        echo '
          <div class = "job-progress">
            <div class = "nama">'.$row["kerja"].'</div>
            <p class = "kategori">Perusahaan terkait : <span style = "font-weight : bold; color : blue;">'.$row["nm_peng"].'</span></p>
            <div class = "status">
            <a href="status.php?bid_id='.$row["bid_id"].'">Ubah Status</a>
            </div>
          </div>
        ';
      }  
      ?>
    </div>
</div>
<br />
<button class = "edit"><?php echo '<a href ="form-edit1.php?id='.$id.'">';?>Ubah Profil</a></button>
<!--====================================================
                      FOOTER
======================================================--> 
    <footer> 
        <div id="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="footer-copyrights">
                            <p>&copy; Hak Cipta dilindungi. Freelance mosv co., Ltd.</p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <a href="#home-p" id="back-to-top" class="btn btn-sm btn-green btn-back-to-top smooth-scrolls hidden-sm hidden-xs" title="home" role="button">
            <i class="fa fa-angle-up"></i>
        </a>
    </footer>

    <!--Global JavaScript -->
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/popper/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/wow/wow.min.js"></script>
    <script src="js/owl-carousel/owl.carousel.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery-easing/jquery.easing.min.js"></script> 
    <script src="js/custom.js"></script>
    <script>
        if( jQuery(".toggle .toggle-title").hasClass('active') ){
                jQuery(".toggle .toggle-title.active").closest('.toggle').find('.toggle-inner').show();
            }
            jQuery(".toggle .toggle-title").click(function(){
                if( jQuery(this).hasClass('active') ){
                    jQuery(this).removeClass("active").closest('.toggle').find('.toggle-inner').slideUp(200);
                }
                else{   jQuery(this).addClass("active").closest('.toggle').find('.toggle-inner').slideDown(200);
                }
            });
    </script> 
    </body>
    <script>
  function openTab(tabName,elmnt, evt) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("desc");
      for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("bar-button");
      for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.className += " active";

  }
  document.getElementById("defaultOpen").click();
    </script>

</html>
