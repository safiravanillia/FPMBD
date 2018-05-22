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

if( isset($_GET['bid_id']) ){

    $bid = $_GET["bid_id"];

    $sql = "DELETE FROM review WHERE bid_id=$bid";
    $query = mysqli_query($conn, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: profilpeng.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}   
?>