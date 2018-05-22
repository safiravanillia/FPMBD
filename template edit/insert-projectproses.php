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
    			if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['simpan'])){
    				//INSERT INTO `pekerjaan` (`k_id`, `pengusaha_id`, `nama`, `deskripsi`, `tglbuka`, `tgltutup`, `hargamin`, `hargamax`, `kategori`) VALUES ('33', '9', 'hh', 'ghkhgkhgl', '2018-05-02', '2018-05-19', '1450000', '1500000', 'Penulisan dan Penerjemahan');

                    if(isset($_SESSION["name"])){
                        $name = $_SESSION["name"];
                        $sql = "SELECT id FROM user WHERE username = '".$name."'";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                            $id = $row["id"];
                        }
                    }

    				$name = $_POST["nama"];
    				$description = $_POST["description"];
    				$tglbuka = $_POST["tglbuka"];
    				$tgltutup = $_POST["tgltutup"];
    				$hargamin = $_POST["hargamin"];
    				$hargamax = $_POST["hargamax"];
    				$kategori = $_POST["kategori"];

    				//echo $kategori;

    				$sql = "INSERT INTO `pekerjaan` (`k_id`, `pengusaha_id`, `nama`, `deskripsi`, `tglbuka`, `tgltutup`, `hargamin`, `hargamax`, `kategori`) VALUES ('', '$id', '$name', '$description', '$tglbuka', '$tgltutup', '$hargamin', '$hargamax', '$kategori');";
    				$result = mysqli_query($conn, $sql);
    				if($result){
                            header('Location: project.php');
		  			}else {
		  					header('Location: index.php');
		  			}
                }
                
?>