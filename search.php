<?php
	session_start();

	$returnObject;

	if(isset($_GET['submit'])) 
	{	
		$localhost = 'localhost';
		$dusername = 'root';
		$dpassword = 'root';
		$database = 'tutordb';
		$connection = mysql_connect($localhost , $dusername , $dpassword);
		mysql_select_db($database, $connection);

		$searchTarget = $_GET['searchTarget'];
		$searchTarget2 = $_GET['searchTarget2'];
		
		if($searchTarget != "")
		{
			/*$que = "SELECT DISTINCT s2.SID as tSid, s2.SFName as Tfname, s2.SLName as Tlname, 
								c.CourseID as courseID, c.CourseName as courseName, sub.SubjectID as subjectID, sub.SubjectName as subjectName
				FROM student s2, course c, subject sub, teach t
				WHERE c.SubjectID = sub.SubjectID AND
					  s2.SID = t.SID AND
					  t.CourseID = c.CourseID AND
					  c.SubjectID = sub.SubjectID AND
					  c.CourseName LIKE '%" . $searchTarget . "%' 
				ORDER BY sub.SubjectID, c.CourseName, s2.SFName";*/
				
				$que = "SELECT * FROM all_tutors WHERE CourseName LIKE '%" . $searchTarget . "%'";

				$record = mysql_query($que) or print(mysql_error());
				$_SESSION['record']=$record;
		}
				
		else if($searchTarget2 != "")
		{
			/*$que = "SELECT DISTINCT s2.SID as tSid, s2.SFName as Tfname, s2.SLName as Tlname, 
								c.CourseID as courseID, c.CourseName as courseName, sub.SubjectID as subjectID, sub.SubjectName as subjectName
				FROM student s2, course c, subject sub, teach t
				WHERE c.SubjectID = sub.SubjectID AND
					  s2.SID = t.SID AND
					  t.CourseID = c.CourseID AND
					  c.SubjectID = sub.SubjectID AND
					  (sub.SubjectName LIKE '%" . $searchTarget2 . "%' OR sub.SubjectID LIKE '%" . $searchTarget2 . "%')
				ORDER BY sub.SubjectName, c.CourseName, s2.SFName";*/
				
				$que = "SELECT * FROM all_tutors WHERE subjectName LIKE '%" . $searchTarget2 . "%' OR subjectID LIKE '%" . $searchTarget2 . "%'";

			$record = mysql_query($que) or print(mysql_error());
			$_SESSION['record']=$record;
		}
		
		if($searchTarget == "" && $searchTarget2 == "")
		{
			echo "<script>
					alert('You should enter at least one search method');
					window.location.href='http://localhost:8080/TutorProject/findTutor.php';
					</script>";
		}
	}


?>