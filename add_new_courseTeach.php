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
			//$type = $_POST["type"];
			$sid = $_POST["sid"];
			
			$que1 = "select * from teach WHERE SID = '$sid'";
			$record = mysql_query($que1) or print(mysql_error());
			
			if($record === FALSE)
			{
				echo $record;
			}
			if(mysql_num_rows($record) > 0 )
			{
				while($row = mysql_fetch_array($record)) 
				{
				   
				   $sidTutor = $row['SID'];
				   $courseIDTutor = $row['CourseID'];
				   
				   if($sid == $sidTutor && $courseID == $courseIDTutor)
				   {
					   echo "<script>
								alert('You are already teach this course');
								window.location.href='http://localhost:8080/TutorProject/teatchingCourses.php';
							</script>";
				   }
				   else
				   {
					   $db = "INSERT INTO teach(SID, courseID)"; 
						$db.= "VALUES('$sid','$courseID')" ;
						$q = mysql_query($db);
						
						
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
			   } 
			}
		
			else
			{
				die('Unable to connect'); //or exit
			}
		
		}
	}

		
	require "masterFooter.php";
?>