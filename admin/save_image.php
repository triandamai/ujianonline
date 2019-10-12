<?php

	if(isset($_POST["img"])){
		// requires php5
	define('UPLOAD_DIR', 'img_soal/');
	$img = $_POST['img'];
	$nama = $_POST['namafile'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = UPLOAD_DIR .  $nama. '.png';
	$success = file_put_contents($_SERVER['DOCUMENT_ROOT']."/ujianonline/admin/img_soal/".$nama.".png", $data);
	if ($success ) {
		echo json_encode(array(
			"status" => true
		));
	} else{ 
		echo json_encode(array(
		"status" => false
		));
}
	}else{
		echo json_encode(array(
			"status"=>false
		));
	}
?>
