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
		$nama_file_baru = 'data_pengajar.xlsx';
		
		// Load librari PHPExcel nya
		require_once $_SERVER['DOCUMENT_ROOT'].'/ujianonline/admin/'.'PHPExcel/PHPExcel.php';
	
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	
		$numrow = 1;
		foreach($sheet as $row){
			$nip = $row['B'];
			$nama_lengkap = $row['C'];
			$tempat_lahir = $row['D'];
			$tgl_lahir = $row['E'];
			$jenis_kelamin = $row['F'];
			$agama = $row['G'];
			$no_telp = $row['H'];
			$email = $row['I'];
			$alamat = $row['J'];
			$jabatan = $row['K'];
			$foto = $row['L'];
			$web = $row['M'];
			$username = $row['N'];
			$password = $row['O'];
			// $pass = $row['P'];
			$status = $row['P'];

			if($nip == "" 
							&& $nama_lengkap == "" 
							&& $tempat_lahir == "" 
							&& $tgl_lahir == "" 
							&& $jenis_kelamin == ""
							&& $agama == ""
							&& $no_telp == ""
							&& $email == ""
							&& $alamat == ""
							&& $jabatan == ""
							&& $foto == ""
							&& $web == ""
							&& $username == ""
							&& $password == ""
							&& $status == "")
							continue;// Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
	
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Buat query Insert
				//$query = "INSERT INTO siswa VALUES('".$nis."','".$nama."','".$jenis_kelamin."','".$telp."','".$alamat."')";
				// $gbr = "";
				// if($gambar == "ya"){
				// 	$gbr = $id_tq.$no.".png";
				// }else{
				// 	$gbr = "tidak";
				// }
				$query = "INSERT INTO 
				tb_pengajar 
				(nip, 
				nama_lengkap, 
				tempat_lahir, 
				tgl_lahir, 
				jenis_kelamin, 
				agama, 
				no_telp, 
				email, 
				alamat,
				jabatan,
				foto,
				web,
				username,
				password,
				pass,
				status
				)
				VALUES (
				'".$nip."',
				'".$nama_lengkap."',
				'".$tempat_lahir."',
				'".$tgl_lahir."',
				'".$jenis_kelamin."',
				'".$agama."',
				'".$no_telp."',
				'".$email."',
				'".$alamat."',
				'".$jabatan."',
				'".$foto."',
				'".$web."',
				'".$username."',
				'".md5($password)."',
				'".$password."',
				'".$status."'
				)";
	
				// Eksekusi $query
				mysqli_query($db, $query);
			}
	
			$numrow++; // Tambah 1 setiap kali looping
		}
	}
	
	header('location: http://localhost/ujianonline/admin/?page=pengajar'); // Redirect ke halaman awal

	


?>
