<?php 
if(isset($_POST['preview'])){
	if ( 0 < $_FILES['file']['error'] ) {
       json_encode(array("success"=>false,"data"=>[],"message"=>"kosomg"));
    }
    else {
     //  move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
    
				//$ip = ; // Ambil IP Address dari User
				$nama_file_baru = 'data.xlsx';

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
					$loadexcel = $excelreader->load($_SERVER['DOCUMENT_ROOT'].'/ujianonline/admin/tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
					$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

					// Buat sebuah tag form untuk proses import data ke database
					$numrow = 1;
					$kosong = 0;
					$data_soal = array();
					//var_dump(json_encode($sheet));
					foreach($sheet as $row){
						 // Lakukan perulangan dari data yang ada di excel
						// Ambil data pada excel sesuai Kolom
						$no = $row['A']; // Ambil data NIS
						$soal = $row['B']; // Ambil data nama
						$j_a = $row['C']; 
						$j_b = $row['D']; 
						$j_c = $row['E']; 
						$j_d = $row['F']; 
						$j_e = $row['G']; // Ambil data jenis kelamin
						$kunci = $row['H']; 
						$gambar = $row['I']; // Ambil data telepon
						 // Ambil data alamat

						// Cek jika semua data tidak diisi
						if($no == "" 
							&& $soal == "" 
							&& $j_a == "" 
							&& $j_b == "" 
							&& $j_c == ""
							&& $j_d == ""
							&& $j_e == ""
							&& $kunci == ""
							&& $gambar == "")
							continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

						// Cek $numrow apakah lebih dari 1
						// Artinya karena baris pertama adalah nama-nama kolom
						// Jadi dilewat saja, tidak usah diimport
						if($numrow > 1){
							// Validasi apakah semua data telah diisi
							$no_soal = ( ! empty($no))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$soal_soal = ( ! empty($soal))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
							$jw_a = ( ! empty($j_a))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
							$jw_b = ( ! empty($j_b))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
							$jw_c = ( ! empty($j_c))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
							$jw_d = ( ! empty($j_d))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
							$jw_e = ( ! empty($j_e))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
							$kunci_soal = ( ! empty($kunci))? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
							$img = ( ! empty($gambar))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah

							// Jika salah satu data ada yang kosong
							if($no == ""
							or $soal == ""
							or $j_a == ""
							or $j_b == ""
							or $j_c == ""
							or $j_d == ""
							or $j_e == ""
							or $kunci == ""
							or $gambar == ""){
								$kosong++; // Tambah 1 variabel $kosong
							}
							
						}
						array_push($data_soal,$row);
						
						$numrow++; // Tambah 1 setiap kali looping
						
					}

					echo json_encode(array("success"=>true,"data"=>$data_soal,"message"=>"sukses"));
					
					
			}else{
				echo json_encode(array("success"=>false,"data"=>[],"message"=>"tipe file salah"));
			}
		}
			
		}else{
			echo json_encode(array("success"=> false,"data"=>[],"message"=>"method tidak di acc"));
		}
?>
