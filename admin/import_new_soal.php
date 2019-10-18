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
$target = basename($_FILES['filesoal']['name']) ;
move_uploaded_file($_FILES['filesoal']['tmp_name'], $target);
$id = $_POST['id'];
//var_dump($id);
//die();
// beri permisi agar file xls dapat di baca
chmod($_FILES['filesoal']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filesoal']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
//var_dump($jumlah_baris);
for ($i=2; $i<=$jumlah_baris; $i++){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$no	  		= $data->val($i, 1);
	$soal  		= $data->val($i, 2);
	$pil_a   	= $data->val($i, 3);
	$pil_b  	= $data->val($i, 4);
	$pil_c 		= $data->val($i, 5);
	$pil_d 		= $data->val($i, 6);
	$pil_e		= $data->val($i, 7);
	$kunci		= $data->val($i, 8);
	// echo "<br> no = ";
	// echo $no;
	// echo "<br> soal = ";
	// echo $soal;
	// echo "<br> a = ";
	// echo $pil_a;
	// echo "<br> b = ";
	// echo $pil_b;
	// echo "<br> c = ";
	// echo $pil_c;
	// echo "<br> d = ";
	// echo $pil_d;
	// echo "<br> e = ";
	// echo $pil_e;
	// echo "<br> kunci = ";
	// echo $kunci;
	// echo "<br>";
	
	if($no != "" 
	&& $soal != "" 
	&& $pil_a != "" 
	&& $pil_b != "" 
	&& $pil_c != "" 
	&& $pil_d != ""
	&& $pil_e != "" 
	&& $kunci != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($db,"INSERT into tb_soal_pilgan(
			id_tq,
			pertanyaan,
			pil_a,
			pil_b,
			pil_c,
			pil_d,
			pil_e,
			kunci,
			tgl_buat,
			no_soal
			) 
		values($id,'$soal','$pil_a','$pil_b','$pil_c','$pil_d','$pil_e','$kunci',now(),$no)") or die ($db->error);
	//echo "hai";
		$berhasil++;
	}else{
	//	echo "kosong<br>";
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filesoal']['name']);

// alihkan halaman ke index.php
//header("location: index.php?page=soal");
header("location: index.php?page=quiz&action=daftarsoal&id=".$id);
?>
