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
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telp'];
    $deskripsi = $_POST['deskripsi'];
    $foto = $_FILES["foto"]["name"];    

    if(isset($_FILES["foto"])){
      $foto_tmp = addslashes(file_get_contents($_FILES["foto"]["tmp_name"]));
      $foto_type = addslashes($_FILES["foto"]["type"]);
      if(!empty($foto)){      
        /*move_uploaded_file($_FILES['foto']['tmp_name'],'foto/'.$foto);*/
        $sql = "UPDATE pengusaha SET nama = '$nama', alamat = '$alamat', telepon = '$telepon' , deskripsi = '$deskripsi', picture='$foto_tmp' WHERE pengusaha_id = '$id'";
        //echo $sql;
        $query = mysqli_query($conn, $sql);
      }else{
        $sql = "UPDATE pengusaha SET nama = '$nama', alamat = '$alamat', telepon = '$telepon' , deskripsi = '$deskripsi' WHERE pengusaha_id = '$id'";
        //echo $sql;
        $query = mysqli_query($conn, $sql);
      }
    }

    /*if($query) {
        header('Location: profilpeng.php');
    } else {
        die("Gagal menyimpan perubahan...");
    }*/
}
    header('Location: profilpeng.php');
?>
