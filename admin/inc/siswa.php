<?php
$no = 1;
$id = @$_GET['id'];

if(@$_SESSION['admin']) { ?>
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Manajemenen Data Siswa</h1>
        </div>
    </div>
<?php
}

if(@$_GET['action'] == '') {

    if(@$_SESSION['admin']) { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning">
                    Admin tidak dapat mengedit data siswa. Admin hanya dapat mengaktifkan dan menonaktifkan serta menghapus akun siswa. Untuk mengedit data siswa yang berhak ialah siswa itu sendiri.
                </div>
            </div>
        </div>
    <?php
    } ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
				<a href="?page=siswa&action=tambah" class="btn btn-primary btn-sm">Tambah Data</a>
			<a href="?page=siswa&action=import" class="btn btn-primary btn-sm">Import</a>
			<a href="http://localhost/ujianonline/admin/data_export_siswa.php" class="btn btn-primary btn-sm">Export</a>
                <?php
                if(@$_GET['IDkelas'] == '') {
                    echo 'Data Siswa yang Aktif &nbsp; <a href="./laporan/cetak.php?data=siswa" target="_blank" class="btn btn-default btn-xs">Cetak Data Siswa</a>';
                } else if(@$_GET['IDkelas'] != '') {
                    echo "Data Siswa Per Kelas ".@$_GET['kelas']." yang Aktif &nbsp; <a href='?page=kelas' class='btn btn-warning btn-sm'>Kembali</a>";
                } ?>
                    
                </div>
                <div class="panel-body">
                	<div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="datasiswa">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIS</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <!-- <th>Alamat</th> -->
                                    <!-- <th>Kelas</th>
                                    <?php if(@$_SESSION[admin]) { ?>
                                        <th>Status</th>
                                    <?php } ?> -->
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                            if(@$_GET['IDkelas'] == '') {
								//$sql_siswa = mysqli_query($db, "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas WHERE tb_siswa.status = 'aktif'") or die ($db->error);
								$sql_siswa = mysqli_query($db,"SELECT * FROM tb_siswa") or die();
								if(mysqli_num_rows($sql_siswa) > 0){
									while($data_siswa = mysqli_fetch_array($sql_siswa)){
										?>
											<tr>
    	                                <td align="center"><?php echo $no++; ?></td>
    	                                <td><?php echo $data_siswa['nis']; ?></td>
    	                                <td><?php echo $data_siswa['nama_lengkap']; ?></td>
    	                                <td><?php echo $data_siswa['jenis_kelamin']; ?></td>
    	                                <!-- <td><?php echo $data_siswa['alamat']; ?></td> -->
                                        <!-- <td align="center"><?php echo $data_siswa['nama_kelas']; ?></td>
                                        <?php if(@$_SESSION[admin]) { ?>
        	                                <td><?php echo ucfirst($data_siswa['status']); ?></td>
                                        <?php } ?>
    	                                <td align="center">
                                            <?php if(@$_SESSION[admin]) { ?>
        	                                    <a href="?page=siswa&action=nonaktifkan&id=<?php echo $data_siswa['id_siswa']; ?>" class="badge" style="background-color:#f60;">Non aktifkan</a>
                                                <a onclick="return confirm('Yakin akan menghapus data ?');" href="?page=siswa&action=hapus&id=<?php echo $data_siswa['id_siswa']; ?>" class="badge" style="background-color:#f00;">Hapus</a>
                                            <?php } ?>
                                            <a href="?page=siswa&action=detail&IDsiswa=<?php echo $data_siswa['id_siswa']; ?>" class="badge">Detail</a>
    	                                </td> -->
										<td>
										opsi</td>
    	                            </tr>
										<?php
									}
								}else{
									?>
    							<tr>
                                    <td colspan="8" align="center">Data tidak ditemukan</td>
    							</tr>
    		                	<?php
								}
                            } else if(@$_GET['IDkelas'] != '') {
                                //$sql_siswa = mysqli_query($db, "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas WHERE tb_siswa.status = 'aktif' AND tb_siswa.id_kelas = '$_GET[IDkelas]'") or die ($db->error);
								$sql_siswa = mysqli_query($db,"SELECT * FROM tb_siswa WHERE id_kelas=".$_GET['IDkelas']) or die();
								if(mysqli_num_rows($sql_siswa)>0){
									while($data_siswa =mysqli_fetch_array($sql_siswa)){
										?>
											<tr>
    	                                <td align="center"><?php echo $no++; ?></td>
    	                                <td><?php echo $data_siswa['nis']; ?></td>
    	                                <td><?php echo $data_siswa['nama_lengkap']; ?></td>
    	                                <td><?php echo $data_siswa['jenis_kelamin']; ?></td>
    	                                <!-- <td><?php echo $data_siswa['alamat']; ?></td> -->
                                        <!-- <td align="center"><?php echo $data_siswa['nama_kelas']; ?></td>
                                        <?php if(@$_SESSION[admin]) { ?>
        	                                <td><?php echo ucfirst($data_siswa['status']); ?></td>
                                        <?php } ?>
    	                                <td align="center">
                                            <?php if(@$_SESSION[admin]) { ?>
        	                                    <a href="?page=siswa&action=nonaktifkan&id=<?php echo $data_siswa['id_siswa']; ?>" class="badge" style="background-color:#f60;">Non aktifkan</a>
                                                <a onclick="return confirm('Yakin akan menghapus data ?');" href="?page=siswa&action=hapus&id=<?php echo $data_siswa['id_siswa']; ?>" class="badge" style="background-color:#f00;">Hapus</a>
                                            <?php } ?>
                                            <a href="?page=siswa&action=detail&IDsiswa=<?php echo $data_siswa['id_siswa']; ?>" class="badge">Detail</a>
    	                                </td> -->
										<td>
										opsi</td>
    	                            </tr>
								<?php
									}
								}else{
									?>
							<tr>
								<td colspan="8" align="center">Data tidak ditemukan</td>
							</tr>
							<?php
								}
								
							}
							//var_dump(mysqli_fetch_array($sql_siswa));
							//die();
                            if(mysqli_num_rows($sql_siswa) > 0) {
    	                        while($data_siswa = mysqli_fetch_array($sql_siswa)) { ?>
    	                            
    	                        <?php
    		                    }
    		                } else { ?>
    							<tr>
                                    <td colspan="8" align="center">Data tidak ditemukan</td>
    							</tr>
    		                	<?php
    		                } ?>
                            </tbody>
                        </table>
                        <script>
                        $(document).ready(function () {
                            $('#datasiswa').dataTable();
                        });
                        </script>
                    </div>
                </div>
            </div>
    	</div>
    </div>

<?php
} else if(@$_GET['action'] == 'nonaktifkan') {
    mysqli_query($db, "UPDATE tb_siswa SET status = 'tidak aktif' WHERE id_siswa = '$id'") or die ($db->error);
    echo "<script>window.location='?page=siswa';</script>";
} else if(@$_GET['action'] == 'hapus') {
    mysqli_query($db, "DELETE FROM tb_siswa WHERE id_siswa = '$id'") or die ($db->error);
    echo "<script>window.location='?page=siswa';</script>";
} else if(@$_GET['action'] == 'detail') {
    $sql_siswa_per_id = mysqli_query($db, "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas WHERE id_siswa = '$_GET[IDsiswa]'") or die ($db->error);
    $data = mysqli_fetch_array($sql_siswa_per_id);
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Detail Data Siswa</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table width="100%">
                            <tr>
                                <td align="right" width="46%"><b>NIS</b></td>
                                <td align="center">:</td>
                                <td width="46%"><?php echo $data['nis']; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>Nama Lengkap</b></td>
                                <td align="center">:</td>
                                <td><?php echo $data['nama_lengkap']; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>Tempat Tanggal Lahir</b></td>
                                <td align="center">:</td>
                                <td><?php echo $data['tempat_lahir'].", ".tgl_indo($data['tgl_lahir']); ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>Jenis Kelamin</b></td>
                                <td align="center">:</td>
                                <td><?php if($data['jenis_kelamin'] == 'L') { echo "Laki-laki"; } else { echo "Perempuan"; } ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>Agama</b></td>
                                <td align="center">:</td>
                                <td><?php echo $data['agama']; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>Nama Ayah</b></td>
                                <td align="center">:</td>
                                <td><?php echo $data['nama_ayah']; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>Nama Ibu</b></td>
                                <td align="center">:</td>
                                <td><?php echo $data['nama_ibu']; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>Nomor Telepon</b></td>
                                <td align="center">:</td>
                                <td><?php echo $data['no_telp']; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>Email</b></td>
                                <td align="center">:</td>
                                <td><?php echo $data['email']; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>Alamat</b></td>
                                <td align="center">:</td>
                                <td><?php echo $data['alamat']; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>Kelas</b></td>
                                <td align="center">:</td>
                                <td><?php echo $data['nama_kelas']; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>Tahun Masuk</b></td>
                                <td align="center">:</td>
                                <td><?php echo $data['thn_masuk']; ?></td>
                            </tr>
                            <tr>
                                <td align="right" valign="top"><b>Foto</b></td>
                                <td align="center" valign="top">:</td>
                                <td>
                                    <div style="padding:10px 0;"><img width="250px" src="../img/foto_siswa/<?php echo $data['foto']; ?>" /></div>
                                </td>
                            </tr>
                            <?php if(@$_SESSION[admin]) { ?>
                                <tr>
                                    <td align="right"><b>Username</b></td>
                                    <td align="center">:</td>
                                    <td><?php echo $data['username']; ?></td>
                                </tr>
                                <tr>
                                    <td align="right"><b>Password</b></td>
                                    <td align="center">:</td>
                                    <td><?php echo $data['pass']; ?></td>
                                </tr>
                                <tr>
                                    <td align="right"><b>Status</b></td>
                                    <td align="center">:</td>
                                    <td><?php echo ucfirst($data['status']); ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
} else if(@$_GET['action'] == 'tambah') {
	?>
	 <div class="row">
                    <div class="col-md-12">
                        <h4 class="page-head-line">Halaman Input Data siswa</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
					<div class="panel panel-heading">
					<h4><i>Masukkan data Siswa dengan benar !</i></h4>
                        <form method="post" enctype="multipart/form-data">
                            NIS* :<input type="text" name="nis" class="form-control" required />
                            Nama Lengkap* : <input type="text" name="nama_lengkap" class="form-control" required />
                            Tempat Lahir* : <input type="text" name="tempat_lahir" class="form-control" required />
                            Tanggal Lahir* : <input type="date" name="tgl_lahir" class="form-control" required />
                            Jenis Kelamin* :
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            Agama* :
                            <select name="agama" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katholik">Katholik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                            Nama Ayah* : <input type="text" name="nama_ayah" class="form-control" required />
                            Nama Ibu* : <input type="text" name="nama_ibu" class="form-control" required />
                            Nomor Telepon : <input type="text" name="no_telp" class="form-control" />
                            Email : <input type="email" name="email" class="form-control" />
                            Alamat* : <textarea name="alamat" class="form-control" rows="3" required></textarea>
                            Kelas* :
                            <select name="kelas" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_kelas = mysqli_query($db, "SELECT * from tb_kelas") or die ($db->error);
                                while($data_kelas = mysqli_fetch_array($sql_kelas)) {
                                    echo '<option value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';
                                } ?>
                            </select>
                            Tahun Masuk* :
                            <select name="thn_masuk" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                for ($i = 2020; $i >= 2000; $i--) { 
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                } ?>
                            </select>
                            Foto : <input type="file" name="gambar" class="form-control" />
                            Username* : <input type="text" name="user" class="form-control" required />
                            Password* : <input type="password" name="pass" class="form-control" required />
                            <br />
                            <i><b>Catatan</b> : Tanda * wajib disi</i>
                            <hr />
                            <input type="submit" name="daftar" value="Daftar" class="btn btn-info" />
                            <input type="reset" class="btn btn-danger" />
                        </form>
                        <?php
                        if(@$_POST['daftar']) {
                            $nis = @mysqli_real_escape_string($db, $_POST['nis']);
                            $nama_lengkap = @mysqli_real_escape_string($db, $_POST['nama_lengkap']);
                            $tempat_lahir = @mysqli_real_escape_string($db, $_POST['tempat_lahir']);
                            $tgl_lahir = @mysqli_real_escape_string($db, $_POST['tgl_lahir']);
                            $jenis_kelamin = @mysqli_real_escape_string($db, $_POST['jenis_kelamin']);
                            $agama = @mysqli_real_escape_string($db, $_POST['agama']);
                            $nama_ayah = @mysqli_real_escape_string($db, $_POST['nama_ayah']);
                            $nama_ibu = @mysqli_real_escape_string($db, $_POST['nama_ibu']);
                            $no_telp = @mysqli_real_escape_string($db, $_POST['no_telp']);
                            $email = @mysqli_real_escape_string($db, $_POST['email']);
                            $alamat = @mysqli_real_escape_string($db, $_POST['alamat']);
                            $kelas = @mysqli_real_escape_string($db, $_POST['kelas']);
                            $thn_masuk = @mysqli_real_escape_string($db, $_POST['thn_masuk']);
                            $user = @mysqli_real_escape_string($db, $_POST['user']);
                            $pass = @mysqli_real_escape_string($db, $_POST['pass']);

                            $sumber = @$_FILES['gambar']['tmp_name'];
                            $target = $_SERVER['DOCUMENT_ROOT'].'/ujianonline/admin/img_user';
                            $nama_gambar = @$_FILES['gambar']['name'];

                            $sql_cek_user = mysqli_query($db, "SELECT * FROM tb_siswa WHERE username = '$user'") or die ($db->error);
                            if(mysqli_num_rows($sql_cek_user) > 0) {
                              
                            } else {
                                if($nama_gambar != '') {
                                    if(move_uploaded_file($sumber, $target.$nama_gambar)) {
                                        mysqli_query($db, "INSERT INTO tb_siswa VALUES('', '$nis', '$nama_lengkap', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$nama_ayah', '$nama_ibu', '$no_telp', '$email', '$alamat', '$kelas', '$thn_masuk', '$nama_gambar', '$user', md5('$pass'), '$pass', 'tidak aktif')") or die ($db->error);          
                                        echo '<script>alert("berhasil, silahkan login"); window.location="./"</script>';
                                    } else {
                                        echo '<script>alert("Gagal mendaftar, foto gagal diupload, coba lagi!");</script>';
                                    }
                                } else {
                                    mysqli_query($db, "INSERT INTO tb_siswa VALUES('', '$nis', '$nama_lengkap', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$nama_ayah', '$nama_ibu', '$no_telp', '$email', '$alamat', '$kelas', '$thn_masuk', 'anonim.png', '$user', md5('$pass'), '$pass', 'tidak aktif')") or die ($db->error);          
                                    echo '<script>alert(" berhasil, tunggu akun aktif dan silahkan login"); window.location="./"</script>';
                                }
                            }
                        }
                        ?>
                    </div>
                   
					</div>
                        
                </div>
	<?php
} else if(@$_GET['action'] == 'import'){
	?>
	<div class="row">
	<div style="padding: 0 15px;" class="panel panel-default">
		<!-- Buat sebuah tombol Cancel untuk kemabli ke halaman awal / view data -->
		<a href="index.php" class="btn btn-danger pull-right">
			<span class="glyphicon glyphicon-remove"></span> Cancel
		</a>

		<h3>Form Import Data</h3>
		<hr>

	
			<a href="http://localhost/ujianonline/format/format_data_siswa.xls" class="btn btn-default">
				<span class="glyphicon glyphicon-download"></span>
				Download Format
			</a><br><br>

			<!--
			-- Buat sebuah input type file
			-- class pull-left berfungsi agar file input berada di sebelah kiri
			-->
			<!-- <input id="file" type="file" name="file" class="pull-left">

			<button id="preview" type="button" name="preview" class="btn btn-success btn-sm">
				<span class="glyphicon glyphicon-eye-open"></span> Preview
			</button> -->

			<form method="post" enctype="multipart/form-data" action="./import_new_siswa.php">
					Pilih File: 
					<input name="files" type="file" > 
					<input name="upload" type="submit" value="Import" class="btn btn-success btn-sm">
				</form>

		<hr>

		<!-- Buat Preview Data -->
		
	</div>
</div>
	<?php
} else if(@$_GET['action'] == 'prosestambah') {
	$nip = @mysqli_real_escape_string($db, $_POST['nip']);
	$nama_lengkap = @mysqli_real_escape_string($db, $_POST['nama_lengkap']);
	$tempat_lahir = @mysqli_real_escape_string($db, $_POST['tempat_lahir']);
	$tgl_lahir = @mysqli_real_escape_string($db, $_POST['tgl_lahir']);
	$jenis_kelamin = @mysqli_real_escape_string($db, $_POST['jenis_kelamin']);
	$agama = @mysqli_real_escape_string($db, $_POST['agama']);
	$no_telp = @mysqli_real_escape_string($db, $_POST['no_telp']);
	$email = @mysqli_real_escape_string($db, $_POST['email']);
	$alamat = @mysqli_real_escape_string($db, $_POST['alamat']);
	$jabatan = @mysqli_real_escape_string($db, $_POST['jabatan']);
	$web = @mysqli_real_escape_string($db, $_POST['web']);
	$username = @mysqli_real_escape_string($db, $_POST['username']);
	$password = @mysqli_real_escape_string($db, $_POST['password']);
	$status = @mysqli_real_escape_string($db, $_POST['status']);

	$sumber = @$_FILES['gambar']['tmp_name'];
	$target = 'img/foto_pengajar/';
	$nama_gambar = @$_FILES['gambar']['name'];

	if($nama_gambar != '') {
		if(move_uploaded_file($sumber, $target.$nama_gambar)) {
			mysqli_query($db, "INSERT INTO tb_pengajar VALUES('', '$nip', '$nama_lengkap', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$no_telp', '$email', '$alamat', '$jabatan', '$nama_gambar', '$web', '$username', md5('$password'), '$password', '$status')") or die ($db->error);
			echo '<script>window.location="?page=pengajar";</script>';
		} else {
			echo '<script>alert("Gagal menambah data pengajar, foto gagal diupload, coba lagi!"); window.location="?page=pengajar";</script>';
		}
	} else {
		mysqli_query($db, "INSERT INTO tb_pengajar VALUES('', '$nip', '$nama_lengkap', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$no_telp', '$email', '$alamat', '$jabatan', 'anonim.png', '$web', '$username', md5('$password'), '$password', '$status')") or die ($db->error);
		echo '<script>window.location="?page=pengajar";</script>';
	}
}
