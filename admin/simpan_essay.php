<?php 
	include '../+koneksi.php';
?>
<?php

	            if(@$_POST['simpan']) {
					$pertanyaan = @mysqli_real_escape_string($db, $_POST['pertanyaan']);
					$cek = $_POST['cek'];
					$id = $_POST['id'];

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
                   // echo '<script>window.location="?page=quiz&action=daftarsoal&hal=essay&id='.$id.'"</script>';
				   header("location: index.php?page=quiz&action=daftarsoal&id=".$id);
				}
	            ?>
