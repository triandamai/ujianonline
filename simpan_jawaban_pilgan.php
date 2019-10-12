<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/ujianonline/'."+koneksi.php";

	if(isset($_POST['pilgan'])){
		
		$id_tq = $_POST["id_tq"];
		$id_soal =$_POST["id_soal"];
		$id_siswa = $_POST["id_siswa"];
		$jawaban = $_POST["jawaban"];
		$q = "SELECT * FROM tb_jawaban WHERE id_soal=".$id_soal;
		if($q){
			$rowcount=mysqli_num_rows(mysqli_query($db,$q));
		if($rowcount > 0){
			echo json_encode(array(
				"success"=> true,
				"message" => "sudah ada sih"
			));
		}else{
			$query = "INSERT INTO tb_jawaban (id_tq,id_soal,id_siswa,jawaban) VALUES ('".$id_tq."','".$id_soal."','.$id_siswa.','.$jawaban.')";
			$simpan = mysqli_query($db,$query);
		if($simpan){
		
			echo json_encode(array(
				"success" => true,
				"message" => $simpan
			));
		}else{
			echo json_encode(array(
				"success" => false,
				"message" => "gagal"
			));
		}
		}		
	}	
	}else if(isset($_POST['nilai'])){
		$id_tq = $_POST["id_tq"];
		$id_siswa = $_POST["id_siswa"];
		$jawaban_benar = $_POST["jawaban_benar"];
		$jawaban_salah = $_POST["jawaban_salah"];
		$tidak_dikerjaka = $_POST['tidak_dikerjakan'];
		$porsentase = $_POST['persen'];

		$query_nilai = "INSERT INTO tb_nilai_pilgan (id_tq,id_siswa,benar,salah,tidak_dikerjakan,presentase) VALUES 
		(".$id_tq.",".$id_siswa.",".$jawaban_benar.",".$jawaban_salah.",".$tidak_dikerjaka.",".$porsentase.")";
		$simpan = mysqli_query($db,$query_nilai)or die ($db->error);;
		if($simpan){
			echo json_encode(array(
				"success" => true,
				"message" => $simpan
			));
		}else{
			echo json_encode(array(
				"success" => false,
				"message" => $simpan,
				"data "=> $mysqli->error
			));
		}
	}else{
		echo json_encode(array(
			"success" => false,
		));
	}
?>
