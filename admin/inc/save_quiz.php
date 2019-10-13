<?php
include "../../+koneksi.php";

$pembuat =  $_POST['pembuat'];
$judul =  $_POST['judul'];
$kelas =  $_POST['kelas'];
$mapel =  $_POST['mapel'];
$tgl_buat =  $_POST['tgl_buat'];
$waktu_soal =  $_POST['waktu_soal'] * 60;
$info =  $_POST['info'];
$status = $_POST['status'];

// echo $pembuat."+".$judul."+".$kelas."+".$mapel."+".$tgl_buat."+".$waktu_soal."+".$info."+".$status;
mysqli_query($db, "INSERT INTO tb_topik_quiz(

judul,
id_kelas,
id_mapel,
tgl_buat,
pembuat,
waktu_soal,
info,
status,
tgl_mulai,
tgl_akhir
) VALUES(
	'$judul', 
	'$kelas', 
	'$mapel', 
	'$tgl_buat', 
	'$pembuat', 
	'$waktu_soal', 
	'$info', 
	'$status',
	'$tgl_buat',
	'$tgl_buat')") or die ($db->error);
echo "<script>window.location='?page=quiz';</script>";
?>
