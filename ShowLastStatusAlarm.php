<?php 
 	
	//Mendapatkan Nilai Dari Variable yang ingin ditampilkan
	//$KodeSetting = $_GET['kode_setting'];
	
	//Importing database
	require_once('koneksi.php');
	
	//Membuat SQL Query dengan pegawai yang ditentukan secara spesifik sesuai ID
	$sql = "SELECT * FROM tbl_control WHERE control_name='Alarm' ORDER BY update_time DESC LIMIT 1";
	
	//Mendapatkan Hasil 
	$r = pg_query($con,$sql);
	
	//Memasukkan Hasil Kedalam Array
	$result = array();
	$row = pg_fetch_array($r);
	array_push($result,array(
			"ControlCodeAlarm"=>$row['control_code'],
			"ControlNameAlarm"=>$row['control_name'],
			"ControlStatusAlarm"=>$row['control_status'],
			"UpdateTimeAlarm"=>$row['update_time']
		));
 
	//Menampilkan dalam format JSON
	echo json_encode(array('result'=>$result));
	
	pg_close($con);
?>