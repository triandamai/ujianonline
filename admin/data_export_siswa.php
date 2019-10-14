
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
	$sheet->setCellValue("H1", "NAMA AYAH");
	$sheet->setCellValue("I1", "NAMA IBU");
	$sheet->setCellValue("J1", "NO TELP");
	$sheet->setCellValue("K1", "EMAIL");
	$sheet->setCellValue("L1", "ALAMAT");
	$sheet->setCellValue("M1", "KELAS");
	$sheet->setCellValue("N1", "TAHUN MASUK");
	$sheet->setCellValue("O1", "USERNAME");
	$sheet->setCellValue("P1", "PASSWORD");
	$sheet->setCellValue("Q1", "STATUS");
	
 
 
	//query menampilkan data
	$sql = mysqli_query($db,"SELECT * FROM tb_siswa ORDER BY id_siswa ASC");
	$no = 1;
	$i = 2;
	while($data = mysqli_fetch_array($sql)){
		$sheet->setCellValue( "A" . $i, $no );
   		$sheet->setCellValue( "B" . $i, $data['nis'] );
   		$sheet->setCellValue( "C" . $i, $data['nama_lengkap'] );
		$sheet->setCellValue( "D" . $i, $data['tempat_lahir'] );
		$sheet->setCellValue( "E" . $i, $data['tgl_lahir'] );
		$sheet->setCellValue( "F" . $i, $data['jenis_kelamin'] );
		$sheet->setCellValue( "G" . $i, $data['agama'] );
		$sheet->setCellValue( "H" . $i, $data['nama_ayah'] );
		$sheet->setCellValue( "I" . $i, $data['nama_ibu'] );   
		$sheet->setCellValue( "J" . $i, $data['no_telp'] );
		$sheet->setCellValue( "K" . $i, $data['email'] );
   		$sheet->setCellValue( "L" . $i, $data['alamat'] );
   		$sheet->setCellValue( "M" . $i, $data['id_kelas'] );
		$sheet->setCellValue( "N" . $i, $data['thn_masuk'] );
   		$sheet->setCellValue( "O" . $i, $data['username'] );
   		$sheet->setCellValue( "P" . $i, $data['password'] );
   		$sheet->setCellValue( "Q" . $i, $data['status'] );
		
			
		$no++;
		$i++;
	}
	// $writer = new PHPExcel_Writer_Excel2007($excel);
	// $writer->save("php://output");
	$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="DATA _SISWA.xlsx"');
header('Cache-Control: max-age=0');
ob_end_clean();
$objWriter->save('php://output');
	
	?>
