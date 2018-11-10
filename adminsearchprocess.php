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
		searchRef($conn);
	
	
	function searchRef($conn)
		{
			$sql = "select * from bookingtaxi";

		
			$result = mysqli_query($conn,$sql);
	
	/*
		creates a html table to print all bookings to the admin
	
	
	*/
	echo "<table border='1'>";
	echo "<tr><td>bookingnumber</td><td>customername</td><td>phone</td><td>streetname</td><td>streetnumber</td><td>status</td><td>time</td><td>date</td><td>destination</td></tr>";
	while($row = mysqli_fetch_assoc($result))
	{
		echo "<tr><td>{$row['bookingnumber']}</td><td>{$row['customername']}</td><td>{$row['phone']}</td><td>{$row['streetname']}</td><td>{$row['streetnumber']}</td><td>{$row['status']}</td><td>{$row['time']}</td><td>{$row['date']}</td><td>{$row['destination']}</td></tr>";
	}
	echo "</table>";
		}
		
	
		// closes the connection to the database
		mysqli_close($conn);

?>