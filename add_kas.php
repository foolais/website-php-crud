<?php 
require 'function.php';
 if( isset($_POST["submit"]) ){
 	// ambil data dari tiap form
 	$tanggal = $_POST["tanggal"];
 	$masuk = $_POST["masuk"];
 	$keterangan = $_POST["keterangan"];

 	$query = "INSERT INTO agenda2
 				VALUES
 				('','$tanggal','$masuk','','$keterangan') 
 				";		
 	mysqli_query($conn, $query);
 	header('location: agenda.php');
 }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ADD KAS</title>
	<link rel="stylesheet" type="text/css" href="css/style_template.css">
	<link rel="stylesheet" type="text/css" href="css/style_kas.css">
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

	<div class="edit">
		<h1 class="edit-header">TAMBAH KAS</h1>
		<form class="edit-container" action="" method="post">
			<input type="hidden" name="id_agenda">
			<div class="form-input">
				<input type="hidden" name="id_kas">
				<label for="masuk">Tambah Kas</label>
				<input type="int" name="masuk" required>
			</div>
			<div class="form-input">
				<label for="tanggal">Tanggal</label>
				<input type="date" name="tanggal" required>
			</div>
			<div class="form-input">
				<label for="keterangan">Keterangan</label>
				<input type="text" name="keterangan" required>
			</div>
			<div class="form-input">
				<input type="submit" value = "Update" name="submit" />
			</div>
			<div>
				<button type="button" onclick="goBack()">Back</button>
			</div>
		</form>
	</div>

	<script>
		function goBack(){
		  window.location.replace("agenda.php");
		}
	</script>
</body>
</html>