<?php 
 	
	//Mendapatkan Nilai Dari Variable yang ingin ditampilkan
	//$KodeSetting = $_GET['kode_setting'];
	
	//Importing database
	require_once('koneksi.php');
	
	//Membuat SQL Query dengan pegawai yang ditentukan secara spesifik sesuai ID
	$sql = "SELECT * FROM tbl_control WHERE control_name='Engine' ORDER BY update_time DESC LIMIT 1";
	
	//Mendapatkan Hasil 
	$r = mysqli_query($con,$sql);
	
	//Memasukkan Hasil Kedalam Array
	$result = array();
	$row = mysqli_fetch_array($r);
	array_push($result,array(
			"ControlCodeEngine"=>$row['control_code'],
			"ControlNameEngine"=>$row['control_name'],
			"ControlStatusEngine"=>$row['control_status'],
			"UpdateTimeEngine"=>$row['update_time']
		));
 
	//Menampilkan dalam format JSON
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);
?>