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
                              <input id="register_username" class="form-control" type="text" placeholder="Masukkan username" name="user" required/>
                              <label for="register_email">E-mail</label> 
                              <input id="register_email" name="email" class="form-control" type="email" placeholder="Masukkan E-mail" required/>
                              <label for="register_password">Kata Sandi</label> 
                              <input id="register_password" name="passwd" class="form-control" type="password" placeholder="Masukkan kata sandi" required/>
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
                         HOME
======================================================-->
    <section id="home">
      <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel"> 
        <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="carousel-item active slides">
              <div class="overlay"></div>
              <div class="slide-1"></div>
                <div class="hero ">
                  <hgroup class="wow fadeInUp">
                      <h1><span ><a href="" class="typewrite" data-period="2000" data-type='[ " Kami Hadir", " Membantu", " Kebutuhan Anda"]'>
                        <span class="wrap"></span></a></span> </h1>        
                      <h3>Rasakan mudahnya mendapat pekerjaan sesuai passion</h3>
                  </hgroup>
                  <a href="project.php"> <button class="btn btn-general btn-green wow fadeInUp" role="button">Mulai Bekerja</button></a>
                </div>           
            </div> 
        </div> 
      </div> 
    </section> 

<!--====================================================
                        ABOUT
======================================================-->
    <section id="about" class="about">
      <div class="container">
        <div class="row title-bar">
          <div class="col-md-12">
            <h1 class="wow fadeInUp">KAMI BERKOMITMEN UNTUK MEMBANTU</h1>
            <div class="heading-border"></div>
            <p class="wow fadeInUp" data-wow-delay="0.4s">Selamat datang di Freelance mosv, website paling populer untuk mencari pekerjaan. Kami menggandeng perusahaan kecil menengah, bisnis start up dan pemilik bisnis dengan freelancer ahli untuk bekerja sama. Sebagai contoh, software development, desain/desain grafis, gambar, penulisan/penerjemahan seperti juga pemasaran online dan video editing.  </p>
            <div class="title-but"><a href="faq.php"><button class="btn btn-general btn-green" role="button">Ingin Tahu Lebih?</button></a></div>
          </div>
        </div>
      </div>  
      <!-- About right side withBG parallax -->
      <div class="container-fluid">
        <div class="row"> 
          <div class="col-md-4 bg-starship">
            <div class="about-content-box wow fadeInUp" data-wow-delay="0.3s">
              <i class="fa fa-snowflake-o"></i>
              <h5>Jangan Khawatir!</h5>
              <p class="desc">Kami hanya memilih pemberi kerja yang terpercaya</p>
            </div>
          </div> 
          <div class="col-md-4 bg-chathams">
            <div class="about-content-box wow fadeInUp" data-wow-delay="0.5s">
              <i class="fa fa-circle-o-notch"></i>
              <h5>Ada Masalah?</h5>
              <p class="desc">Tim kami siap membantu kapanpun anda membutuhkan</p>
            </div>
          </div> 
          <div class="col-md-4 bg-matisse">
            <div class="about-content-box wow fadeInUp" data-wow-delay="0.7s">
              <i class="fa fa-hourglass-o"></i>
              <h5>Lama Prosesnya?</h5>
              <p class="desc">Kami pastikan cepat, efektif, dan efisien.</p>
            </div>
          </div> 
        </div> 
      </div>       
    </section> 

<!--====================================================
                        OFFER 1
======================================================-->
    <section id="comp-offer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp" data-wow-delay="0.2s">
            <h2>Pekerjaan Terbaru</h2>
            <div class="heading-border-light"></div> 
          </div>
              <?php 
              //query di run di mysql
              /*DELIMITER$$
              CREATE OR REPLACE PROCEDURE implicit_cursor()
              BEGIN
              SELECT pekerjaan.nama AS kerja, pekerjaan.`deskripsi` AS deskripsi , pengusaha.`picture` AS foto, pekerjaan.kategori AS kategori
              FROM pekerjaan, pengusaha
              WHERE pekerjaan.`pengusaha_id`=pengusaha.`pengusaha_id`
              ORDER BY pekerjaan.tglbuka ASC
              LIMIT 3;
              END$$
              DELIMITER$$*/

              $query = mysqli_query($conn, "CALL implicit_cursor()");
              while($baru = mysqli_fetch_array($query)){
        echo '
        <div class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp" data-wow-delay="0.4s">
            <div class="desc-comp-offer-cont">
              <div class="thumbnail-blogs">
                  <div class="caption">
                    <i class="fa fa-chain"></i>
                  </div>
                  <img src ="data:image/jpeg;base64,'.base64_encode($baru["foto"]).'"class="img-fluid" alt="...">
              </div>
              <h3>'.$baru["kerja"].'</h3>
              <p class="desc">'.$baru["deskripsi"].'</p>';
              if($baru["kategori"]=="Visual dan Audio"){
                echo '<a href="visual.php"><i class="fa fa-arrow-circle-o-right"></i> '.$baru["kategori"].'</a>';
              }elseif($baru["kategori"]=="Penulisan dan Penerjemahan"){
                echo '<a href="penulisan.php"><i class="fa fa-arrow-circle-o-right"></i> '.$baru["kategori"].'</a>';
              }elseif($baru["kategori"]=="Web dan Pemrograman"){
                echo '<a href="pemrograman.php"><i class="fa fa-arrow-circle-o-right"></i> '.$baru["kategori"].'</a>';
              }else{
                echo '<a href="desain.php"><i class="fa fa-arrow-circle-o-right"></i> '.$baru["kategori"].'</a>';
              }
            echo '</div>';
          echo '</div> 
        ';
      }
            ?>
          </div>          
        </div>
      </div>
    </section>

<!--====================================================
                        OFFER 2
======================================================-->
    <section id="comp-offer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp" data-wow-delay="0.2s">
            <h2>Pekerjaan Terpopuler</h2>
            <div class="heading-border-light"></div> 
          </div>
              <?php 
              //query di run di mysql
              /*DELIMITER$$
              CREATE OR REPLACE PROCEDURE implicit_cursor1()
              BEGIN
              SELECT DISTINCT pekerjaan.nama AS kerja, pekerjaan.`deskripsi` AS deskripsi, pengusaha.`picture` AS foto, pekerjaan.kategori AS kategori
              FROM pekerjaan JOIN tawar ON pekerjaan.k_id=tawar.k_id
              JOIN freelancer ON freelancer.id= tawar.f_id, pengusaha
              WHERE pekerjaan.`pengusaha_id`=pengusaha.`pengusaha_id`
              GROUP BY pekerjaan.nama
              ORDER BY COUNT(tawar.f_id) DESC
              LIMIT 3;
              END$$
              DELIMITER$$*/

              $query = mysqli_query($conns, "CALL implicit_cursor1()");
              while($populer = mysqli_fetch_array($query)){
        echo '
        <div class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp" data-wow-delay="0.4s">
            <div class="desc-comp-offer-cont">
              <div class="thumbnail-blogs">
                  <div class="caption">
                    <i class="fa fa-chain"></i>
                  </div>
                  <img src ="data:image/jpeg;base64,'.base64_encode($populer["foto"]).'"class="img-fluid" alt="...">
              </div>
              <h3>'.$populer["kerja"].'</h3>
              <p class="desc">'.$populer["deskripsi"].'</p>';
              if($populer["kategori"]=="Visual dan Audio"){
                echo '<a href="visual.php"><i class="fa fa-arrow-circle-o-right"></i> '.$populer["kategori"].'</a>';
              }elseif($populer["kategori"]=="Penulisan dan Penerjemahan"){
                echo '<a href="penulisan.php"><i class="fa fa-arrow-circle-o-right"></i> '.$populer["kategori"].'</a>';
              }elseif($populer["kategori"]=="Web dan Pemrograman"){
                echo '<a href="pemrograman.php"><i class="fa fa-arrow-circle-o-right"></i> '.$populer["kategori"].'</a>';
              }else{
                echo '<a href="desain.php"><i class="fa fa-arrow-circle-o-right"></i> '.$populer["kategori"].'</a>';
              }
            echo '</div>';
          echo '</div> 
        ';
      }   
            ?>
          </div>          
        </div>
      </div>
    </section>

<!--====================================================
                  COMPANY THOUGHT
======================================================-->
    <div class="overlay-thought"></div>
    <section id="thought" class="bg-parallax thought-bg">
      <div class="container">
        <div id="thought-desc" class="row title-bar title-bar-thought owl-carousel owl-theme">
          <div class="col-md-12 ">
            <div class="heading-border bg-white"></div>
            <p class="wow fadeInUp" data-wow-delay="0.4s">It doesn’t matter how many times you fail. It doesn’t matter how many times you almost get it right. No one is going to know or care about your failures, and neither should you. All you have to do is learn from them and those around you because all that matters in business is that you get it right once. Then everyone can tell you how lucky you are.</p>
            <h6>Mark Cuban</h6>
          </div>
          <div class="col-md-12 thought-desc">
            <div class="heading-border bg-white"></div>
            <p class="wow fadeInUp" data-wow-delay="0.4s">Happiness does not come from doing easy work but from the afterglow of satisfaction that comes after the achievement of a difficult task that demanded our best. </p>
            <h6>Theodore Isaac Rubin</h6>
          </div>
        </div>
      </div>         
    </section> 
    
<!--====================================================
                      CLIENT
======================================================-->
    <section id="client" class="client">
      <div class="container">
        <div class="row title-bar">
          <div class="col-md-12">
            <h1 class="wow fadeInUp">Kata Mereka</h1>
            <div class="heading-border"></div>
            <p class="wow fadeInUp" data-wow-delay="0.4s">Website untuk freelancer nomor satu di Indonesia</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="client-cont wow fadeInUp" data-wow-delay="0.1s">
              <img src="img/client/avatar-6.jpg" class="img-fluid" alt="">
              <h5>Leesa len</h5>
              <h6>Freelancer</h6>
              <i class="fa fa-quote-left"></i>
              <p>Di freelance mosv saya mendapatkan part time sesuai dengan passion saya dengan harga yang pas. Keluhan juga dapat tertangani dengan cepat.</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="client-cont wow fadeInUp" data-wow-delay="0.3s">
              <img src="img/client/avatar-2.jpg" class="img-fluid" alt="">
              <h5>Dec Bol</h5>
              <h6>Manager of IT Office</h6>
              <i class="fa fa-quote-left"></i>
              <p>Penyelesaian project menjadi lebih terjangkau dengan adanya platform ini. Semoga kedepannya bisa semakin berkembang.</p>
            </div>
          </div>
        </div>
      </div>        
    </section>  

<!--====================================================
                    CONTACT HOME
======================================================-->
    <div class="overlay-contact-h"></div>
    <section id="contact-h" class="bg-parallax contact-h-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="contact-h-cont">
              <h3 class="cl-white">Hubungi Kami</h3><br>
              <form>
                <div class="form-group cl-white">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter name"> 
                </div>  
                <div class="form-group cl-white">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> 
                </div>  
                <div class="form-group cl-white">
                  <label for="subject">Subjek</label>
                  <input type="text" class="form-control" id="subject" aria-describedby="subjectHelp" placeholder="Enter subject"> 
                </div>  
                <div class="form-group cl-white">
                  <label for="message">Pesan</label>
                  <textarea class="form-control" id="message" rows="3"></textarea>
                </div>  
                <button class="btn btn-general btn-white" role="button"><i fa fa-right-arrow></i>KIRIM</button>
              </form>
            </div>
          </div>
        </div>
      </div>         
    </section> 


<!--====================================================
                      FOOTER
======================================================--> 
    <footer> 
        <div id="footer-s1" class="footer-s1">
          <div class="footer">
            <div class="container">
              <div class="row">
                <!-- About Us -->
                <div class="col-md-3 col-sm-6 ">
                  <div><img src="img/logo-w.png" alt="" class="img-fluid"></div>
                  <ul class="list-unstyled comp-desc-f">
                  </ul><br> 
                </div>
                <!-- End About Us -->

                <!-- Recent News -->
                <div class="col-md-3 col-sm-6 ">
                  <ul class="list-unstyled link-list">
                  </ul>
                </div>
                <!-- End Recent list -->

                <!-- Recent Blog Entries -->
                <div class="col-md-3 col-sm-6 ">
                  
                </div>
                <!-- End Recent Blog Entries -->

                <!-- Latest Tweets -->
                <div class="col-md-3 col-sm-6">
                  <div class="heading-footer"><h2>Kunjungi Kami</h2></div>
                  <address class="address-details-f">
                    Jalan Teknik Kimia <br>
                    Departemen Informatika <br>
                    Institut Teknologi sepuluh Nopember <br>
                    <i class="fa fa-phone"></i> (031) 3982200<br>
                    <i class="fa fa-envelope"></i> <a href="mailto:imail@freelancemosv.id" class="">mail@freelancemosv.id</a>
                  </address>  
                  <ul class="list-inline social-icon-f top-data">
                    <li><a href="#" target="_empty"><i class="fa top-social fa-facebook"></i></a></li>
                    <li><a href="#" target="_empty"><i class="fa top-social fa-twitter"></i></a></li>
                    <li><a href="#" target="_empty"><i class="fa top-social fa-google-plus"></i></a></li> 
                  </ul>
                </div>
                <!-- End Latest Tweets -->
              </div>
            </div><!--/container -->
          </div> 
        </div>

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
        <a href="#home" id="back-to-top" class="btn btn-sm btn-green btn-back-to-top smooth-scrolls hidden-sm hidden-xs" title="home" role="button">
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
  </body>
</html>
