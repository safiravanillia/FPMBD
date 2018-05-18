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
        width : 150px;
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

    .nama{
      font-weight : bold;
      font-size : 20px;
      color : #e30066 ;
    }

    .kategori{
      font-size : 12px;
      font-style : italic;
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


   
<div class = "bio">
    <div class ="photo">
      <?php
      $s = "SELECT picture FROM freelancer WHERE id = '".$id."'";
      $q = mysqli_query($conn, $s);
      if($row = mysqli_fetch_array($q)){
        if(!$row["picture"]){
          echo '<img src = "foto/default-user-image.png">';
        }
      }
    ?>
    </div>
    <p style = "margin-top : 20px; margin-left : 20px;">Nama : <?php echo $name;?></p> 
    <p style = "margin-left : 20px;">Usia : <?php echo $usia;?></p>
    <p style = "margin-left : 20px">Keahlian : <?php echo $master;?></p>
    <p style = "margin-left : 20px">No. Telp : <?php echo $telpon;?></p>
    <p style = "margin-left : 20px">E-mail : <?php echo $email;?></p>
</div>
<div class = "details">
    <div class = "bar">
        <div class = "bar-button" onclick="openTab('review', this, event)"><b>Review</b></div>
        <div class = "bar-button" onclick="openTab('histori', this, event)">Histori Pekerjaan</div>
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
        echo "<span><img width='50%' height='50%' src= 'images/".$row['f_portofolio']."'></span>";
      }
    ?>
    </div>
    <div class = "desc" id="review">
      <?php
      $komen = "SELECT pengusaha.nama AS namapengusaha, pekerjaan.nama AS namapekerjaan, review.r_komentar_p AS komentar ,review.`r_tgl` AS tgl ,review.`r_rating` AS rating
           FROM review, tawar, freelancer, pengusaha, pekerjaan
           WHERE review.`bid_id`=tawar.`bid_id`
           AND tawar.`f_id`=freelancer.`id`
           AND tawar.k_id=pekerjaan.k_id
           AND pekerjaan.pengusaha_id=pengusaha.pengusaha_id
           AND freelancer.`id`= '$id'";

      $result = mysqli_query($conn, $komen);
      while($row = mysqli_fetch_array($result)){
        echo 'nama perusahaan: '.$row["namapengusaha"].'<br>
        pekerjaan: '.$row["namapekerjaan"].'<br>
        review pengusaha: '.$row["komentar"].'<br>
        tgl: '.$row["tgl"].'<br>
        rating: '.$row["rating"].'<br><br>
        ';
      }  
      ?>
    </div>
    <div class = "desc" id="histori">
      <?php
      $jumlah="SELECT COUNT(pekerjaan.`k_id`) AS jum
      FROM tawar, freelancer, pengusaha, pekerjaan
      WHERE freelancer.`id`='$id'
      AND freelancer.`id`=tawar.`f_id`
      AND tawar.`k_id`=pekerjaan.`k_id`
      AND pekerjaan.`pengusaha_id`=pengusaha.`pengusaha_id`";

      $res = mysqli_query($conn, $jumlah);
      while($roww = mysqli_fetch_array($res)){
        echo 'pekerjaan yang pernah diambil: '.$roww["jum"].' pekerjaan<br><br>
        <b>Berikut adalah pekerjaan yang pernah saya ambil:</b><br>
        ';
      }  

      $histori = "SELECT pengusaha.`nama` AS nm_peng, pekerjaan.`nama` AS kerja
      FROM tawar, freelancer, pengusaha, pekerjaan
      WHERE freelancer.`id`='$id'
      AND freelancer.`id`=tawar.`f_id`
      AND tawar.`k_id`=pekerjaan.`k_id`
      AND pekerjaan.`pengusaha_id`=pengusaha.`pengusaha_id`";

      $result = mysqli_query($conn, $histori);
      while($row = mysqli_fetch_array($result)){
        echo 'nama perusahaan: '.$row["nm_peng"].'<br>
        pekerjaan: '.$row["kerja"].'<br><br>
        ';
      }  
      ?>
    </div>
</div>
<br />
<button class = "edit"><?php echo '<a href ="form-edit1.php?id='.$id.'">';?>Ubah Profil</a></button>

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
