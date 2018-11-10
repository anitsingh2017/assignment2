<?php

	require_once('/home/hxq2265/conf/settings.php');
		$conn = @mysqli_connect($host, $user, $pswd, $dbnm);

		if (!$conn) {
				echo "<p>Database connection failed</p>";
		} 
	
	$phone = $_POST["phone"];
	$streetnumber = $_POST["streetnumber"];
	$streetname = $_POST["streetname"];
	$destination = $_POST["destination"];
	$customername= $_POST["customername"];
	$time = $_POST["time"];
	
		
	$date = $_POST["date"];

	if(!preg_match('/^[a-zA-Z ]*$/', $customername) && empty($customername))
		{
			echo "<font color='red'>letters and spaces only</font>";
		}
		if(!preg_match('/^[a-zA-Z ]*$/', $destination) && empty($destination))
		{
			echo "<font color='red'>letters and space only</font>";
		}
		if(!preg_match('/^[a-zA-Z ]*$/', $streetname) && empty(streetname))
		{
			echo "<font color='red'>letters and spaces only</font>";
		}

		if(!preg_match('/^[0-9]*$/', $streetnumber) && empty($streetnumber))
		{
			echo "<font color='red'>Numbers only</font>";
		}if(!preg_match('/^[0-9]*$/', $phone) && empty($phone))
		{
			echo "<font color='red'>Numbers only</font>";
		}


?>