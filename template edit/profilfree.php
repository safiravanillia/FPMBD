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
<html>
<head>
    <title>Freelancer -mosv-</title>
    <link rel="shortcut icon" href="img/favicon-01.png">
</head>

<body>
    <br>

    <table border="1">
    <thead>
        <tr>
        	<th>ID</th>
            <th>Nama</th>
            <th>Usia</th>
            <th>Telepon</th>
            <th>Ahli</th>
            <th>Deskripsi</th>
            <th>Portofolio</th>
            <th>Tindakan</th>
      
        </tr>
    </thead>
    <tbody>
<?php
$sql1 = "SELECT * FROM user where username = '".$_SESSION["name"]."' ";
        $query1 = mysqli_query($conn, $sql1);
while($free1 = mysqli_fetch_array($query1)){
$sql = "SELECT * FROM freelancer where id = '".$free1['id']."' ";
        $query = mysqli_query($conn, $sql);

        while($free = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$free['id']."</td>";
            echo "<td>".$free['f_nama']."</td>";
            echo "<td>".$free['f_usia']."</td>";
            echo "<td>".$free['f_telepon']."</td>";
            echo "<td>".$free['f_ahli']."</td>";
            echo "<td>".$free['f_deskripsi']."</td>";
            echo "<td>".$free['f_portofolio']."</td>";

            echo "<td>";
            echo "<a href='form-edit1.php?id=".$free['id']."'>Edit</a> ";
            echo "</td>";

            echo "</tr>";
        }
}
?>

</tbody>
    </table>
    <a href="index.php">Kembali</a>
    </body>
</html>
