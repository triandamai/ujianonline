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

	
	if(isset($_POST['import']) ){ // Jika user mengklik tombol Import
		$nama_file_baru = 'data_siswa.xlsx';
		//$id_tq = $_POST['id_tq'];
		// Load librari PHPExcel nya
		require_once $_SERVER['DOCUMENT_ROOT'].'/ujianonline/admin/'.'PHPExcel/PHPExcel.php';
	
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	
		$numrow = 1;
		foreach($sheet as $row){
			$nis = $row['B'];
					$nama_lengkap = $row['C'];
					$tempat_lahir = $row['D'];
					$tgl_lahir = $row['E'];
					$jenis_kelamin = $row['F'];
					$agama = $row['G'];
					$nama_ayah = $row['H'];
					$nama_ibu = $row['I'];
					$no_telp = $row['J'];
					$email = $row['K'];
					$alamat = $row['L'];
					$id_kelas = $row['M'];
					$thn_masuk = $row['N'];
					$username = $row['O'];
					$password = $row['P'];
					// $pass = $row['P'];
					$status = $row['Q'];
					// Cek jika semua data tidak diisi
					if($nis == "" 
						&& $nama_lengkap == "" 
						&& $tempat_lahir == "" 
						&& $tgl_lahir == "" 
						&& $jenis_kelamin == ""
						&& $agama == ""
						&& $nama_ayah == ""
						&& $nama_ibu == ""
						&& $no_telp == ""
						&& $email == ""
						&& $alamat == ""
						&& $id_kelas == ""
						&& $thn_masuk == ""
						&& $username == ""
						&& $password == ""
						&& $status == "")
						continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Buat query Insert
				//$query = "INSERT INTO siswa VALUES('".$nis."','".$nama."','".$jenis_kelamin."','".$telp."','".$alamat."')";

				$query = "INSERT INTO tb_siswa (
					nis, 
					nama_lengkap, 
					tempat_lahir,
					tgl_lahir, 
					jenis_kelamin, 
					agama, 
					nama_ayah, 
					nama_ibu, 
					no_telp,
					email,
					alamat,
					id_kelas,
					thn_masuk,
					foto,
					username,
					password,
					pass,
					status)
				VALUES (
				'$nis',
				'".$nama_lengkap."',
				'".$tempat_lahir."',
				'".$tgl_lahir."',
				'".$jenis_kelamin."',
				'".$agama."',
				'".$nama_ayah."',
				'".$nama_ibu."',
				'".$no_telp."',
				'".$email."',
				'".$alamat."',
				'".$id_kelas."',
				'".$thn_masuk."',
				'tidak',
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
	
	header('location: http://localhost/ujianonline/admin/index.php?page=siswa'); // Redirect ke halaman awal

	


?>
