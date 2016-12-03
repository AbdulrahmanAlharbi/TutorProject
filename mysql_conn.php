<?php
	
	//Don't forget to change your database password here
	$con = mysqli_connect("localhost", "root", "root", "tutordb");
	
	if (mysqli_connect_error()) {
		echo "Failed to connect:".mysqli_connect_errno();
	}
?>


