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
// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telp'];

    // buat query update
    $sql = "UPDATE pengusaha SET nama='$nama',alamat='$alamat', telepon='$telepon' WHERE id=$id";
    $query = mysqli_query($conn, $sql);

    // apakah query update berhasil?
    if($query) {
        header('Location: profilpeng.php');
    } else {
        die("Gagal menyimpan perubahan...");
    }
}
    header('Location: profilpeng.php');
?>