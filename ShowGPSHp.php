<?php 
  
	//Import File Koneksi Database
	require_once('koneksi.php');
	
	//Membuat SQL Query
	$sql = "SELECT * FROM tbl_gps_hp ORDER BY update_time DESC LIMIT 1 ";
	
	//Mendapatkan Hasil
	$r = mysqli_query($con,$sql);
	
	//Membuat Array Kosong 
	$result = array();
	
	while($row = mysqli_fetch_array($r)){
		
		//Memasukkan Nama dan ID kedalam Array Kosong yang telah dibuat 
		array_push($result,array(
		"GPSCodeHp"=>$row['code_gps_hp'],
		"GPSCoordinatHp"=>$row['gps_coordinat_hp'],
		"UpdateTimeGPS"=>$row['update_time']
		));
	}
	
	//Menampilkan Array dalam Format JSON
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);
?>