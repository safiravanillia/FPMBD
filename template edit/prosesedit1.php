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

if(isset($_POST['simpan'])){

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $usia = $_POST['umur'];
    $telepon = $_POST['telp'];
    $ahli = $_POST['ahli'];
    $biodata = $_POST['bio'];
    $porto = addslashes($_FILES["porto"]["name"]);
    $foto = addslashes($_FILES["foto"]["name"]);

    if(isset($_FILES["porto"])){
    $porto_tmp = addslashes(file_get_contents($_FILES["porto"]["tmp_name"]));
    $porto_type = addslashes($_FILES["porto"]["type"]);
    }
    
    if(isset($_FILES["foto"])){
    $foto_tmp = addslashes(file_get_contents($_FILES["foto"]["tmp_name"]));
    $foto_type = addslashes($_FILES["foto"]["type"]);
    }

    if(isset($_FILES["porto"]) && isset($_FILES["foto"])){
      if(!empty($porto) && !empty($foto)){  
          $sql = "UPDATE freelancer SET f_nama='$nama', f_usia=$usia, f_telepon=$telepon, f_ahli='$ahli', f_deskripsi='$biodata', f_portofolio='$porto_tmp', picture='$foto_tmp' WHERE id='$id'";
          $query = mysqli_query($conn, $sql); 

      }elseif(empty($porto) && !empty($foto)){
          $sql = "UPDATE freelancer SET f_nama='$nama', f_usia=$usia, f_telepon=$telepon, f_ahli='$ahli', f_deskripsi='$biodata', picture='$foto_tmp' WHERE id='$id'";
          $query = mysqli_query($conn, $sql); 
      }elseif(!empty($porto) && empty($foto)){
          $sql = "UPDATE freelancer SET f_nama='$nama', f_usia=$usia, f_telepon=$telepon, f_ahli='$ahli', f_deskripsi='$biodata', f_portofolio='$porto_tmp' WHERE id='$id'";
          $query = mysqli_query($conn, $sql);
      }else{
        $sql = "UPDATE freelancer SET f_nama='$nama', f_usia=$usia, f_telepon=$telepon, f_ahli='$ahli', f_deskripsi='$biodata' WHERE id='$id'";
        $query = mysqli_query($conn, $sql);
      }
    }
}
    header('Location: profilfree.php');
?>
