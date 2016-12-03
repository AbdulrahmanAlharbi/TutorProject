<style>
.button {
    margin: auto;
    background-color: #ff3333; /* red */
    border: none;
    color: white;
    padding: 20px 61px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    cursor: pointer;
	 position:relative;
    float: left;
}

.button:hover {
    background-color: #19334d;
}
</style>
<style>
table {
    border-collapse: collapse;
    width: 70%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
tr:hover {background-color: #f5f5f5}
 
th {
    background-color: #4CAF50;
    color: white;
}
</style>

<?php
	
	require "master_student.php";
	
	$username = $_SESSION['login_user'];

?>

<div class="container">
<?php
	$localhost = 'localhost';
	$dusername = 'root';
	$dpassword = 'root';
	$database = 'tutordb';
	$connection = mysql_connect($localhost , $dusername , $dpassword);
	mysql_select_db($database, $connection);
	
	$connect = new mysqli($localhost, $dusername, $dpassword, $database);
	
	$username = $_SESSION['login_user'];
	$subjectID = $_POST["subject"];
	$courseID = $_POST["course"];
	$sid = $_POST["sid"];
	$tSid = $_POST["tSid"];

	

	//$mail =  $_SESSION['login_user'] ; 
	$que =  "SELECT s.SID as tSid, s.SFName as tfname, s.SLName as tlname, s.SEmail as tEmail, c.CourseID as courseID, c.CourseName as courseName, sub.SubjectID as subjectID
			 from student s, course c, subject sub, teach t
			 WHERE s.SID = t.SID AND
			 sub.SubjectID = c.SubjectID AND
			 c.CourseID = t.CourseID AND
			 sub.SubjectID = '$subjectID' AND
			 c.CourseID = '$courseID'";

	$record = mysql_query($que) or print(mysql_error());
	//echo $record;


	//iterate over all the rows
	if($record === FALSE)
	{
		echo $record;
	}
	if(mysql_num_rows($record) > 0 )
	{
	   // echo mysql_num_rows($record);
	   
		$counter = 0;
		
		echo "<table align='center' width='100%' height='100%'>";
		
		echo "<tr>";
		echo "<th>Course ID</th>";
		echo "<th>Course Name</th>";
		echo "<th>Subject ID</th>";
		echo "<th>Tutor</th>";
		echo "<th>Schedule</th>";
		echo "<th>Feedback</th>";
		echo "</tr>";

		while($row = mysql_fetch_array($record))
		{
		
		   
			$tSid = $row['tSid'];
			$tfname = $row['tfname'];
			$tlname = $row['tlname'];
			$tEmail = $row['tEmail'];
			$courseID = $row['courseID'];
			$courseName = $row['courseName'];
			$subjectID = $row['subjectID'];
			$counter++;
					
			echo "<tr>";
			echo "<td>".$courseID."</td>";
			echo "<td>".$courseName."</td>";
			echo "<td>".$subjectID."</td>";
			echo "<td>".$tfname." ".$tlname."</td>";
			echo "<td>". "
							<form action='scheduleTutor.php' method='post'>
							<input type='submit' value='Schedule Tutor'>
							<input type='hidden' name='tSid' id='tSid' value= $tSid>
							<input type='hidden' name='courseID' id='courseID' value= $courseID>
							<input type='hidden' name='tEmail' id='tEmail' value= $tEmail>
							<input type='hidden' name='tfname' id='tfname' value= $tfname>
							<input type='hidden' name='tlname' id='tlname' value= $tlname>
							</form>
			
			".  "</td>";
			echo "<td>". "<a href = 'view_feedback.php?Feedback=$row[tSid]'>Preview Feedback</a>".  "</td>";
			echo "</tr>";
				
		}
		echo "<h2>There are ($counter) Tutor ON $courseName</h2>";
		echo "</table>";	
		echo "</div>
			<div>
		  <br><br>
		  
	</div>

	<div class='container'>
	</div>";

	}
	
	else
	{
		echo "<h1>OOps sorry! It seams there is no tutor on your requested course</h1>";
	}
	
	
	/*$username = $_SESSION['login_user'];
	$subjectID = $_POST["subject"];
	$courseID = $_POST["course"];
	$sid = $_POST["sid"];
	$tSid = $_POST["tSid"];
	echo "Username = $username <br> Subject ID = $subjectID <br> Course ID = $courseID <br> Student ID = $sid <br> Tutor ID = $tSid";*/
?>
</div>

<?php
	require "masterFooter.php";
?>