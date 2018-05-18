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

    <title>Business Bootstrap Responsive Template</title>
    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- Global Stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate/animate.min.css">
    <link rel="stylesheet" href="css/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Core Stylesheets -->
    <link rel="stylesheet" href="css/project.css"> 
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
                      <input type="text" class="form-control" placeholder="Ketikkan Kategori" aria-describedby="basic-addon2">
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
    <div id="home-p" class="home-p pages-head2 text-center">
      <div class="container">
        <h1 class="wow fadeInUp" data-wow-delay="0.1s"> Semua Kategori</h1>
        <p>Pilih kategori pekerjaan yang dibutuhkan dan mulai mempekerjakan freelancer</p>
      </div><!--/end container-->
    </div> 

<!--====================================================
                        PROJECT-P1
======================================================--> 
    <section id="project-p1" class="project-p1">
      <div class="container-fluid">
        <div class="  row">
              <div class="col-md-3 col-sm-6 col-xs-12 bg-matisse">
              <div class="project-p1-cont wow fadeInUp  text-center" data-wow-delay="0.3s">
                <i class="fa fa-line-chart fa-2x"></i>
                <p>It is a long established fact</p>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 bg-chathams">
              <div class="project-p1-cont wow fadeInUp  text-center" data-wow-delay="0.6s">
                <i class="fa fa-leaf fa-2x"></i>
                <p>It is a long established fact</p>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 bg-atlis">
              <div class="project-p1-cont wow fadeInUp  text-center" data-wow-delay="0.9s">
                <i class="fa fa-soccer-ball-o fa-2x"></i>
                <p>It is a long established fact</p>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 bg-starship">
              <div class="project-p1-cont wow fadeInUp  text-center" data-wow-delay="1.2s">
                <i class="fa fa-ticket fa-2x"></i>
                <p>It is a long established fact</p>
              </div>
            </div>
        </div>
      </div>
    </section>

<!--====================================================
                        PROJECT-P2
======================================================--> 
    <section id="project-p2" class="project-p2" style="background: #fdeef0;">
      <div class="container-fluid">
        <div class="row"> 
          <div class="col-md-12">
              <div class="project-p2-cont">
                <div class="col-md-5 col-sm-6">
                  <div class="project-p2-desc">
                    <h4>Penulisan dan penerjemahan</h4>
                    <a href="penulisan.php" class="text-right"><i class="fa fa-arrow-circle-o-right"></i> See More</a>
                  </div>
                </div>
                <img src="img/project/pro-8.jpg" class="img-fluid" alt="...">
              </div>
            </div>
            <div class="col-md-6">
              <div class="project-p2-cont">
                <div class="col-md-5 col-sm-6">
                  <div class="project-p2-desc">
                    <h4>Visual dan audio</h4>
                    <a href="visual.php" class="text-right"><i class="fa fa-arrow-circle-o-right"></i> See More</a>
                  </div>
                </div>
                <img src="img/project/pro-6.jpg" class="img-fluid" alt="...">
              </div>
            </div>
            <div class="col-md-6">
              <div class="project-p2-cont">
                <div class="col-md-5 col-sm-6">
                  <div class="project-p2-desc wow fadeInUp" data-wow-delay="0.6s">
                    <h4>Web dan Pemograman</h4>
                    <a href="pemrograman.php" class="text-right"><i class="fa fa-arrow-circle-o-right"></i> See More</a>
                  </div>
                </div>
                <img src="img/project/pro-7.jpg" class="img-fluid" alt="...">
              </div>
            </div>
            <div class="col-md-12">
              <div class="project-p2-cont">
                <div class="col-md-5 col-sm-6">
                  <div class="project-p2-desc wow fadeInUp" data-wow-delay="0.3s">
                    <h4>Grafis dan desain</h4>
                    <a href="desain.php" class="text-right"><i class="fa fa-arrow-circle-o-right"></i> See More</a>
                  </div>
                </div>
                <img src="img/project/pro-3.jpg" class="img-fluid" alt="...">
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
                  <div class="heading-footer"><h2>Useful Links</h2></div>
                  <ul class="list-unstyled link-list">
                    <li><a href="about.html">About us</a><i class="fa fa-angle-right"></i></li> 
                    <li><a href="project.html">Project</a><i class="fa fa-angle-right"></i></li> 
                    <li><a href="careers.html">Career</a><i class="fa fa-angle-right"></i></li> 
                    <li><a href="faq.html">FAQ</a><i class="fa fa-angle-right"></i></li> 
                    <li><a href="contact.html">Contact us</a><i class="fa fa-angle-right"></i></li> 
                  </ul>
                </div>
                <!-- End Recent list -->

                <!-- Recent Blog Entries -->
                <div class="col-md-3 col-sm-6 ">
                  <div class="heading-footer"><h2>Unggahan Terbaru</h2></div>
                  <ul class="list-unstyled thumb-list">
                    <li>
                      <div class="overflow-h">
                        <a href="#">Praesent ut consectetur diam.</a>
                        <small>02 OCT, 2017</small>
                      </div>
                    </li>
                    <li>
                      <div class="overflow-h">
                        <a href="#">Maecenas pharetra tellus et fringilla.</a>
                        <small>02 OCT, 2017</small>
                      </div>
                    </li>
                  </ul>
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
        <a href="#home-p" id="back-to-top" class="btn btn-sm btn-green btn-back-to-top smooth-scrolls hidden-sm hidden-xs" title="home" role="button">
            <i class="fa fa-angle-up"></i>
        </a>
    </footer>

    <!-- Bootstrap core JavaScript -->
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
