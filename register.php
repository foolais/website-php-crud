<?php 

require 'function.php';

if ( isset($_POST["register"]) ) {
	
	if ( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user berhasil ditambahkan!');
			  </script>";
			  header("location: login.php");
	} else{
		echo mysqli_error($conn);
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>DAFTAR </title>
	<link rel="stylesheet" type="text/css" href="css/style_login.css">		
</head>
	<body>
		<div class="login">
			<h2 class="login-header">Form Register</h2>
			<form class="login-container" action="" method="POST">
				<p>
					<input type="text" placeholder="username" name="username" required />
				</p>
				<p>
					<input type="password" placeholder="Password" name="password" required />
				</p>
				<p>
					<input type="password" placeholder="Konfirmasi Password" name="password2" required />
				</p>
				<p>
					<input type="submit" value = "Register" name="register" />
				</p>
				<p>
					<input type="button" value="Back" onclick="goBack()">
				</p>
			</form>
		</div>
	<script>
		function goBack(){
		  window.location.replace("login.php");
		}
	</script>

</body>
</html>