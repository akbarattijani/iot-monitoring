<?php 
	if($_SERVER['REQUEST_METHOD']=='POST') {
		try {
			if (empty($_POST['ControlNameAlarm'])) {
				echo 'ControlNameAlarm empty';
			} else if (empty($_POST['ControlNameAlarm'])) {
				echo 'ControlNameAlarm empty';
			} else if (empty($_POST['UpdateBy'])) {
				echo 'UpdateBy empty';
			} else {
				$ControlNameAlarm = $_POST['ControlNameAlarm'];
				$ControlStatusAlarm = $_POST['ControlStatusAlarm'];
				$UpdateBy = $_POST['UpdateBy'];
				
				//Mendapatkan Nilai Variable
				date_default_timezone_set('Asia/Jakarta');
				$UpdateTimeAlarm = date("Y-m-d H:i:s");

				//Pembuatan Syntax SQL
				$sql = "INSERT INTO tbl_control (control_name,control_status,update_time,updated_by) VALUES ('$ControlNameAlarm','$ControlStatusAlarm','$UpdateTimeAlarm','$UpdateBy')";
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
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e, "\n";
		}
	}
?>