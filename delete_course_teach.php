<?php
	require "master_student.php";
	
	$username = $_SESSION['login_user'];
	
	$tSID = $_POST['tSid'];
	$courseID = $_POST['courseID'];
	
	//echo "Tutor ID:  $tSID<br>Course ID: $courseID";

	
	$localhost = 'localhost';
	$dusername = 'root';
	$dpassword = 'root';
	$database = 'tutordb';
	$connection = mysql_connect($localhost , $dusername , $dpassword);
	mysql_select_db($database, $connection);
	
	$query =  "SELECT tSID, CourseID FROM less_than_one_course
				WHERE courseID = '$courseID'";

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
			$que2 =  "UPDATE student SET IsTutor = 0 WHERE SID ='$sid'";
			$record2 = mysql_query($que2) or print(mysql_error());		
		}
	}

	$que =  " DELETE FROM teach WHERE CourseID = '$courseID' AND SID = '$tSID'";
	$record = mysql_query($que) or print(mysql_error());
		
	if($record === FALSE)
	{
		echo "<script>
				alert('There is an error');
				window.location.href='http://localhost:8080/TutorProject/teatchingCourses.php';
				</script>";
		echo $record;
	}
		
	echo "<script>
			alert('The course has been deleted from your list successfully');
			window.location.href='http://localhost:8080/TutorProject/teatchingCourses.php';
		</script>";

	/*iterate over all the rows
	if($record === FALSE)
	{
		echo $record;
	}*/
	
	require "masterFooter.php";
?>