<?php 
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		//Mendapatkan Nilai Variable
		date_default_timezone_set('Asia/Jakarta');
		
		$EmailAddress = $_POST['EmailAddress'];
		$UpdateTimeEmail = date("Y-m-d H:i:s");
		$UpdateBy = $_POST['UpdateBy'];

		//Pembuatan Syntax SQL
		$sql = "INSERT INTO tbl_email (email_address,update_time,updated_by) VALUES ('$EmailAddress','$UpdateTimeEmail','$UpdateBy')";
		//Import File Koneksi databaset
		require_once('koneksi.php');
		//Eksekusi Query database
		if(mysqli_query($con,$sql))
		{
			echo 'Success';
		}
		else
		{
			echo 'Failed';
		}
		mysqli_close($con);
	}
?>