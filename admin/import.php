<?php
	
	include $_SERVER['DOCUMENT_ROOT'].'/ujianonline/'."+koneksi.php";
	//include"PHPExcel.php";
		
	// Load file koneksi.php


	/*
	-- Source Code from My Notes Code (www.mynotescode.com)
	--
	-- Follow Us on Social Media
	-- Facebook : http://facebook.com/mynotescode/
	-- Twitter  : http://twitter.com/mynotescode
	-- Google+  : http://plus.google.com/118319575543333993544
	--
	-- Terimakasih telah mengunjungi blog kami.
	-- Jangan lupa untuk Like dan Share catatan-catatan yang ada di blog kami.
	*/

	
	if(isset($_POST['import']) || isset($_POST['id_tq'])){ // Jika user mengklik tombol Import
		$nama_file_baru = 'data.xlsx';
		$id_tq = $_POST['id_tq'];
		// Load librari PHPExcel nya
		require_once $_SERVER['DOCUMENT_ROOT'].'/bakti/ujianonline/admin/'.'PHPExcel/PHPExcel.php';
	
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	
		$numrow = 1;
		foreach($sheet as $row){
			$no = $row['A']; 
			$soal = $row['B']; // Ambil data nama
			$j_a = $row['C']; 
			$j_b = $row['D']; 
			$j_c = $row['E']; 
			$j_d = $row['F']; 
			$j_e = $row['G']; // Ambil data jenis kelamin
			$kunci = $row['H']; 
			$gambar = $row['I']; // Ambil data telepon

			if($no == "" 
			&& $soal == "" 
			&& $j_a == "" 
			&& $j_b == "" 
			&& $j_c == ""
			&& $j_d == ""
			&& $j_e == ""
			&& $kunci == ""
			&& $gambar == "")
						// Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

				continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
	
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Buat query Insert
				//$query = "INSERT INTO siswa VALUES('".$nis."','".$nama."','".$jenis_kelamin."','".$telp."','".$alamat."')";
				$gbr = "";
				if($gambar == "ya"){
					$gbr = $id_tq.$no.".png";
				}else{
					$gbr = "tidak";
				}
				$query = "INSERT INTO tb_soal_pilgan (id_tq, pertanyaan, gambar, pil_a, pil_b, pil_c, pil_d, pil_e, kunci,no_soal)
				VALUES ('$id_tq',
				'".$soal."',
				'".$gbr."',
				'".$j_a."',
				'".$j_b."',
				'".$j_c."',
				'".$j_d."',
				'".$j_e."',
				'".$kunci."',
				'".$no."'
				)";
	
				// Eksekusi $query
				mysqli_query($db, $query);
			}
	
			$numrow++; // Tambah 1 setiap kali looping
		}
	}
	
	header('location: http://localhost/ujianonline/admin/index.php?page=quiz'); // Redirect ke halaman awal

	


?>
