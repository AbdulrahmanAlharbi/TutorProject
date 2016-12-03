<?php
	require "master_admin.php";
	
	$username = $_SESSION['login_user'];

	
	$localhost = 'localhost';
	$dusername = 'root';
	$dpassword = 'root';
	$database = 'tutordb';
	$connection = mysql_connect($localhost , $dusername , $dpassword);
	mysql_select_db($database, $connection);
	

	if (isset($_GET['Delete']))
	{
		
		$courseIDOriginal = $_GET['Delete'];

		$query =  "SELECT tSID, CourseID FROM less_than_one_course
					WHERE courseID = '$courseIDOriginal'";

		$result = mysql_query($query) or print(mysql_error());
		

		if($result === FALSE){
		echo $result;

		}
		if(mysql_num_rows($result) > 0 )
		{

			while($row = mysql_fetch_array($result)) 
			{
			   			   
				$sid = $row['tSID'];
				$course = $row['CourseID'];
				$tutor = 0;
				$que2 =  "UPDATE student SET IsTutor = 0 WHERE SID ='$sid'";
				$record2 = mysql_query($que2) or print(mysql_error());		
			}
		}
		
		$que =  " DELETE FROM course WHERE courseID = '$courseIDOriginal'";
		$record = mysql_query($que) or print(mysql_error());
		
		if($record === FALSE)
		{
			echo "<script>
					alert('The course cannot be deleted');
					window.location.href='http://localhost:8080/TutorProject/addCourse.php';
				</script>";
		}
		
		echo "<script>
					alert('The course has been deleted successfully');
					window.location.href='http://localhost:8080/TutorProject/addCourse.php';
				</script>";
	}

	//iterate over all the rows
	if($record === FALSE)
	{
		echo $record;
	}
?>