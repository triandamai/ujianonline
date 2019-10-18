<?php
	//$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif','wma','mp3','wav'); // valid extensions
	
	$path = 'img_soal/'; // upload directory
if(!empty($_POST['file_name']) || $_FILES['fileupload'])
{
	$img = $_FILES['fileupload']['name'];
	$tmp = $_FILES['fileupload']['tmp_name'];
	$nama = $_POST['file_name'];
	$id_soal = $_POST['id_soal'];
	$pilihan = $_POST['pilihan_upload'];

	// get uploaded file's extension
	$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
	// can upload same image using rand function

	// check's valid format
	if(in_array($ext, $valid_extensions)) 
	{ 
		$path = $path.$nama.".".$ext; 
		if(move_uploaded_file($tmp,$path)) 
		{
			
			include_once './+koneksi.php';

			//insert form data in the database
			//$insert = $db->query("INSERT uploading (name,email,file_name) VALUES ('".$name."','".$email."','".$path."')");
			//echo $insert?'ok':'err';
			$insert = mysqli_query($db,"UPDATE tb_soal_pilgan set ".$pilihan."='".$nama.".".$ext."' WHERE id_pilgan=".$id_soal) or die($db->error);
			if($insert){
				echo json_encode(array("success"=>true,"message"=>"berhasil upload"));
			}else{
				echo json_encode(array("success"=>false,"message"=>"database error ".$insert));
			}
		}
	} else {
		echo json_encode(array("success"=>false,"message"=>"index file tidak ada"));
	}
}

?>
