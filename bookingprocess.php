<?php

/*
	this gets the data from the setting php file to connect to the database.
	the database name, host password and database name is needed.


*/
 require_once('/home/hxq2265/conf/settings.php');
		$conn = @mysqli_connect($host, $user, $pswd, $dbnm);

			if (!$conn) {
				echo "<p>Database connection failed</p>";
			} 
	
	/*
		stores the information passed from booking html
		uses post method to store each variable
	
	
	*/
	$phone = $_POST["phone"];
	$streetnumber = $_POST["streetnumber"];
	$streetname = $_POST["streetname"];
	$destination = $_POST["destination"];
	$customername= $_POST["customername"];
	$time = $_POST["time"];
	
		
	$date = $_POST["date"];
	
	/*
		selects all rows from the bookingtaxi table 
		this is used to query the database. 
	
	*/
	$sql = "select * from bookingtaxi";

	/*
		If the sql query is false which is retrieving from the database then this method creates a table
		
	
	*/
	if(!mysqli_query($conn,$sql))
	{
		$sql = "CREATE TABLE bookingtaxi (
		bookingnumber INT AUTO_INCREMENT PRIMARY KEY,
		customername VARCHAR(50) NOT NULL,
		phone  VARCHAR(20) NOT NULL,
		streetnumber VARCHAR(10),
		streetname VARCHAR(30),
		destination VARCHAR(40),
		status VARCHAR(20),
		date VARCHAR(20),
		time VARCHAR(10))";
		mysqli_query($conn,$sql);
	}
	
	
	/*
		inserts into the bookingtaxi table and uses the row names to assign each row
	*/
	
	$sql = "INSERT INTO bookingtaxi (customername,phone,streetnumber,streetname,destination,date,time,status)
	VALUES('$customername', '$phone', '$streetnumber', '$streetname', '$destination','$date','$time', 'unassigned')";
	mysqli_query($conn,$sql);
	
	/*
		this statement gets the last record from the database 
		which is used to tell the user that a booking has been made.
	*/
	$sql = "select * from bookingtaxi order by bookingnumber desc limit 1";
	$result = mysqli_query($conn,$sql);
	
	
	/*
		prints a confirmation to the user informing that a booking has been made.
	
	*/

	while($row = mysqli_fetch_assoc($result))
	{
		echo "<p> <font color=lightgreen> Thank you! Your booking reference number is: ", "{$row['bookingnumber']}", ". You will be picked up front of your provided address at ", 
		"{$row['date']}", " on ", "{$row['time']}</font>";
	}
		
	
	
	
	mysqli_close($conn);

	
?>