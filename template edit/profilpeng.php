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

  $sql1 = "SELECT * FROM user where username = '".$_SESSION["name"]."' ";
        $query1 = mysqli_query($conn, $sql1);
  while($peng1 = mysqli_fetch_array($query1)){
  $sql = "SELECT * FROM pengusaha where pengusaha_id = '".$peng1['id']."'";
          $query = mysqli_query($conn, $sql);

          while($peng = mysqli_fetch_array($query)){
              
              $id = $peng['pengusaha_id'];
              $compname = $peng['nama'];
              $address = $peng['alamat'];
              $number = $peng['telepon'];
              $email = $peng1['email'];
              $deskripsi = $peng['deskripsi'];
          }
  }
  //echo 'ahsjah';  echo $id;
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
    .bio{
      width : 300px;
      height : 450px;
      background-color : #a34e4e;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      margin-left : 130px;
      margin-top : 40px;
      float : left;
      color : white;
    }

    .details{
      width : 700px;
      height : 450px;
      margin-left : 90px;
      margin-top : 40px;
      box-shadow: 0px 4px 8px 0 rgba(0, 0, 0, 0.2);
      float : left;
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
      width : 200px;
      height : 100%;
      background-color : white;
      float : right;
      color : #808282;
      margin : center;
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
      margin-left : 130px;
      text-align: center;
      text-decoration: none;
      border: none;
      outline: none;
      cursor: pointer;
      -webkit-transition-duration: 0.4s; /* Safari */
      transition-duration: 0.4s;
      color : white;
    }

    .edit:hover{
      background-color : #c57575;
    }

    .edit a{
      text-decoration: none;
      color: white;
      display: block;
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

    .kategori{
      font-size : 12px;
      font-style : italic;
    }

    .penawar{
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

    .penawar:hover{
      background-color : #8c3d3d;
    }

    .penawar a{
      text-decoration: none;
        color: white;
        display: block;
    }
    </style>
  </head>

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

<div class = "bio">
  <div class ="photo">
    <?php
      $s = "SELECT picture FROM pengusaha WHERE pengusaha_id = ".$id;
      //echo $s;
      $q = mysqli_query($conn, $s);
      if($row = mysqli_fetch_array($q)){
        if(!$row["picture"]){
          echo '<img src = "foto/default-user-image.png">';
        }
        else{
          echo '<img src ="data:image/jpeg;base64,'.base64_encode($row['picture']).'" style = "width:150px;height:150px;">';
        }
      }
    ?>
  </div>
  <p style = "margin-top : 50px; margin-left : 20px;">Nama Perusahaan : <?php echo $compname;?></p> 
  <p style = "margin-left : 20px;">Alamat : <?php echo $address;?></p>
  <p style = "margin-left : 20px">No. Telp : <?php echo $number;?></p>
  <p style = "margin-left : 20px">E-mail : <?php echo $email;?></p>
</div>
<div class = "details">
  <div class = "bar">
    <div class = "bar-button" onclick="openTab('selesai', this, event)"><b>Pekerjaan Selesai</b></div>
    <div class = "bar-button" onclick="openTab('projek', this,event)">Projek Aktif</div>
    <div class = "bar-button" onclick="openTab('deskripsi', this,event)"  id="defaultOpen"><b>Deskripsi Perusahaan</b></div>
  </div>
  <div class = "desc" id="deskripsi">
    <?php
      if($deskripsi == NULL){
        echo '<p class = "kategori">Deskripsi belum dipaparkan</p>';
      }
      else{
        echo '<p class = "nama">Deskripsi '.$compname.'</p>';
        echo '<p>'.$deskripsi.'</p>';
      }
    ?>
  </div>
  <div class = "desc" id="projek">
    <?php
      $s = "SELECT pekerjaan.k_id, pekerjaan.nama, pekerjaan.deskripsi, pekerjaan.kategori
      FROM pengusaha, pekerjaan 
      WHERE pengusaha.pengusaha_id = pekerjaan.pengusaha_id AND 
        pekerjaan.tglbuka < SYSDATE() AND
        pekerjaan.tgltutup > SYSDATE() AND
        pengusaha.pengusaha_id = ".$id;

      $q = mysqli_query($conn, $s);
      if(mysqli_num_rows($q) > 0){
        while ($row = mysqli_fetch_array($q)){
          echo '<div class = "job-available">
              <p class = "nama">'.$row["nama"].'</p>
              <p>'.$row["deskripsi"].'</p>
              <p class = "kategori">Kategori : '.$row["kategori"].'</p>
              <div class = "penawar">
                <a href = "penawar.php?k_id='.$row["k_id"].'">Lihat Penawar</a>
              </div>
              </div>';
        }
      }
      else {
        echo '<p class = "nama">Perusahaan belum membuat projek</p>';
      }
    ?>
  </div>
  <div class = "desc" id="selesai">
      <?php
      $jumlah= "SELECT COUNT(tawar.`bid_id`) AS jum
      FROM tawar, freelancer, pengusaha, pekerjaan
      WHERE pengusaha.`pengusaha_id`='$id'
      AND freelancer.`id`=tawar.`f_id`
      AND tawar.`k_id`=pekerjaan.`k_id`
      AND pekerjaan.`pengusaha_id`=pengusaha.`pengusaha_id`
      AND tawar.`b_status` = 'SELESAI';";
      $res = mysqli_query($conn, $jumlah);
      while($row = mysqli_fetch_array($res)){
        echo '<p style = "font-size : 20px; font-weight : bold;">Total '.$row["jum"].' pekerjaan selesai</p>';
      }

      $kerja="SELECT freelancer.`f_nama` AS nm_free, pekerjaan.`nama` AS kerja, tawar.`bid_id` AS tawar
      FROM tawar, freelancer, pengusaha, pekerjaan
      WHERE pengusaha.`pengusaha_id`='$id'
      AND freelancer.`id`=tawar.`f_id`
      AND tawar.`k_id`=pekerjaan.`k_id`
      AND pekerjaan.`pengusaha_id`=pengusaha.`pengusaha_id` 
      
      AND tawar.`b_status` = 'SELESAI';";

      $result = mysqli_query($conn, $kerja);
      while($row = mysqli_fetch_array($result)){
        echo '
          <div class = "job-available">
            <div class = "nama">'.$row["kerja"].'</div>
            <p class = "kategori">Freelancer : <span style = "font-weight : bold; color : blue;">'.$row["nm_free"].'</span></p>
            <div class = "penawar">
                <a href = "review.php?bid_id='.$row["tawar"].'">Beri Review</a>
              </div>
          </div>
        ';
      } 
        while($row = mysqli_fetch_array($result)){
        echo '
          <div class = "job-available">
            <div class = "nama">'.$row["kerja"].'</div>
            <p class = "kategori">Freelancer : <span style = "font-weight : bold; color : blue;">'.$row["nm_free"].'</span></p>
            <div class = "penawar">
                <a href = "hapus.php?bid_id='.$row["tawar"].'">Hapus Review</a>
              </div>
          </div>
        ';
      }
      ?>
    </div>
</div>
<br />
<button class = "edit"><?php echo '<a href ="form-edit2.php?id='.$id.'">';?>Ubah Profil</a></button>
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
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
    </script>

</html>
