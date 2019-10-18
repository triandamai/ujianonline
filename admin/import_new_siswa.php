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
$target = basename($_FILES['files']['name']) ;
move_uploaded_file($_FILES['files']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['files']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['files']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
var_dump($jumlah_baris);
for ($i=2; $i<=$jumlah_baris; $i++){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$nis	  = $data->val($i,1);
	$nama     = $data->val($i, 2);
	$jenis_kelamin = $data->val($i,3);
	$id_kelas= $data->val($i,4);
	$username   = $data->val($i, 5);
	$password  = $data->val($i, 6);
	$status = $data->val($i, 7);

	if($nis != "" && $nama != "" && 
	$jenis_kelamin != "" && $username != "" && $password != "" && 
	$status != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($db,"INSERT into 
		tb_siswa(
			id_siswa,
			nis,
			nama_lengkap,
			jenis_kelamin,
			id_kelas,
			username,
			password,
			status
			) 
		values(
		NULL,
		'$nis',
		'$nama',
		'$jenis_kelamin',
		'$id_kelas',
		'$username',
		'".md5($password)."',
		'$status')");
	
		$berhasil++;
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['files']['name']);

// alihkan halaman ke index.php
header("location:index.php?page=siswa");
?>
