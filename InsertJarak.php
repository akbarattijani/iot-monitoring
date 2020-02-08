<?php 
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		//Mendapatkan Nilai Variable
		date_default_timezone_set('Asia/Jakarta');
		
		$Distance = $_POST['Distance'];
		$UpdateTime = date("Y-m-d H:i:s");

		//Pembuatan Syntax SQL
		$sql = "INSERT INTO tbl_jarak (distance,update_time) VALUES ('$Distance','$UpdateTime')";
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