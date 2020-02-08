<?php 
  
	//Import File Koneksi Database
	require_once('koneksi.php');
	
	//Membuat SQL Query
	$sql = "SELECT * FROM tbl_gps ORDER BY update_time DESC LIMIT 1";
	
	//Mendapatkan Hasil
	$r = pg_query($con,$sql);
	
	//Membuat Array Kosong 
	$result = array();
	
	while($row = pg_fetch_array($r)){
		
		//Memasukkan Nama dan ID kedalam Array Kosong yang telah dibuat 
		array_push($result,array(
		"GPSCode"=>$row['gps_code'],
		"GPSCoordinat"=>$row['gps_coordinat'],
		"UpdateTimeGPS"=>$row['update_time']
		));
	}
	
	//Menampilkan Array dalam Format JSON
	echo json_encode(array('result'=>$result));
	
	pg_close($con);
?>