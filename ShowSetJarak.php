<?php 
  
	//Import File Koneksi Database
	require_once('koneksi.php');
	
	//Membuat SQL Query
	$sql = "SELECT * FROM tbl_set_jarak ORDER BY update_time DESC LIMIT 1";
	
	//Mendapatkan Hasil
	$r = pg_query($con,$sql);
	
	//Membuat Array Kosong 
	$result = array();
	
	while($row = pg_fetch_array($r)){
		
		//Memasukkan Nama dan ID kedalam Array Kosong yang telah dibuat 
		array_push($result,array(
		"CodeSetDistance"=>$row['code_set_distance'],
		"SetDistance"=>$row['distance'],
		"UpdateTime"=>$row['update_time'],
		"UpdateBy"=>$row['update_by']
		));
	}
	
	//Menampilkan Array dalam Format JSON
	echo json_encode(array('result'=>$result));
	
	pg_close($con);
?>