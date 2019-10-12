<?php
	include $_SERVER['DOCUMENT_ROOT'].'/ujianonline/'."+koneksi.php";
if(isset($_GET['id_tq'])){
	
	$query = "SELECT * FROM tb_soal_pilgan";
	$result = mysqli_query($db,$query);
	$hasil=array();
 while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
 {
 $hasil[]=$row;
 } 
 $hasil1 = array('status' => true, 'message' => 'Data show succes', 'data' => $hasil);
 
	echo json_encode($hasil1);
}else{
	echo json_encode(array(
		"success"=>false,
		"message"=>"no method allow"
	));
}

?>
