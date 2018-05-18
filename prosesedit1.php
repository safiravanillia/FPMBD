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
    $usia = $_POST['umur'];
    $telepon = $_POST['telp'];
    $ahli = $_POST['ahli'];
    $biodata = $_POST['bio'];

    // buat query update
    $sql = "UPDATE freelancer SET f_nama='$nama', f_usia=$usia, f_telepon=$telepon, f_ahli='$ahli', f_deskripsi='$biodata' WHERE id=$id";
    echo $sql;
    $query = mysqli_query($conn, $sql);

    // apakah query update berhasil?
    if($query) {
        header('Location: profilfree.php');
    } else {
        die("Gagal menyimpan perubahan...");
    }
}
    header('Location: profilfree.php');
?>