
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
		        Pilih kelas lain <i><small>(centang)</small></i> : 
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
 if(@$_GET['hal'] == "soalessay") { 
?>
	<div class="row">
	<form method="post" enctype="multipart/form-data" action="./simpan_essay.php">
		<div class="panel panel-default">
		    <div class="panel-heading">Buat Soal Essay</div>
		    <div class="panel-body">
		    	<?php
		    	$sql_jumlah_essay = mysqli_query($db, "SELECT * FROM tb_soal_essay WHERE id_tq = '$id'") or die ($db->error); ?>
					<input type="hidden" name="cek" value="<?php echo $cek?>">
					<input type="hidden" name="id" value="<?php echo $_GET['id']?>">
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
	           
		    </div>
		</div>
		</form>
	</div>

	<?php
}else if(@$_GET['hal'] == "soalpilgan") {  ?>


		<div class="row">
		<div style="padding: 0 15px;" class="panel panel-default">
			<!-- Buat sebuah tombol Cancel untuk kemabli ke halaman awal / view data -->
			<a href="index.php" class="btn btn-danger pull-right">
				<span class="glyphicon glyphicon-remove"></span> Cancel
			</a>

			<h3>Form Import Data</h3>
			<hr>

	
				<a href="http://localhost/ujianonline/format/format_data_soal.xls" class="btn btn-default">
					<span class="glyphicon glyphicon-download"></span>
					Download Format
				</a><br><br>

				<form method="post" enctype="multipart/form-data" action="./import_new_soal.php">
					Pilih File: 
					<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
					<input name="filesoal" type="file" > 
					<input name="upload" type="submit" value="Import" class="btn btn-success btn-sm">
				</form>
					
		
			<hr>

		</div>
	</div>
	

<?php
} ?>

