<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">Management File Materi</h1>
    </div>
</div>

<?php
if(@$_GET['action'] == '') { ?>
	<div class="row">
		<div class="col-md-12">
	        <div class="panel panel-default">
	            <div class="panel-heading"><a href="?page=materi&action=tambah" class="btn btn-primary btn-xs">Tambah Data</a> &nbsp; <a href="./laporan/cetak.php?data=materi" target="_blank" class="btn btn-default btn-xs">Cetak</a></div>
	            <div class="panel-body">
	                <div class="table-responsive">
	                    <table class="table table-striped table-bordered table-hover" id="datamateri">
	                        <thead>
	                            <tr>
	                                <th>#</th>
	                                <th>Nama Siswa</th>
	                                <th>Kelas</th>
	                                <th>Mapel</th>
	                                <th>Tanggal Posting</th>
									<th>Tidak dikejakan</th>
	                                <th>Benar</th>
	                                <th>Salah</th>
									<th>Persentasi</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        <?php
	                        $no = 1;
	                        if(@$_SESSION[admin]) {
		                        $sql_materi = mysqli_query($db, "SELECT * FROM tb_file_materi JOIN tb_kelas ON tb_file_materi.id_kelas = tb_kelas.id_kelas JOIN tb_mapel ON tb_file_materi.id_mapel = tb_mapel.id") or die($db->error);
								
								$sql_nilai = mysqli_query($db, "SELECT * FROM 
								tb_nilai_pilgan 
								INNER JOIN  
								tb_siswa 
								ON
								tb_siswa.id_siswa = tb_nilai_pilgan.id_siswa
								INNER JOIN
								tb_topik_quiz 
								ON
								tb_topik_quiz.id_tq = tb_nilai_pilgan.id_tq"
								) or die($db->error);
								//echo json_encode(mysqli_fetch_array($sql_nilai));
								// var_dump($sql_materi);
								// die();
								$query = mysqli_query($db,"SELECT * FROM tb_nilai_pilgan") or die($db->error);
								if(mysqli_num_rows($query) > 0) {
									while($data_nilai = mysqli_fetch_array($query)) {
										?>
										<tr>
										<td>1</td>
										<?php 
									$q_siswa = mysqli_query($db,"SELECT * FROM tb_siswa WHERE id_siswa=".$data_nilai['id_siswa']) or die($db->error);
										if(mysqli_num_rows($q_siswa)>0){
											while($data_siswa = mysqli_fetch_array($q_siswa)){
												?>
												<td><?php echo $data_siswa['nama_lengkap']?></td>
												<?php
												$q_kelas = mysqli_query($db,"SELECT * FROM tb_kelas WHERE id_kelas=".$data_siswa['id_kelas']) or die($db->error);
												if(mysqli_num_rows($q_kelas)>0){
													while($data_kelas = mysqli_fetch_array($q_kelas)){
														?>
														<td><?php echo $data_kelas['nama_kelas']?></td>
														<?php
													}
												}
											}
										}
									$q_quiz = mysqli_query($db,"SELECT * FROM tb_topik_quiz WHERE id_tq=".$data_nilai['id_tq']) or die($db->error);
										if(mysqli_num_rows($q_quiz)>0){
											while($data_quiz = mysqli_fetch_array($q_quiz)){
												?>
												<td><?php echo $data_quiz['judul']?></td>
												<td><?php echo $data_quiz['tgl_buat']?></td>
												<?php
											}
										}
									?>
									<td><?php echo $data_nilai['benar']?></td>
									<td><?php echo $data_nilai['salah']?></td>
									<td><?php echo $data_nilai['tidak_dikerjakan']?></td>
									<td><?php echo $data_nilai['presentase']?></td>
									</tr>
									<?php
									}
								} else {
									echo '<tr><td colspan="9" align="center">Data tidak ditemukan</td></tr>';
								}
							} else if(@$_SESSION[pengajar]) {
	                        	// $sql_materi = mysqli_query($db, "SELECT * FROM 
								// tb_file_materi 
								// JOIN 
								// tb_kelas 
								// ON 
								// tb_file_materi.id_kelas = tb_kelas.id_kelas 
								// JOIN tb_mapel 
								// ON tb_file_materi.id_mapel = tb_mapel.id 
								// WHERE pembuat = '$_SESSION[pengajar]'") or die($db->error);
								$pengajar = $_SESSION['pengajar'];
								// $sql_nilai = mysqli_query($db, "SELECT * FROM 
								// tb_nilai_pilgan 
								// INNER JOIN  
								// tb_siswa 
								// WHERE
								// tb_nilai_pilgan.id_siswa = tb_siswa.id_siswa 
								// INNER JOIN
								// tb_topik_quiz 
								// WHERE
								// tb_nilai_pilgan.id_tq = tb_topik_quiz.id_tq 
								
								// WHERE tb_topik_quiz.pembuat = 95") or die($db->error);
								
								// json_encode($sql_materi);
							//	echo json_encode(mysqli_fetch_array($sql_nilai));
							$query = mysqli_query($db,"SELECT * FROM tb_topik_quiz WHERE pembuat=$pengajar") or die($db->error);
							if(mysqli_num_rows($query) > 0) {
	                        	while($data_quiz = mysqli_fetch_array($query)) {
									?>
									
									<?php
									$sql_nilai = mysqli_query($db,"SELECT * FROM tb_nilai_pilgan WHERE id_tq=".$data_quiz['id_tq']) or die($db->error);
									if(mysqli_num_rows($sql_nilai )>0){
										while($data_nilai = mysqli_fetch_array($sql_nilai)){
											?>
											<tr>
											<td>1</td>
											<?php
												$q_siswa = mysqli_query($db,"SELECT * FROM tb_siswa WHERE id_siswa=".$data_nilai['id_siswa']) or die($db->error);
												if(mysqli_num_rows($q_siswa)>0){
													while($data_siswa = mysqli_fetch_array($q_siswa)){
														?>
														<td><?php echo $data_siswa['nama_lengkap']?></td>
														<?php
														$q_kelas = mysqli_query($db,"SELECT * FROM tb_kelas WHERE id_kelas=".$data_siswa['id_kelas']) or die($db->error);
														if(mysqli_num_rows($q_kelas)>0){
															while($data_kelas = mysqli_fetch_array($q_kelas)){
																?>
																<td><?php echo $data_kelas['nama_kelas']?></td>
																<?php
															}
														}
													}
												}
											?>
											<td><?php echo $data_quiz['judul']?></td>
											<td><?php echo $data_quiz['tgl_buat']?></td>
											<td><?php echo $data_nilai['benar']?></td>
											<td><?php echo $data_nilai['salah']?></td>
											<td><?php echo $data_nilai['tidak_dikerjakan']?></td>
											<td><?php echo $data_nilai['presentase']?></td>
											</tr>
											<?php
										}
									}
									?>
		
								<?php
	                        	}
	                        } else {
	                        	echo '<tr><td colspan="9" align="center">Data tidak ditemukan</td></tr>';
	                        }
							}
	                         ?>
	                        </tbody>
	                    </table>
	                    <script>
                        $(document).ready(function () {
                            $('#datamateri').dataTable();
                        });
                        </script>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
<?php
} if(@$_GET['action'] == 'tambah') { ?>
	<div class="row">
		<div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah File Materi &nbsp; <a href="?page=materi" class="btn btn-warning btn-xs">Kembali</a></div>
                <div class="panel-body">
	                <?php
	                if(@$_SESSION[admin]) { ?>
	                	<form method="post" enctype="multipart/form-data">
	                    	<div class="form-group">
	                            <label>Judul *</label>
	                            <input type="text" name="judul" class="form-control" required />
	                        </div>
	                        <div class="form-group">
	                            <label>Mapel *</label>
	                            <select name="mapel" class="form-control" required>
	                            	<option value="">- Pilih -</option>
	                            	<?php
	                            	$sql_mapel = mysqli_query($db, "SELECT * FROM tb_mapel") or die ($db->error);
	                            	while($data_mapel = mysqli_fetch_array($sql_mapel)) {
	                            		echo '<option value="'.$data_mapel['id'].'">'.$data_mapel['mapel'].'</option>';
	                            	} ?>
	                            </select>
	                        </div>
	                        <div class="form-group">
	                            <label>Kelas *</label>
	                            <select name="kelas" class="form-control" required>
	                            	<option value="">- Pilih -</option>
	                            	<?php
	                            	$sql_kelas = mysqli_query($db, "SELECT * FROM tb_kelas") or die ($db->error);
	                            	while($data_kelas = mysqli_fetch_array($sql_kelas)) {
	                            		echo '<option value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';
	                            	} ?>
	                            </select>
	                        </div>
	                        <div class="form-group">
	                            <label>File *</label>
	                            <input type="file" name="materi" class="form-control" required />
	                        </div>
	                        <div class="form-group">
	                            <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
	                            <input type="reset" value="Reset" class="btn btn-danger" />
	                        </div>
	                    </form>
					<?php
	                } else if(@$_SESSION[pengajar]) { ?>
	                    <form method="post" enctype="multipart/form-data">
	                    	<div class="form-group">
	                            <label>Judul *</label>
	                            <input type="text" name="judul" class="form-control" required />
	                        </div>
	                        <div class="form-group">
	                            <label>Mapel yang Anda Ajar *</label>
	                            <select name="mapel" class="form-control" required>
	                            	<option value="">- Pilih -</option>
	                            	<?php
	                            	$sql_mapel_ajar = mysqli_query($db, "SELECT DISTINCT(id_mapel) FROM tb_mapel_ajar WHERE id_pengajar = '$_SESSION[pengajar]'") or die ($db->error);
	                            	while($data_mapel_ajar = mysqli_fetch_array($sql_mapel_ajar)) {
	                            		$sql_mapel = mysqli_query($db, "SELECT * FROM tb_mapel WHERE id = '$data_mapel_ajar[id_mapel]'") or die($db->error);
	                            		$data_mapel = mysqli_fetch_array($sql_mapel);
	                            		echo '<option value="'.$data_mapel_ajar['id_mapel'].'">'.$data_mapel['mapel'].'</option>';
	                            	} ?>
	                            </select>
	                        </div>
	                        <div class="form-group">
	                            <label>Kelas yang Anda Ajar *</label>
	                            <select name="kelas" class="form-control" required>
	                            	<option value="">- Pilih -</option>
	                            	<?php
	                            	$sql_kelas = mysqli_query($db, "SELECT * FROM tb_kelas_ajar JOIN tb_kelas ON tb_kelas_ajar.id_kelas = tb_kelas.id_kelas WHERE tb_kelas_ajar.id_pengajar = '$_SESSION[pengajar]'") or die ($db->error);
	                            	while($data_kelas = mysqli_fetch_array($sql_kelas)) {
	                            		echo '<option value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';
	                            	} ?>
	                            </select>
	                        </div>
	                        <div class="form-group">
	                            <label>File *</label>
	                            <input type="file" name="materi" class="form-control" required />
	                        </div>
	                        <div class="form-group">
	                            <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
	                            <input type="reset" value="Reset" class="btn btn-danger" />
	                        </div>
	                    </form>
                    <?php
	                }

                    if(@$_POST['simpan']) {
                    	$judul = @mysqli_real_escape_string($db, $_POST['judul']);
                        $mapel = @mysqli_real_escape_string($db, $_POST['mapel']);
                        $kelas = @mysqli_real_escape_string($db, $_POST['kelas']);

                        $sumber = @$_FILES['materi']['tmp_name'];
                        $target = 'file_materi/';
                        $nama_file = @$_FILES['materi']['name'];

                        if(move_uploaded_file($sumber, $target.$nama_file)) {
                        	if(@$_SESSION[admin]) {
	                            mysqli_query($db, "INSERT INTO tb_file_materi VALUES('', '$judul', '$kelas', '$mapel', '$nama_file', now(), 'admin', '0')") or die ($db->error);           
                            } else if(@$_SESSION[pengajar]) {
                            	mysqli_query($db, "INSERT INTO tb_file_materi VALUES('', '$judul', '$kelas', '$mapel', '$nama_file', now(), '$_SESSION[pengajar]', '0')") or die ($db->error);
                            }
                            echo '<script>window.location="?page=materi";</script>';
                        } else {
                            echo '<script>alert("Gagal menambah materi, file gagal diupload, coba lagi!");</script>';
                        }
                    } ?>
                </div>
            </div>
        </div>
	</div>
<?php
} else if(@$_GET['action'] == 'hapus') {
	mysqli_query($db, "DELETE FROM tb_file_materi WHERE id_materi = '$_GET[IDmateri]'") or die($db->error);
	echo "<script>window.location='?page=materi';</script>";
} ?>
