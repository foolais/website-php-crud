<?php

ob_start(); 
session_start(); //variabelnya bisa dipake disemua tempat
//jika ada session dari username akan dialihkan ke index.php
if( isset($_SESSION['id_user']) ) header("location: index.php"); 
require "function.php";

 // proses login 
	if( isset($_POST['login']) ){ //kalau ada kiriman dari tombol submit
		$username = $_POST['username']; //setor username dari yg diisakan
		$password = $_POST['password']; //setor password dari yg diisakan
		//FROM (users) nama tabel dari database
		$sql_login = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$password' " );
		//kondisi jika berhasil / gagal
		if( mysqli_num_rows($sql_login) === 1 ){ //berhasil nilai 1
			$row_akun = mysqli_fetch_assoc($sql_login); //variabel untuk mengambil nilai dari sql login
			//buat nyamain username sm password
			$_SESSION['id_user'] = $row_akun['username'];
			$_SESSION['id_user'] = $row_akun['password'];
			
			header("location: index.php");
			} else {
				header("location: login.php?login-gagal"); //dari sini
			}
	 } 
	 //ngarahin ke register page
	 if( isset($_POST['register'])){
	 	header("location: register.php");
	 }


?>


<!DOCTYPE html>
<html>
<head>
	<title>Login </title>
	<link rel="stylesheet" type="text/css" href="css/style_login.css">		
</head>
<body>
	<div class="login">
		<h2 class="login-header">Form Login</h2>
		<form class="login-container" action="login.php" method="POST">
				<p>
					<input type="text" placeholder="username" name="username" />
				</p>
				<p>
					<input type="password" placeholder="Password" name="password"/> 
				</p>
			<?php if(isset($_GET['login-gagal']) ) {?> <!-- login gagal -->

				<p style="color: red";>maaf username atau password salah</p>

			<?php } ?>
				<p>
					<input type="submit" value = "Login" name="login" />
				</p>
				<p>
					<input type="submit" value = "Register" name="register" />
				</p>
		</form>
	</div>
</body>
</html>

<?php

mysqli_close($conn);
ob_end_flush();
?>