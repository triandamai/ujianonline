	
	<?php
			// Jika user telah mengklik tombol Preview
			if(isset($_POST['preview'])){
				if ( 0 < $_FILES['file']['error'] ) {
				   json_encode(array("success"=>false,"data"=>[],"message"=>"kosomg"));
				}
				else {
				$nama_file_baru = 'data_pengajar.xlsx';

				// Cek apakah terdapat file data.xlsx pada folder tmp
				if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
					unlink('tmp/'.$nama_file_baru); // Hapus file tersebut

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

			

					$numrow = 1;
					$kosong = 0;
					//var_dump(json_encode($sheet));
					$data_soal = array();
					foreach($sheet as $row){
						 // Lakukan perulangan dari data yang ada di excel
						// Ambil data pada excel sesuai Kolom

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
						// Cek jika semua data tidak diisi
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
							continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

						// Cek $numrow apakah lebih dari 1
						// Artinya karena baris pertama adalah nama-nama kolom
						// Jadi dilewat saja, tidak usah diimport
						if($numrow > 1){
							// Validasi apakah semua data telah diisi
							$vnip = ( ! empty($nip))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
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
	
							
							
						}
						array_push($data_soal,$row);
						$numrow++; // Tambah 1 setiap kali looping
					}
					

					// Cek apakah variabel kosong lebih dari 1
					// Jika lebih dari 1, berarti ada data yang masih kosong
					// if($kosong > 1){
			
					// }else{ // Jika semua data sudah diisi
						
					// }

					echo json_encode(array("success"=>true,"data"=>$data_soal));
				}else{
					echo json_encode(array("success"=>false,"data"=>[],"message"=>"tipe file salah"));
				}
			}
		}else{
			echo json_encode(array("success"=> false,"data"=>[],"message"=>"method tidak di acc"));
		}
	?>
