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
            <th>Biodata</th>
            <th>Tindakan</th>
      
        </tr>
    </thead>
    <tbody>
<?php

$sql = "SELECT * FROM freelancer";
        $query = mysqli_query($conn, $sql);

        while($free = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$free['freelancer_id']."</td>";
            echo "<td>".$free['nama']."</td>";
            echo "<td>".$free['usia']."</td>";
            echo "<td>".$free['telepon']."</td>";
            echo "<td>".$free['ahli']."</td>";
            echo "<td>".$free['biodata']."</td>";

            echo "<td>";
            echo "<a href='form-edit1.php?id=".$free['freelancer_id']."'>Edit</a> ";
            echo "</td>";

            echo "</tr>";
        }
?>

</tbody>
    </table>
    <a href="index.php">Kembali</a>
    </body>
</html>