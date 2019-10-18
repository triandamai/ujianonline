<!-- import excel ke mysql -->
<!-- www.malasngoding.com -->

<?php 
// menghubungkan dengan koneksi
include '../+koneksi.php';
// menghubungkan dengan library excel reader
include "excelreader.php";
?>

<?php
// upload file xls
$target = basename($_FILES['filep']['name']) ;
move_uploaded_file($_FILES['filep']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['filep']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filep']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
var_dump($jumlah_baris);
for ($i=2; $i<=$jumlah_baris; $i++){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$nip	  = $data->val($i,1);
	$nama     = $data->val($i, 2);
	$username   = $data->val($i, 3);
	$password  = $data->val($i, 4);
	$mapel = $data->val($i,5);
	$status = $data->val($i, 6);
	echo $nip;
	echo "<br>";
	echo $nama;
	echo "<br>";
	echo $username;
	echo "<br>";
	echo $password;
	echo "<br>";
	echo $status;
	echo "<br>";
	echo $mapel;
	echo "<br>";

	if($nip != "" && $nama != "" && $username != "" && $password != "" && $status != "" && $mapel != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($db,"INSERT into 
		tb_pengajar(
			id_pengajar,
			nip,
			nama_lengkap,
			username,
			password,
			pass,
			status,
			mapel
			) 
		values(
		NULL,
		'$nip',
		'$nama',
		'$username',
		'$password',
		'".md5($password)."',
		'$status',
		'$mapel')");
	//echo "hai";
		$berhasil++;
	}else{
		//echo "kosong<br>";
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filep']['name']);

// alihkan halaman ke index.php
header("location: index.php?page=pengajar");
?>
