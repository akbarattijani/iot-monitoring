<?php 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if (isset($_POST['EmailAddress'])) {
			echo 'Email Address empty';
		} else if (isset($_POST['UpdateBy'])) {
			echo 'UpdateBy empty';
		} else {
			$EmailAddress = $_POST['EmailAddress'];
			$UpdateBy = $_POST['UpdateBy'];
			
			//Mendapatkan Nilai Variable
			date_default_timezone_set('Asia/Jakarta');
			$UpdateTimeEmail = date("Y-m-d H:i:s");

			//Pembuatan Syntax SQL
			$sql = "INSERT INTO tbl_email (email_address,update_time,updated_by) VALUES ('$EmailAddress','$UpdateTimeEmail','$UpdateBy')";
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