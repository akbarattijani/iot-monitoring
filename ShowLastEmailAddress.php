<?php 
 	
	//Mendapatkan Nilai Dari Variable yang ingin ditampilkan
	//$KodeSetting = $_GET['kode_setting'];
	
	//Importing database
	require_once('koneksi.php');
	
	//Membuat SQL Query dengan pegawai yang ditentukan secara spesifik sesuai ID
	$sql = "SELECT * FROM tbl_email ORDER BY update_time DESC LIMIT 1";
	
	//Mendapatkan Hasil 
	$r = mysqli_query($con,$sql);
	
	//Memasukkan Hasil Kedalam Array
	$result = array();
	$row = mysqli_fetch_array($r);
	array_push($result,array(
			"EmailCode"=>$row['email_code'],
			"EmailAddress"=>$row['email_address'],
			"UpdateTimeEmail"=>$row['update_time']
		));
 
	//Menampilkan dalam format JSON
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);
?>