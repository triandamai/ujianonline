
	<?php
	//koneksi ke database
	
	include $_SERVER['DOCUMENT_ROOT'].'/ujianonline/'."+koneksi.php";
	include $_SERVER['DOCUMENT_ROOT'].'/ujianonline/admin/'.'PHPExcel/PHPExcel.php';
	
	$excel = new PHPExcel;

	$excel->getProperties()->setCreator("TRian");
	$excel->getProperties()->setLastModifiedBy("Trian");
	$excel->getProperties()->setTitle("Data Pegawai");
	$excel->removeSheetByIndex(0);
	$sheet = $excel->createSheet();
	$sheet->setTitle('sheet_1');
 	$sheet->setCellValue("A1", "NO");
 	$sheet->setCellValue("B1", "NIP");
 	$sheet->setCellValue("C1", "NAMA LENGKAP");
	$sheet->setCellValue("D1", "TEMPAT LAHIR");
	$sheet->setCellValue("E1", "TANGGAL LAHIR");
	$sheet->setCellValue("F1", "JENIS KELAMIN");
	$sheet->setCellValue("G1", "AGAMA");
	$sheet->setCellValue("H1", "NO TELP");
	$sheet->setCellValue("I1", "EMAIL");
	$sheet->setCellValue("J1", "ALAMAT");
	$sheet->setCellValue("K1", "JABATAN");
	$sheet->setCellValue("L1", "FOTO");
	$sheet->setCellValue("M1", "WEB");
	$sheet->setCellValue("N1", "USERNAME");
	$sheet->setCellValue("O1", "PASSWORD");
	$sheet->setCellValue("P1", "STATUS");
	
 
 
	//query menampilkan data
	$sql = mysqli_query($db,"SELECT * FROM tb_pengajar ORDER BY id_pengajar ASC");
	$no = 1;
	$i = 2;
	while($data = mysqli_fetch_array($sql)){
		$sheet->setCellValue( "A" . $i, $no );
   		$sheet->setCellValue( "B" . $i, $data['nip'] );
   		$sheet->setCellValue( "C" . $i, $data['nama_lengkap'] );
		$sheet->setCellValue( "D" . $i, $data['tempat_lahir'] );
		$sheet->setCellValue( "E" . $i, $data['tgl_lahir'] );
		$sheet->setCellValue( "F" . $i, $data['jenis_kelamin'] );
   		$sheet->setCellValue( "G" . $i, $data['agama'] );
		$sheet->setCellValue( "H" . $i, $data['no_telp'] );
		$sheet->setCellValue( "I" . $i, $data['email'] );
   		$sheet->setCellValue( "J" . $i, $data['alamat'] );
   		$sheet->setCellValue( "K" . $i, $data['jabatan'] );
		$sheet->setCellValue( "L" . $i, $data['foto'] );
		$sheet->setCellValue( "M" . $i, $data['web'] );
   		$sheet->setCellValue( "N" . $i, $data['username'] );
   		$sheet->setCellValue( "O" . $i, $data['password'] );
   		$sheet->setCellValue( "P" . $i, $data['status'] );
		
			
		$no++;
		$i++;
	}
	// $writer = new PHPExcel_Writer_Excel2007($excel);
	// $writer->save("php://output");
	$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="DATA _PENGAJAR.xlsx"');
header('Cache-Control: max-age=0');
ob_end_clean();
$objWriter->save('php://output');
	
	?>
