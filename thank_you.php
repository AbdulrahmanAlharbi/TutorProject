<?php

	require "master.php";
	
	include('session_student.php');
	header( "refresh:5;url=http://localhost:8080/TutorProject/index_student.php" );
	
	
	echo "<h1>Your account has been created.</h1>
	   <h4> Thank you for registering with us. 
	   Your account has been created, and now you can use your email address and password created to log-in. 
	   You will be redirected back to the home page in 5 seconds. If not, click here! <a href='index_student.php'>Home</a></h4>";
	   
	require "masterFooter.php";
?> 