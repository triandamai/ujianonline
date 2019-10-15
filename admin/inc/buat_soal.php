
<div class="row">
	<div class="panel panel-default">
	    <div class="panel-heading">
	        <a onclick="self.history.back();" class="btn btn-danger btn-sm">Kembali</a> &nbsp; 
	        Buat Jenis Soal : <a href="?page=quiz&action=buatsoal&hal=soalpilgan&id=<?php echo $id; ?>" class="btn btn-primary btn-sm">Pilihan Ganda</a> 
	        <a href="?page=quiz&action=buatsoal&hal=soalessay&id=<?php echo $id; ?>" class="btn btn-primary btn-sm">Essay</a>  
	    </div>
		<?php
	    if(@$_GET['hal'] == "soalpilgan" || @$_GET['hal'] == "soalessay") { ?>
		    <div class="panel-heading">
		        Anda juga dapat memilih soal dibawah untuk kelas lain yang sesuai dengan topik kuis ini.
		        <form method="post" enctype="multipart/form-data">Pilih kelas lain <i><small>(centang)</small></i> : 
		        <?php
		        $a = array();
		        $sql_tq_ini = mysqli_query($db, "SELECT * FROM tb_topik_quiz WHERE id_tq = '$id'") or die ($db->error);
		        $data_tq_ini = mysqli_fetch_array($sql_tq_ini);
		        $kelas_ini = $data_tq_ini['id_kelas'];
		       	$judul = $data_tq_ini['judul'];
		       	$id_mapel = $data_tq_ini['id_mapel'];
		       	$sql_kelas_lain = mysqli_query($db, "SELECT * FROM tb_topik_quiz WHERE judul = '$judul' AND id_mapel = '$id_mapel' AND id_kelas != '$kelas_ini'") or die ($db->error);
		        while($data_kelas_lain = mysqli_fetch_array($sql_kelas_lain)){
		        	$id_kls_lain = $data_kelas_lain['id_kelas'];
		        	$sql_nm_kls = mysqli_query($db, "SELECT * FROM tb_kelas WHERE id_kelas = '$id_kls_lain'") or die ($db->error);
		        	$data_nm_kls = mysqli_fetch_array($sql_nm_kls);
		        	?>
	                <label class="checkbox-inline">
	                    <input type="checkbox" name="kls[]" value="<?php echo $data_nm_kls['nama_kelas']; ?>"><?php echo $data_nm_kls['nama_kelas']; ?>
	                </label>
					<?php
					array_push($a, $data_kelas_lain['id_tq']);
				}
				$cek = mysqli_num_rows($sql_kelas_lain);
				// print_r($a);
		        ?>
		    </div>
		<?php } ?>
	    <div class="panel-body" style="padding-bottom:0;">
			<div class="alert alert-warning">
		        Perhatian, pembuatan soal wajib ada pilihan gandanya, jangan essay saja. Kalo soal pilihan ganda saja tanpa essay atau ada keduanya tidak masalah. 
	        </div>
	    </div>
	</div>
</div>

<?php
if(@$_GET['hal'] == "soalpilgan") { ?>
		<div class="row">
		<div style="padding: 0 15px;" class="panel panel-default">
			<!-- Buat sebuah tombol Cancel untuk kemabli ke halaman awal / view data -->
			<a href="index.php" class="btn btn-danger pull-right">
				<span class="glyphicon glyphicon-remove"></span> Cancel
			</a>

			<h3>Form Import Data</h3>
			<hr>

	
				<a href="http://localhost/ujianonline/admin/format/format_data_soal.xlsx" class="btn btn-default">
					<span class="glyphicon glyphicon-download"></span>
					Download Format
				</a><br><br>

				<input id="file" type="file" name="file" class="pull-left" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">

				<button id="preview" type="button" name="preview" class="btn btn-success btn-sm">
					<span class="glyphicon glyphicon-eye-open"></span> Preview</button>

					<div class="dropdown-divider"></div>
					
			<div id="form">
			</div>
			
			<script type="text/javascript">
			
				$('#preview').on('click',()=>{
					var file_data = $('#file').prop('files')[0];
					var form_data = new FormData();
					form_data.append('file',file_data);
					form_data.append('preview',"ya");
					var html;
					
					var wadah = document.getElementById("#form");
        
					$.ajax({
        					url: 'http://localhost/ujianonline/admin/preview_soal.php', // point to server-side PHP script 
        					dataType: 'text',  // what to expect back from the PHP script, if anything
        					cache: false,
        					contentType: false,
        					processData: false,
        					data: form_data,                         
        					type: 'post',
        			success: function(res){
            			//alert(php_script_response);
						console.log(res); // display response from the PHP script, if any
						var data_json = JSON.parse(res);
						if(JSON.parse(res).success == true){
							var i =1;
							for(i = 1; i < JSON.parse(res).data.length ;i++){
								//console.log(i);
								if(data_json.data[i].I == "ya"){
									html +='<div class="card">'+
								'<div class="card-header"><h3>Soal No.'+data_json.data[i].A+'</h3></div>'+
								'<div class="card-body container">'+
									'<br><p>Masukkan Gambar soal</p>'+									
									'<input id="file'+i+'" type="file" name="file'+i+'" onchange="functionSaya(event,'+i+')" accept="image/*">'+
									'<p class="card-text">'+data_json.data[i].B+'</p>'+
									'<h5 class="card-title"> Kunci Jawaban'+data_json.data[i].H+'</h5>'+
									'<div class="row">'+
										'<div class="col-md-6">'+
											'<p>A.'+data_json.data[i].C+'</p>'+
											'<p>A.'+data_json.data[i].D+'</p>'+
											'<p>A.'+data_json.data[i].E+'</p>'+
										'</div>'+
										'<div class="col-md-6">'+
											'<p>A.'+data_json.data[i].F+'</p>'+
											'<p>A.'+data_json.data[i].G+'</p>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>';

								}else{
								html +='<div class="card">'+
								'<div class="card-header"><h3>Soal No.'+data_json.data[i].A+'</h3></div>'+
								'<div class="card-body container">'+
									'<p class="card-text">'+data_json.data[i].B+'</p>'+
									'<h5 class="card-title"> Kunci Jawaban'+data_json.data[i].H+'</h5>'+
									'<div class="row">'+
										'<div class="col-md-6">'+
											'<p>A.'+data_json.data[i].C+'</p>'+
											'<p>A.'+data_json.data[i].D+'</p>'+
											'<p>A.'+data_json.data[i].E+'</p>'+
										'</div>'+
										'<div class="col-md-6">'+
											'<p>A.'+data_json.data[i].F+'</p>'+
											'<p>A.'+data_json.data[i].G+'</p>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>';
								}
								
							}
							html += '<form method="post" action="http://localhost/ujianonline/admin/import.php"><input type="hidden" name="id_tq" value="<?php echo $_GET['id']?>"><input type="hidden" name="import" value="ya"><button id="preview" type="submit" name="preview" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span>Simpan</button></form>';
							$('#form').append(html);
					
						}
       				 }
     				});
				});
				function functionSaya(evt,i){
					
									var f = evt.target.files[0]; // FileList object
									var reader = new FileReader();
									//document.getElementById('file'+i).style.display == "none";
									// Closure to capture the file information.
									reader.onload = (function(theFile) {
	  								return function(e) {
										var binaryData = e.target.result;
										//Converting Binary Data to base 64
										var base64String = window.btoa(binaryData);
										//showing file converted to base64
										var data = {
											"img" : base64String,
											"namafile" : "<?php echo $_GET['id']?>"+i
										}
										
										$.ajax({
		url: "http://localhost/ujianonline/admin/save_image.php",
		//mengirimkan username dan password ke script login.php
		data: data,
		//Method pengiriman
		type: "POST",

		//Respon jika data berhasil dikirim
		success: response => {
			var data = JSON.parse(response);
			if (data.success) {
				console.log(data);
				
			} else {
				console.log(data);
			}
		}
	});
								
									//  document.getElementById('base64<?php echo $no?>').value = base64String;
									  };
									  })(f);
									// Read in the image file as a data URL.
									reader.readAsBinaryString(f);
  								}
				
			</script>
			<hr>

			<!-- Buat Preview Data -->
			<?php
			// Jika user telah mengklik tombol Preview
			if(isset($_POST['preview'])){
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
					$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
					$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

					// Buat sebuah tag form untuk proses import data ke database
					echo "<form method='post' action='http://localhost/ujianonline/admin/import.php'>";

					// Buat sebuah div untuk alert validasi kosong
					echo "<div class='alert alert-danger' id='kosong'>
					Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
					</div>";
					echo "<input type='hidden' value='".$_GET["id"]."' name='id_tq'>";
				
					$numrow = 1;
					$kosong = 0;
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
							}?>
							<div class="card">
								<div class="card-body">
								<h5 class="card-title" style="font-weight:bold;">Soal No. <?php echo $no;?></h5><?php
								if($gambar == "ya"){
									?>
									
										<input type="file" id="files<?php echo $no?>" name="files" />
										<br/>
																		<?php
								}?>
							  <p class="card-text"><?php echo $soal;?></p>
							
							<h6 class="card-subtitle mb-2 text-muted">Pilihan : / Kunci Jawaban : <?php echo $kunci;?></h6>
							<div class="row">
									   <div class="col">
										   <div class="col-md-12">
											   <div class="col-md-6">
											   A. <?php echo $j_a;?><br>B. <?php echo $j_b;?><br>C.  <?php echo $j_c;?>
											   </div>
											   <div class="col-md-6">
											   D.  <?php echo $j_d;?><br>E.  <?php echo $j_e;?>
											   </div>
										   </div>
									   </div>
									</div>
							</div>
							
							</div>
							<script type="text/javascript">
								// Check for the File API support.
							
								if (window.File && window.FileReader && window.FileList && window.Blob) {
									var el = document.getElementById('files<?php echo $no?>');
if(el){

									el.addEventListener('change', handleFileSelect, false);}
  								} else {
									alert('The File APIs are not fully supported in this browser.');
  								}
  
  								function handleFileSelect(evt) {
									var f = evt.target.files[0]; // FileList object
									var reader = new FileReader();
									document.getElementById('files<?php echo $no?>').style.display == "none";
									// Closure to capture the file information.
									reader.onload = (function(theFile) {
	  								return function(e) {
										var binaryData = e.target.result;
										//Converting Binary Data to base 64
										var base64String = window.btoa(binaryData);
										//showing file converted to base64
										var data = {
											"img" : base64String,
											"namafile" : "<?php echo $_GET['id'].$no?>"
										}
										
										$.ajax({
		url: "http://localhost/ujianonline/admin/save_image.php",
		//mengirimkan username dan password ke script login.php
		data: data,
		//Method pengiriman
		type: "POST",

		//Respon jika data berhasil dikirim
		success: response => {
			var data = JSON.parse(response);
			if (data.success) {
				console.log(data);
				
			} else {
				console.log(data);
			}
		}
	});
								
									//  document.getElementById('base64<?php echo $no?>').value = base64String;
									  };
									  })(f);
									// Read in the image file as a data URL.
									reader.readAsBinaryString(f);
  								}
							</script>
							<?php
							
						
							
							
							
						}

						$numrow++; // Tambah 1 setiap kali looping
					}

					
				
					// Cek apakah variabel kosong lebih dari 1
					// Jika lebih dari 1, berarti ada data yang masih kosong
					if($kosong > 1){
					?>
						<script>
						$(document).ready(function(){
							// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
							$("#jumlah_kosong").html('<?php echo $kosong; ?>');

							$("#kosong").show(); // Munculkan alert validasi kosong
						});
						</script>
					<?php
					}else{ // Jika semua data sudah diisi
						echo "<hr>";

						// Buat sebuah tombol untuk mengimport data ke database
						echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";
					}

					echo "</form>";
				}else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
					// Munculkan pesan validasi
					echo "<div class='alert alert-danger'>
					Hanya File Excel 2007 (.xlsx) yang diperbolehkan
					</div>";
				}
			}
			?>
		</div>
	</div>
	

<?php
} else if(@$_GET['hal'] == "soalessay") { ?>
	<div class="row">
		<div class="panel panel-default">
		    <div class="panel-heading">Buat Soal Essay</div>
		    <div class="panel-body">
		    	<?php
		    	$sql_jumlah_essay = mysqli_query($db, "SELECT * FROM tb_soal_essay WHERE id_tq = '$id'") or die ($db->error); ?>
					<div class="col-md-2">
						<label>Pertanyaan No. [ <?php echo mysqli_num_rows($sql_jumlah_essay) + 1; ?> ]</label>
					</div>
					<div class="col-md-10">
						<div class="form-group">
							<textarea name="pertanyaan" class="form-control" rows="3" required></textarea>
						</div>
					</div>

					<div class="col-md-2">
						<label>Gambar <sup>(Optional)</sup></label>
					</div>
					<div class="col-md-10">
						<div class="form-group">
							<input type="file" name="gambar" class="form-control" />
						</div>
						<div class="form-group">
	                        <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
	                        <input type="reset" value="Reset" class="btn btn-danger" />
	                    </div>
					</div>
	            <?php
	            if(@$_POST['simpan']) {
	            	$pertanyaan = @mysqli_real_escape_string($db, $_POST['pertanyaan']);

	            	$sumber = @$_FILES['gambar']['tmp_name'];
                    $target = 'img/gambar_soal_essay/';
                    $nama_gambar = @$_FILES['gambar']['name'];

                    $c = array();
	            	for($p = 0; $p < $cek; $p++) {
		            	$kls2 = @mysqli_real_escape_string($db, $_POST['kls'][$p]);
		            	array_push($c, $kls2);
		            	if (in_array($kls2, $c)) {
		            		if($kls2 != "") {
			            		$sql_tq_kls2 = mysqli_query($db, "SELECT * FROM tb_topik_quiz JOIN tb_kelas WHERE id_tq = '$a[$p]' AND nama_kelas = '$kls2'") or die ($db->error);
			            		$data_tq_kls2 = mysqli_fetch_array($sql_tq_kls2);
			            		$id_tq_kls2 = $data_tq_kls2['id_tq'];

			            		move_uploaded_file($sumber, $target.$nama_gambar);
			                    mysqli_query($db, "INSERT INTO tb_soal_essay VALUES('', '$id_tq_kls2', '$pertanyaan', '$nama_gambar', now())") or die ($db->error);
			            	}
						}
		        	}

                    move_uploaded_file($sumber, $target.$nama_gambar);
                    mysqli_query($db, "INSERT INTO tb_soal_essay VALUES('', '$id', '$pertanyaan', '$nama_gambar', now())") or die ($db->error);          
                    echo '<script>window.location="?page=quiz&action=daftarsoal&hal=essay&id='.$id.'"</script>';
	            }
	            ?>
		    </div>
		</div>
	</div>
	<?php
} ?>
</form>
