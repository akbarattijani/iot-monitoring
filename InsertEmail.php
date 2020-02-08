<?php 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		//Mendapatkan Nilai Variable
		date_default_timezone_set('Asia/Jakarta');
		
		if (isset($_POST['EmailAddress'])) {
			echo 'Email Address empty';
		} else if (isset($_POST['UpdateBy'])) {
			echo 'UpdateBy empty';
		} else {
			echo $_POST['UpdateBy'];
			$UpdateTimeEmail = date("Y-m-d H:i:s");

			//Pembuatan Syntax SQL
			$sql = "INSERT INTO tbl_email (email_address,update_time,updated_by) VALUES ('$_POST['EmailAddress']','$UpdateTimeEmail','$_POST['UpdateBy']')";
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