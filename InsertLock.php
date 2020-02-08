<?php 
	if($_SERVER['REQUEST_METHOD']=='POST') {
		if (empty($_POST['ControlNameLock'])) {
			echo 'ControlNameLock empty';
		} else if (empty($_POST['UpdateBy'])) {
			echo 'UpdateBy empty';
		} else {
			//Mendapatkan Nilai Variable
			date_default_timezone_set('Asia/Jakarta');
			
			$ControlNameLock = $_POST['ControlNameLock'];
			$ControlStatusLock = $_POST['ControlStatusLock'];
			$UpdateTimeLock = date("Y-m-d H:i:s");
			$UpdateBy = $_POST['UpdateBy'];
			
			//Pembuatan Syntax SQL
			$sql = "INSERT INTO tbl_control (control_name,control_status,update_time,updated_by) VALUES ('$ControlNameLock','$ControlStatusLock','$UpdateTimeLock','$UpdateBy')";
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