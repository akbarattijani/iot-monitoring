<?php 
	if($_SERVER['REQUEST_METHOD']=='POST') {
		if (empty($_POST['SetDistance'])) {
			echo 'SetDistance empty';
		} else if (empty($_POST['UpdateBy'])) {
			echo 'UpdateBy empty';
		} else {
			//Mendapatkan Nilai Variable
			date_default_timezone_set('Asia/Jakarta');
			
			$SetDistance = $_POST['SetDistance'];
			$UpdateTime = date("Y-m-d H:i:s");
			$UpdateBy = $_POST['UpdateBy'];

			//Pembuatan Syntax SQL
			$sql = "INSERT INTO tbl_set_jarak (distance,update_time,update_by) VALUES ('$SetDistance','$UpdateTime','$UpdateBy')";
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