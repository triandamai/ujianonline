<?php
		// Jika user telah mengklik tombol Preview
		if(isset($_POST['preview'])){
			if ( 0 < $_FILES['file']['error'] ) {
			   json_encode(array("success"=>false,"data"=>[],"message"=>"kosomg"));
			}
			else {
			$nama_file_baru = 'data_siswa.xlsx';

			// Cek apakah terdapat file data.xlsx pada folder tmp
			// if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
			// 	unlink('tmp/'.$nama_file_baru); // Hapus file tersebut

			$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
			$tmp_file = $_FILES['file']['tmp_name'];

			// Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
			if($ext == "xlsx"){
				// Upload file yang dipilih ke folder tmp
				// dan rename file tersebut menjadi data{ip_address}.xlsx
				// {ip_address} diganti jadi ip address user yang ada di variabel $ip
				// Contoh nama file setelah di rename : data127.0.0.1.xlsx
				move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);

				// Load librari PHPExcel nya
				require_once $_SERVER['DOCUMENT_ROOT'].'/ujianonline/admin/PHPExcel/PHPExcel.php';

				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

			//	echo "<form method='post' action='http://localhost/ujianonline/admin/import_siswa.php'>";

				// Buat sebuah div untuk alert validasi kosong
				// echo "<div class='alert alert-danger' id='kosong'>
				// Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
				// </div>";

			

				$numrow = 1;
				$kosong = 0;
				$data_soal = array();
				//var_dump(json_encode($sheet));
				foreach($sheet as $row){
					 // Lakukan perulangan dari data yang ada di excel
					// Ambil data pada excel sesuai Kolom

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
						// Validasi apakah semua data telah diisi
						$vnis = ( ! empty($nis))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
						// $vnip = ( ! empty($nip))? "" : " style='background: #E07171;'";
						// $vnip = ( ! empty($nip))? "" : " style='background: #E07171;'";
						// $vnip = ( ! empty($nip))? "" : " style='background: #E07171;'";
						// $vnip = ( ! empty($nip))? "" : " style='background: #E07171;'";
						// $vnip = ( ! empty($nip))? "" : " style='background: #E07171;'";
						// $vnip = ( ! empty($nip))? "" : " style='background: #E07171;'";
						// $vnip = ( ! empty($nip))? "" : " style='background: #E07171;'";
						// $vnip = ( ! empty($nip))? "" : " style='background: #E07171;'";
						// $vnip = ( ! empty($nip))? "" : " style='background: #E07171;'";
						// $vnip = ( ! empty($nip))? "" : " style='background: #E07171;'";
						// $vnip = ( ! empty($nip))? "" : " style='background: #E07171;'";

						// //Jika salah satu data ada yang kosong
						// if($nip == ""
						// or $ == ""
						// or $j_a == ""
						// or $j_b == ""
						// or $j_c == ""
						// or $j_d == ""
						// or $j_e == ""
						// or $kunci == ""
						// or $gambar == ""){
						// 	$kosong++; // Tambah 1 variabel $kosong
						// }
						

						
					}
					array_push($data_soal,$row);
					
					$numrow++; // Tambah 1 setiap kali looping

				}
				echo json_encode(array("success"=>true,"data"=>$data_soal));
			}else{
				echo json_encode(array("success"=>false,"data"=>[],"message"=>"tipe file salah"));
			}
		}
			}else{
				echo json_encode(array("success"=> false,"data"=>[],"message"=>"method tidak di acc"));
			}
				?>
