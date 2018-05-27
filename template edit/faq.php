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
    
    <!-- Core Stylesheets -->
    <link rel="stylesheet" href="css/faq.css"> 
    
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
                              <input id="register_email" name="email" class="form-control" type="text" placeholder="Masukkan E-mail" required>
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
        
 
<!--====================================================
                       HOME-P
======================================================-->
    <div id="home-p" class="home-p pages-head1 text-center">
      <div class="container">
        <h1 class="wow fadeInUp" data-wow-delay="0.1s">Yang Paling Sering Ditanyakan Pada Kami</h1>
      </div><!--/end container-->
    </div> 

<!--====================================================
                      FAQ-P1
======================================================-->
    <section id="faq-p1" class="team-p1">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="faq-p1-cont">
              <div class="service-h-tab"> 
                <nav class="nav nav-tabs" id="myTab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-dasar" role="tab" aria-controls="nav-home" aria-expanded="true">Dasar</a>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-dasar" role="tabpanel" aria-labelledby="nav-home-tab">      
                    <div class="toggle">
                      <div class="toggle-title ">
                        <h3>
                        <i></i>
                        <span class="title-name">Berapa biaya layanan menggunakan Freelance mosv?</span>
                        </h3>
                      </div>
                      <div class="toggle-inner">
                        <p>Mendaftar di Freelance mosv tidak dikenakan biaya. Pemberi kerja dapat mempekerjakan freelancer dalam website kami tanpa tambahan biaya.</p>
                      </div>
                    </div> 
                    <div class="toggle">
                      <div class="toggle-title  ">
                          <h3>
                          <i></i>
                          <span class="title-name">Bagaimana cara mengambil pekerjaan?</span>
                          </h3>
                      </div>
                      <div class="toggle-inner">
                          <p>Langkah mudah bagi freelancer untuk menggunakan website: <br>
                          1. Klik tombol "Mulai Bekerja" atau "Projek" pada navigation bar.<br>
                          2. Pilih kategori pekerjaan yang sesuai.<br>
                          3. Baca deskripsi pekerjaan.<br>
                          4. Klik tawar.<br>
                          5. Atur bayaran yang diinginkan<br>
                          6. Tunggu konfirmasi dari perusahaan apakah menerima atau menolak tawaran Anda.<br>
                          7. Apabila diterima, maka pekerjaan yang Anda ambil akan muncul di Profil>>Tab Pekerjaan OnProgress</p>
                      </div>
                    </div> 
                    <div class="toggle">
                      <div class="toggle-title  ">
                          <h3>
                          <i></i>
                          <span class="title-name">Bagaimana cara mengambil hasil pembayaran?</span>
                          </h3>
                      </div>
                      <div class="toggle-inner">
                        Setelah mengubah status pekerjaan menjadi "SELESAI", kamu akan mendapat bayaran via transfer sesuai penawaran diawal dari perusahaan tersebut. Selain itu, perusahaan akan memberikan feedback kepada kamu untuk menambah rating mu sebagai kualitas hasil kerja.<br>
                      </div>
                    </div> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>      
    </section> 

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

</html>
