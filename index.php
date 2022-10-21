<?php

 ob_start();
 session_start();
 //jika tidak ada session/masuk dari id_user akan dialihkan ke login.php
 if(!isset($_SESSION['id_user'])) header("location: login.php"); 
 require "function.php"; //hubungin ke function.php
 //ambil dari database alamat
 $alamat = query("SELECT * FROM alamat");

//ambil database agenda2
 $sql = $conn->query("SELECT * FROM agenda2");
//ambil data dari agenda2
 while ($row=$sql->fetch_assoc()){
 	$total_masuk = $total_masuk+$row['masuk'];
 	$total_keluar = $total_keluar+$row['keluar'];
 	$total = $total_masuk -$total_keluar;
 }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FORM</title>
	<link rel="stylesheet" type="text/css" href="css/style_template.css">
	<link rel="stylesheet" href="css/style_index.css">
</head>
<body>
	<nav class="navbar">
		<div class="menu">
			<a href="index.php">Home</a>
			<a href="agenda.php" >Agenda</a>
			<a href="about.php">About</a>
		</div>
		<div class="logout">
			<a href="logout.php">Logout</a>
		</div>
	</nav>

	<section class="home">
		<div class="inner-width">
			<div class=location>
				<?php foreach( $alamat as $row ) : ?>
					<a><?= $row["Dusun"]; ?></a><a> , </a>
					<a><?= $row["Kelurahan"]; ?></a><a> , </a>
					<a><?= $row["Kecamatan"]; ?></a><a> , RT </a>
					<a><?= $row["Rt"]; ?></a><a> , RW </a>
					<a><?= $row["Rw"]; ?></a>
				<?php endforeach; ?>
			</div>
			<div class="kas">
				<p><?= "Rp " .number_format($total).",-" ?></p>
			</div>
			<div class="button">
				<a href="agenda.php" >Top UP</a>
				<a href="edit.php?id=<?= $row["id"]; ?>" >Edit</a>
			</div>
		</div>
	</section>
</body>
</html>
<?php

mysqli_close($conn);
ob_end_flush();
?>