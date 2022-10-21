<?php 
require 'function.php';
//ambil dari agenda2
$agenda = query("SELECT * FROM agenda2");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HEader</title>
	<link rel="stylesheet" type="text/css" href="css/style_template.css">
	<link rel="stylesheet" type="text/css" href="css/style_agenda.css">
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
		<div class="inner-width">
			<div class="header">
				<h1> info pengeluaran dan pendapatan </h1>
			</div>
			<div class="content">
			    <table border="1" cellpadding="15" cellspacing="0">   
			    <tr>
			        <th>No.</th>
			        <th>Tanggal</th>
			        <th>Pemasukan</th>
			        <th>Pengeluaran</th>
			        <th>keterangan</th>
			    </tr>
			    <?php 
				    $i = 1;
				    foreach ($agenda as $row) :
				 ?>
			    <tr>
			        <td><?= $i; ?></td>

			        <td><?= date('d F Y',strtotime($row['tanggal'])) ?></td>
			        <td><?= "Rp ".number_format($row['masuk']).",-" ?></td>
			        <td><?= "Rp ".number_format($row['keluar']).",-" ?></td>
			        <td><?= $row['keterangan'] ?></td>
			    </tr>
			    <?php 
				    $i++;
				    $total_masuk = $total_masuk+$row['masuk'];
					$total_keluar = $total_keluar+$row['keluar'];
					$total = $total_masuk - $total_keluar;
					endforeach; 
				?>
				<tr>
					<th colspan="2">Total</th>
					<td><?= "Rp " .number_format($total_masuk).",-" ?></td>
					<td><?= "Rp " .number_format($total_keluar).",-" ?></td>
					<td><?= "Rp " .number_format($total).",-" ?></td>
				</tr>
		
			    </table>
			</div>
			<div class="option">
				<a href="add_kas.php">Tambah Kas | </a>
				<a href="take_kas.php">Ambil Kas</a>
			</div>

	</section>
</body>
</html>