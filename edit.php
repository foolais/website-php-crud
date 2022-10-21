<?php 
require 'function.php';

//ambil data dari URL
$id = $_GET["id"];

//ambil data berdasar kecamatan
$alamat = query("SELECT * FROM alamat WHERE id = $id")[0];


 if ( isset($_POST["submit"]) ) {
 	//cek data berhasil diubah atau tidak
 	if (ubah($_POST) > 0 ) {
 		echo "<script>
 				alert('data berhasil diubah');
 				document.location.href = 'index.php';
 			  </script>";
 	}
 	else{
 		echo "<script>
 				alert('data gagal diubah');
 				document.location.href = 'index.php';
 			  </script>";
 	}
 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UPDATE FORM</title>
	<link rel="stylesheet" type="text/css" href="css/style_template.css">
	<link rel="stylesheet" href="css/style_edit.css">
</head>
<body>
	<nav class="navbar">
		<div class="menu">
			<a href="index.php">Home</a>
			<a href="agenda.php">Agenda</a>
			<a href="about.php">About</a>
		</div>
		<div class="logout">
			<a href="logout.php">Logout</a>
		</div>
	</nav>

	<section class="home">
		<div class="edit">
			<div class="edit-header">
				<h1>EDIT FORM</h1>
			</div>
			<form class="edit-container" action="" method="post">
				<input type="hidden" name="id" value="<?= $alamat["id"] ?>">
				<div class="form-input">
					<input type="text" name="Kecamatan" value="<?= $alamat["Kecamatan"] ?>">
				</div>
				<div class="form-input">
					<input type="text" name="Kelurahan" value="<?= $alamat["Kelurahan"] ?>">
				</div>
				<div class="form-input">
					<input type="text" name="Dusun" value="<?= $alamat["Dusun"] ?>">
				</div>
				<div class="form-input">
					<input type="text" name="Rw" value="<?= $alamat["Rw"] ?>">
				</div>
				<div class="form-input">
					<input type="text" name="Rt" value="<?= $alamat["Rt"] ?>">
				</div>
				<div class="form-input">
					<button type="submit" name="submit">Update</button>
				</div>
				<div>
					<input type="button" value="Back" onclick="goBack()">
				</div>
			</form>
		</div>
	</section>
	<script>
		function goBack(){
		  window.location.replace("index.php");
		}
	</script>
</body>
</html>