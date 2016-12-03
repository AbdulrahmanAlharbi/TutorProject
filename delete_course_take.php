<?php
	require "master_student.php";
	
	$username = $_SESSION['login_user'];
	
	$tSid = $_POST['tSid'];
	$studentID = $_POST['studentID'];
	$courseID = $_POST['courseID'];
	
	$localhost = 'localhost';
	$dusername = 'root';
	$dpassword = 'root';
	$database = 'tutordb';
	$connection = mysql_connect($localhost , $dusername , $dpassword);
	mysql_select_db($database, $connection);
	
	
	//echo "Tutor ID: $tSid<br>Student ID: $studentID<br>Course ID: $courseID";
	
	$que =  "DELETE FROM requesttutoron WHERE CourseID = '$courseID' AND SID = '$studentID'";
	$record = mysql_query($que) or print(mysql_error());
	
	$que2 =  "DELETE FROM taughtby WHERE SID_1 = '$studentID' AND TaughtBySID_2 = '$tSid'";
	$record2 = mysql_query($que2) or print(mysql_error());
		
	if($record === FALSE || $record2 === FALSE)
	{
		echo "<script>
			alert('There is an error');
			window.location.href='http://localhost:8080/TutorProject/takingCourses.php';
			</script>";
	}
		
		echo "<script>
					alert('The course has been deleted from your taking course list successfully');
					window.location.href='http://localhost:8080/TutorProject/takingCourses.php';
				</script>";
	
	require "masterFooter.php";
?>