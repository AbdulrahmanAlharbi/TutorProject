<style>
table {
    border-collapse: collapse;
    width: 70%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr{background-color: #f2f2f2}
tr:hover {background-color: #f5f5f5}
 
th {
    background-color: #4CAF50;
    color: white;
}
</style>
<?php
	require('search.php');
	require 'master.php';

	$searchTarget = $_GET['searchTarget'];	
	//echo "Search results for \"" . $searchTarget . "\"";	

	$record = $_SESSION['record'];

	if($record === FALSE){
		echo $record;
	}
	echo "<div style='background-image: url(assets/img/TutorBackground.jpg); background-repeat:no-repeat; height:100%'><br><br>";
	if(mysql_num_rows($record) > 0 ){
		
		echo "<div class='container'>";
   
		$counter = 0;
		if($searchTarget == "")
		{
			echo "<div><h2>Following are all tutors </h2><br></div>";
		}
		else
		{
			echo "<div><h2>Following is the searching result about [ $searchTarget ]</h2><br></div>";
		}
		
		echo "<table align='center'>
				<tr>
					<th><b>Course</b></th>
					<th><b>Subject ID</b></th>
					<th><b>Subject Name</b></th>
					<th><b>Tutor Name</b></th>
				</tr>";
		
		while($row = mysql_fetch_array($record)) {
			
			$tutorID = $row['tSid'];
			$courseID = $row['courseID'];
			$courseName = $row['courseName'];
			$subjectID = $row['subjectID'];
			$subjectName = $row['subjectName'];
			$Tfname = $row['Tfname'];
			$Tlname = $row['Tlname'];

			echo
				"<tr>
					<td>$courseName</td>
					<td>$subjectID</td>
					<td>$subjectName</td>
					<td><a href = 'tutorFeedback.php?Preview=$tutorID'>$Tfname $Tlname</a></td>
				</tr>";
		}
	}
	echo "</table></div><br><br></div>";
	
	require 'masterFooter.php';
	
?>