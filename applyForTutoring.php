<?php
	//include_once "add_new_post.php";
	
	require "master_student.php";
	
	$username = $_SESSION['login_user'];
	
	$localhost = 'localhost';
	$dusername = 'root';
	$dpassword = 'root';
	$database = 'tutordb';
	$connection = mysql_connect($localhost , $dusername , $dpassword);
	mysql_select_db($database, $connection);
	
	if(!@mysql_connect($localhost, $dusername, $dpassword))
	{
		die('Unable to connect'); //or exit
	}
	else
	{
		if(@mysql_select_db($database))
		{
			
			
			$subjectID = $_POST["subject"];
			$courseID = $_POST["course"];
			$type = $_POST["type"];
			$sid = $_POST["sid"];
				
			$db = "INSERT INTO teach(SID, courseID)"; 
			$db.= "VALUES('$sid','$courseID')" ;
			$q = mysql_query($db);
			
			$que1 = "UPDATE student SET isTutor ='$type' WHERE Username = '$username'";
			$record = mysql_query($que1) or print(mysql_error());
			
			if($q)
			{
				//echo "Add Course Successfully";
				header( "location: teatchingCourses.php" );
			}
			else
			{
				echo mysql_error();

			} 
		}
		
		else
		{
			die('Unable to connect'); //or exit
		}
		
	}

	
	require "masterFooter.php";
?>