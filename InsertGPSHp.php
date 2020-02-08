<?php 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if (empty($_POST['GpsCoordinatHP'])) {
			echo 'GpsCoordinatHP empty';
		} else if (empty($_POST['UpdateBy'])) {
			echo 'UpdateBy empty';
		} else {
			//Mendapatkan Nilai Variable
			date_default_timezone_set('Asia/Jakarta');
			
			$GpsCoordinatHP = $_POST['GpsCoordinatHP'];
			$UpdateTime = date("Y-m-d H:i:s");
			$UpdateBy = $_POST['UpdateBy'];

			//Pembuatan Syntax SQL
			$sql = "INSERT INTO tbl_gps_hp (gps_coordinat_hp,update_time,update_by) VALUES ('$GpsCoordinatHP','$UpdateTime','$UpdateBy')";
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
	}
?>