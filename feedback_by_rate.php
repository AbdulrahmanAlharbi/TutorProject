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
	
	$rate = $_GET['Rate'];
	
	$que =  "SELECT s.SID as tSID, s.SFName as tFName, s.SLName as tLName, TRUNCATE(AVG(fr.Rate),1) as rate
			 FROM student s, feedback f, feedback_rate fr, preview p
			 WHERE s.SID = p.SID AND
				  f.FeedID = fr.FeedID AND
			      f.FeedID = p.FeedID
			 GROUP BY s.SID
			 HAVING rate <= '$rate'
			 ORDER BY rate DESC";

	$record = mysql_query($que) or print(mysql_error());

	echo "<div style='background-image: url(assets/img/TutorBackground.jpg); background-repeat:no-repeat; height:100%'><br><br>";
	$space = str_repeat('&nbsp;', 5);
		
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
			echo "<th><b>Tutor Name</b></th>";
			echo "<th><b>Average Rate</b></th>";
			echo "<th><b>Preview Course</b></th>";
			echo "</tr>";
			

	 while($row = mysql_fetch_array($record)) {
		   //echo mysql_num_rows($record);
		   
		   $tutorID = $row['tSID'];
		   $tutorFName = $row['tFName'];
		   $tutorLname = $row['tLName'];
		   $tRate = $row['rate'];
		   
		   $counter++;
		   
				
			echo "<tr>";
			echo "<td>$tutorFName $tutorLname</td>";
			echo "<td>$tRate</td>";
			echo "<td><a href = 'view_courses.php?Preview=$tutorID'>View Courses</a></td>";
			echo "</tr>";
					
	   }
		echo "<h2>There are ($counter) Tutor with rate [$rate] and less</h2>";
			echo "</table>";
			
		echo "</div>
			   <div class='container'>
			   </div>";
	}


	else
	{
		echo "<div class='container'>
				<h1>There are no Tutor with rate [$rate] and less</h1>
			  </div>";
	}
	echo "<div style='height:100'></div><br><br></div>";
	
	require "masterFooter.php";
?>