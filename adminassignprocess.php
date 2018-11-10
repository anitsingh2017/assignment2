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

		// saves the reference number using post
	$assignNum = $_POST["refNum"];
	
	// calls the searchRef function passing assignNum and the connection as the parameter
	searchRef($assignNum,$conn);	
	

	function searchRef($assignNum,$conn)
		{
			// selects * from the table if the reference number is found in the table
			$sql = "select * from bookingtaxi where bookingNumber ='$assignNum'";
			$result = mysqli_query($conn,$sql);
			
			// if the found results are more than zero then the program run into the method
			if(mysqli_num_rows($result)>0)
			{

				// updates the database if the reference is found and the status is assigned
				$sql = "UPDATE bookingtaxi set status='assigned' where status='unassigned' and bookingNumber ='$assignNum'";
				mysqli_query($conn,$sql);
				
				// prints to the admin that a booking has been assigned with the provided reference number
						echo "<font color='green'>The booking request $assignNum has been properly assigned</font>";	
					
			}
			else 
			{
				// prints to the admin that no results were found with the given reference number
				echo "<font color='red'> No booking found with the reference number $assignNum </font>";
				
			}
		}
		
		
		mysqli_close($conn);
?>