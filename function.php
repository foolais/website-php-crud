<?php 
//(website) adalah nama databasenya

//koneksi
$conn = mysqli_connect("localhost", "root", "", "website");
//membuka index.php akan langsung diarahkan ke login
if(!$conn){
	die("Koneksi Gagal".mysqli_connect_error());
}


//REGISTRASI
function registrasi($data) {
	global $conn;
//stripslashes agar user tidak bisa menambah bakcslash ("/") di username
//strtolower agar semua inputan user menjadi kecil
// htmlspecialchars agar apapun yang diinputkan akan masuk dan aman dari sql injection

//berguna untuk mencegah sqlinjection

	$username  = strtolower(stripcslashes($data["username"]));
	$password  = htmlspecialchars($data["password"]);
	$password2 = htmlspecialchars($data["password2"]);

	//cek username sudah ada atau belum
	$cek_user = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

	if( mysqli_fetch_assoc($cek_user) ) { //kalo ada nilai cek user akan 1
		echo "<script>
				alert('username sudah ada')
			  </script>";
		return false;
	}

	//cek konfirmasi password
	if( $password !== $password2){
		echo "<script>
				alert('konfirmasi password tidak sesuai');
			  </script>";
		return false; //supaya masuk else echo mysqli_error($conn) di registrasi.php
	}


	//tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO users VALUES('', '$username','$password')"); //insert data ke tabel (user)

	return mysqli_affected_rows($conn); //gagal minus 1 berhasil 1
}
//koneksi ke query
function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ){
		$rows[] = $row;
	}
	return $rows;
}

function ubah($data){
	global $conn;

	$id = $data["id"];
	$Kecamatan = htmlspecialchars($data["Kecamatan"]);
	$Kelurahan = htmlspecialchars($data["Kelurahan"]);
	$Dusun = htmlspecialchars($data["Dusun"]);
	$Rw = htmlspecialchars($data["Rw"]);
	$Rt = htmlspecialchars($data["Rt"]);

	$query = "UPDATE alamat SET
				Kecamatan = '$Kecamatan',
				Kelurahan = '$Kelurahan',
				Dusun = '$Dusun',
				Rw = '$Rw',
				Rt = '$Rt'
				WHERE id = $id
			 ";

 	mysqli_query($conn, $query);

 	return mysqli_affected_rows($conn);
}

$total_masuk = 0;
$total_keluar = 0;
$total = 0;


?>