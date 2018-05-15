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
            <th>Alamat</th>
            <th>Telepon</th>
        </tr>
    </thead>
    <tbody>
<?php
$sql1 = "SELECT * FROM user where username = '".$_SESSION["name"]."' ";
        $query1 = mysqli_query($conn, $sql1);
while($peng1 = mysqli_fetch_array($query1)){
$sql = "SELECT * FROM pengusaha where pengusaha_id = '".$peng1['id']."'";
        $query = mysqli_query($conn, $sql);

        while($peng = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$peng['pengusaha_id']."</td>";
            echo "<td>".$peng['nama']."</td>";
            echo "<td>".$peng['alamat']."</td>";
            echo "<td>".$peng['telepon']."</td>";

            echo "<td>";
            echo "<a href='form-edit2.php?id=".$peng['pengusaha_id']."'>Edit</a> ";
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
