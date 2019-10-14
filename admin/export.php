<?php

	//$export = $_GET['export'];
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
 
	// Mendefinisikan nama file ekspor "hasil-export.xls"
	header("Content-Disposition: attachment; filename=tutorialweb-export.xlsx");
	 
	// Tambahkan table
	include 'data_export_pengajar.php';
?>
