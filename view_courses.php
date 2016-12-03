<style>
table {
    border-collapse: collapse;
    width: 60%;
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
	require "master.php";
	
	$localhost = 'localhost';
	$dusername = 'root';
	$dpassword = 'root';
	$database = 'tutordb';
	$connection = mysql_connect($localhost , $dusername , $dpassword);
	mysql_select_db($database, $connection);
	
	$tutorSID = $_GET['Preview'];
	
	$que =  "SELECT s.SFName as tFName, s.SLName as tLName, co.CourseName courseName, sub.SubjectID as subjectID, sub.SubjectName as subjectName
			FROM student s, teach t, course co, subject sub
			WHERE s.SID = t.SID AND
				  t.CourseID = co.CourseID AND
				  co.SubjectID = sub.SubjectID AND
				  s.SID = '$tutorSID'";

	$record = mysql_query($que) or print(mysql_error());

	$space = str_repeat('&nbsp;', 5);
	
	echo "<div style='background-image: url(assets/img/TutorBackground.jpg); background-repeat:no-repeat; height:600'><br><br>";
		
	//iterate over all the rows
	if($record === FALSE)
	{
		echo $record;
	}
	if(mysql_num_rows($record) > 0 )
	{
	   
			$counter = 0;
		
			echo "<div class='container'>";
			echo "<table align='center'>";
			echo "<tr>";
			echo "<th><b>Course Name</b></th>";
			echo "<th><b>Subject ID</b></th>";
			echo "<th><b>Subject Name</b></th>";
			echo "</tr>";
			

	 while($row = mysql_fetch_array($record)) {
		   //echo mysql_num_rows($record);
		   
		   $tutorFName = $row['tFName'];
		   $tutorLname = $row['tLName'];
		   $courseName = $row['courseName'];
		   $subjectID = $row['subjectID'];
		   $subjectName = $row['subjectName'];
		   
		   $counter++;
		   
				
			echo "<tr>";
			echo "<td>$courseName</td>";
			echo "<td>$subjectID</td>";
			echo "<td>$subjectName</td>";
			echo "</tr>";
					
	   }
		echo "<h2>$tutorFName $tutorLname teach ($counter) courses</h2>";
			echo "</table>";
			
		echo "</div>
			   <div class='container'>
			   </div>";
	}


	else
	{
		echo "<div class='container'>
				<h1>Opps! this tutor does not teach any course at this time</h1>
			  </div>";
	}
	echo "</div>";	
	require "masterFooter.php";
?>