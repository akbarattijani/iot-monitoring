<?php 
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		//Mendapatkan Nilai Variable
		date_default_timezone_set('Asia/Jakarta');
		
		$GpsCoordinat = $_POST['GpsCoordinat'];
		$UpdateTime = date("Y-m-d H:i:s");

		//Pembuatan Syntax SQL
		$sql = "INSERT INTO tbl_gps (gps_coordinat,update_time) VALUES ('$GpsCoordinat','$UpdateTime')";
		//Import File Koneksi databaset
		require_once('koneksi.php');
		//Eksekusi Query database
		if(pg_query($con,$sql))
		{
			echo 'Success';
		}
		else
		{
			echo 'Failed';
		}
		pg_close($con);
	}
?>