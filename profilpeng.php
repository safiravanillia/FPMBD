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
      font-weight : bold;
      text-align : center;
      border-radius : 15px;
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
      border-radius: 15px;
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
    <div class = "bar-button" onclick="openTab('trigger2', this, event)"><b>Log Tawar</b></div>    
    <div class = "bar-button" onclick="openTab('trigger1', this, event)"><b>Log Review</b></div>
    <div class = "bar-button" style="padding-top : 10px" onclick="openTab('selesai', this, event)"><b>Projek Terselesaikan oleh Freelancer</b></div>
    <div class = "bar-button" onclick="openTab('projek', this,event)">Projek Aktif</div>
    <div class = "bar-button" style="padding-top : 10px;" onclick="openTab('deskripsi', this,event)"  id="defaultOpen"><b>Deskripsi Perusahaan</b></div>
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
    $s = "CREATE OR REPLACE VIEW lihatlah AS SELECT pekerjaan.k_id, pekerjaan.nama, pekerjaan.deskripsi, pekerjaan.kategori
      FROM pengusaha, pekerjaan 
      WHERE pengusaha.pengusaha_id = pekerjaan.pengusaha_id AND 
        pekerjaan.tglbuka < SYSDATE() AND
        pekerjaan.tgltutup > SYSDATE() AND
        pengusaha.pengusaha_id = '$id'";
        $q = mysqli_query($conn, $s);
        $s1="SELECT * from lihatlah;";
      $q1 = mysqli_query($conn, $s1);
      if(mysqli_num_rows($q1) > 0){
        while ($row = mysqli_fetch_array($q1)){
           $s = "SELECT jumlah_penawar(".$row["k_id"].") AS jum;";
         $r = mysqli_query($conn, $s);
         while($baris = mysqli_fetch_array($r)){
           $jum = $baris["jum"];
         }
          echo '<div class = "job-available">
              <p class = "nama">'.$row["nama"].'</p>
              <p>'.$row["deskripsi"].'</p>
              <p class = "kategori">Kategori : '.$row["kategori"].' <span style="padding-left : 60px">Jumlah Penawar : '.$jum.'</span></p>
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

      $kerja="SELECT freelancer.`f_nama` AS nm_free, pekerjaan.`nama` AS kerja, tawar.`bid_id` AS tawar, review.`komentar` as komen
      FROM tawar LEFT JOIN review
      ON tawar.`bid_id`=review.`bid_id`
      LEFT JOIN pekerjaan
      ON tawar.`k_id`=pekerjaan.`k_id`
      LEFT JOIN pengusaha
      ON pekerjaan.`pengusaha_id`=pengusaha.`pengusaha_id` 
      LEFT JOIN freelancer
      ON freelancer.`id`=tawar.`f_id`
      WHERE pengusaha.`pengusaha_id`='$id'
      AND tawar.`b_status` = 'SELESAI';";

      $result = mysqli_query($conn, $kerja);
      while($row = mysqli_fetch_array($result)){
        $nm_pk=$row["kerja"];
        $free=$row["nm_free"];
        $idtawar=$row["tawar"];
        $komen=$row["komen"];

        if($komen== NULL){
        echo '
          <div class = "job-available">
            <div class = "nama">'.$nm_pk.'</div>
            <p class = "kategori">Freelancer : <span style = "font-weight : bold; color : blue;">'.$free.'</span></p>
            <div class = "penawar">
                <a href = "review.php?bid_id='.$idtawar.'">Beri Review</a>
              </div>
          </div>
          ';
        } else{
          echo '
           <div class = "job-available">
            <div class = "nama">'.$nm_pk.'</div>
            <p class = "kategori">Freelancer : <span style = "font-weight : bold; color : blue;">'.$free.'</span></p>
            <div class = "penawar">
                <a href = "hapus.php?bid_id='.$idtawar.'">Hapus Review</a>
              </div>
            </div>
          ';
        }
      }
      ?>
    </div>
    <div class = "desc" id="trigger1">
      <?php
      //run di sql yang komen
      /*CREATE TABLE `log_review` (
  `r_id` INT(11),
  `bid_id` INT(11),
  `komentar` VARCHAR(500) ,
  `tgl` DATE,
  `rating` INT(11),
  `tgl_perubahan` DATE,
  `status` VARCHAR(10)
);

-- Insert new data
DELIMITER$$
CREATE OR REPLACE TRIGGER log_insert_review
AFTER INSERT ON review
FOR EACH ROW
BEGIN
  INSERT INTO log_review VALUES (new.r_id, new.bid_id, new.komentar,new.tgl,new.rating, SYSDATE(), 'INSERT');
END$$
DELIMITER$$

-- delete data
DELIMITER$$
CREATE OR REPLACE TRIGGER log_del_review
AFTER DELETE ON review
FOR EACH ROW
BEGIN
  INSERT INTO log_review VALUES (old.r_id, old.bid_id, old.komentar,old.tgl,old.rating, SYSDATE(), 'DELETE');
END$$
DELIMITER$$*/

      $jumlah= "SELECT r_id AS ID_review, komentar AS Review, tgl AS Dikirim, tgl_perubahan AS Diubah, STATUS AS Tindakan
      FROM log_review, tawar, pekerjaan
      WHERE tawar.`bid_id`=log_review.`bid_id`
      AND tawar.`k_id`=pekerjaan.`k_id`
      AND pekerjaan.`pengusaha_id`='$id';";
      $res = mysqli_query($conn, $jumlah);
      while($row = mysqli_fetch_array($res)){
        echo '
          <div class = "job-available">
            <div class = "nama">'.$row["Review"].'</div>
            <p class = "kategori">ID Review : <span style = "font-weight : bold; color : blue;">'.$row["ID_review"].'</span></p>
            <p>Tanggal kirim: '.$row["Dikirim"].'<br>
            Tanggal ubah: '.$row["Diubah"].'<br>
            Tindakan: '.$row["Tindakan"].'</p>
          </div>
          ';
      }
      ?>
    </div>
    <div class = "desc" id="trigger2">
      <?php
      //run di sql yang komen
      /*CREATE TABLE `log_tawar` (
  `bid_id` INT(11) ,
  `k_id` INT(11) ,
  `f_id` INT(11) ,
  `harga` INT(11) ,
  `b_status` VARCHAR(30) ,
  `tgl_perubahan` DATE,
  `status` VARCHAR(200)
);

-- insert data
DELIMITER$$
CREATE OR REPLACE TRIGGER log_insert_tawar
AFTER INSERT ON tawar
FOR EACH ROW
BEGIN
  INSERT INTO log_tawar VALUES (new.bid_id, new.k_id, new.f_id,new.harga,new.b_status, SYSDATE(), 'INSERT');
END$$
DELIMITER$$

INSERT INTO `tawar` VALUES (31, 4, 6, 'TUNGGU');

-- update data
DELIMITER$$
CREATE OR REPLACE TRIGGER log_update_tawar
AFTER UPDATE ON tawar
FOR EACH ROW
BEGIN
  INSERT INTO log_tawar VALUES (old.bid_id, old.k_id, old.f_id,old.harga,old.b_status, SYSDATE(), 'OLD UPDATE');
  INSERT INTO log_tawar VALUES (new.bid_id, new.k_id, new.f_id,new.harga,new.b_status, SYSDATE(), 'NEW UPDATE');
END$$
DELIMITER$$*/

      $jumlah= "SELECT log_tawar.bid_id AS id, pekerjaan.`nama` AS kerja, log_tawar.`harga` AS harga, log_tawar.`b_status` 
      AS status, log_tawar.`tgl_perubahan` AS tgl, log_tawar.`status` AS tindakan
      FROM log_tawar, pekerjaan, pengusaha
      WHERE log_tawar.`k_id`=pekerjaan.`k_id`
      AND pekerjaan.`pengusaha_id`=pengusaha.`pengusaha_id`
      AND pengusaha.`pengusaha_id`='$id';";
      $res = mysqli_query($conn, $jumlah);
      while($row = mysqli_fetch_array($res)){
        echo '
          <div class = "job-available">
            <div class = "nama">'.$row["kerja"].'</div>
            <p class = "kategori">ID Tawar : <span style = "font-weight : bold; color : blue;">'.$row["id"].'</span></p>
            <p>Permintaan bayaran: '.$row["harga"].'<br>
            Status: '.$row["status"].'<br>
            Tanggal ubah: '.$row["tgl"].'<br>
            Tindakan: '.$row["tindakan"].'</p>
          </div>
          ';
      }
      ?>
    </div>
</div>
<br />
<button class = "btn btn-general edit"><?php echo '<a href ="form-edit2.php?id='.$id.'">';?>Ubah Profil</a></button>
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
