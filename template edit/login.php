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
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$pass = $_POST['passwd'];
		$user = $_POST["user"];
		$sql = "SELECT * FROM user WHERE username = '".$user."'";
		$rs = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_array($rs)){
			if(password_verify($pass, $row["password"])){
				$_SESSION["name"] = $user;
				$_SESSION["logged"] = true;
			}

			if(!empty($_POST["remember"]) && $_SESSION["logged"] == true)   
			{  
				setcookie ("member_login",$user,time()+ (10 * 365 * 24 * 60 * 60));setcookie ("member_password",$pass,time()+ (10 * 365 * 24 * 60 * 60));
				$_SESSION["admin_name"] = $name;
			}  elseif (empty($_POST["remember"]) && $_SESSION["logged"] == true)   {  
				if(isset($_COOKIE["member_login"]))   
				{  
					setcookie ("member_login","");  
				}  
				if(isset($_COOKIE["member_password"]))   
				{  
					setcookie ("member_password","");  
				}  
			}
			header('Location:index.php');
		}
		$_SESSION["gagal"] = true; 
		header('Location:index.php');
	}
 ?>
