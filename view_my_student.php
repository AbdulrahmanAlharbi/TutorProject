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

	$tutorID = $_POST['tSid']; 
	$courseIDOrignal = $_POST['courseID'];
	
	//echo "TID: $tutorID<br>COurseID: $courseIDOrignal";
	
	$localhost = 'localhost';
	$dusername = 'root';
	$dpassword = 'root';
	$database = 'tutordb';
	$connection = mysql_connect($localhost , $dusername , $dpassword);
	mysql_select_db($database, $connection);

	$que = "SELECT DISTINCT s.SFName as tFName, s.SLName as tLName, s2.SFName as sFName, s2.SLName as sLName, s2.SEmail as email,
							co.CourseID as courseID, co.CourseName as courseName, sub.SubjectID as subjectID, sub.SubjectName as subjectName
			FROM student s, student s2, subject sub, course co, teach t, requesttutoron r, taughtby tby
			WHERE s.SID = t.SID AND
			t.CourseID = co.CourseID AND
			s.SID = tby.TaughtBySID_2 AND
			s2.SID = tby.SID_1 AND
			s2.SID = r.SID AND 
			r.CourseID = co.CourseID AND
			co.SubjectID = sub.SubjectID AND
			co.CourseID = '$courseIDOrignal' AND
			s.Username = '$username'";

	$record = mysql_query($que) or print(mysql_error());

	if($record === FALSE)
	{
		echo $record;
	}
	if(mysql_num_rows($record) > 0 )
	{   
		$counter = 0;
		
			echo "<div class='container'><table align='center' width='100%' height='100%'>";
			
			echo "<tr>";
			echo "<th>Course ID</th>";
			echo "<th>Course Name</th>";
			echo "<th>Subject ID</th>";
			echo "<th>Student Name</th>";
			echo "<th>Contact Student</th>";
			echo "</tr>";

	 while($row = mysql_fetch_array($record)) {
		   
		   
		   
		   $tfname = $row['tFName'];
		   $tlname = $row['tLName'];
		   $sfname = $row['sFName'];
		   $slname = $row['sLName'];
		   $sEmail = $row['email'];
		   $courseID = $row['courseID'];
		   $courseName = $row['courseName'];
		   $subjectID = $row['subjectID'];
		   $counter++;
				
			echo "<tr>";
			echo "<td>".$courseID."</td>";
			echo "<td>".$courseName."</td>";
			echo "<td>".$subjectID."</td>";
			echo "<td>".$sfname." ".$slname."</td>";
			echo "<td>"."<a href='mailto:$sEmail'>Send Email</a>"."</td>";
			echo "</tr>";
					
	   }
		echo "<h2>$tfname $tlname There are ($counter) student you teach</h2>";
			echo "</table>";
			}


	else
	{
		echo "<h1>You do not have any student taking your course</h1>";
	}
	echo "</div><br><br>	
		  <div class='container'>
		  </div>";
?>

<?php
	require "masterFooter.php";
?>