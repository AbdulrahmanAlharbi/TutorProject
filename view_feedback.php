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
	require "master_student.php";
	
	$localhost = 'localhost';
	$dusername = 'root';
	$dpassword = 'root';
	$database = 'tutordb';
	$connection = mysql_connect($localhost , $dusername , $dpassword);
	mysql_select_db($database, $connection);
	
	if (isset($_GET['Feedback']))
	{
		
		$TutorID = $_GET['Feedback'];
		$que =  " SELECT s.SFName as sFname, s.SLName as sLname, s2.SFName as tFname, s2.SLName as tLname, fb.Comment as fComment, fb.Date as fDate, fr.Rate as fRate
			  FROM student s, student s2, feedback fb, feedback_rate fr, write_tb wf, preview p
			  WHERE s2.SID = '$TutorID' AND
					s.SID = wf.SID AND
					s2.SID = p.SID AND
					fb.FeedID = fr.FeedID AND
					fb.FeedID = wf.FeedID AND
					fb.FeedID = p.FeedID ";

		$record = mysql_query($que) or print(mysql_error());
		
		$space = str_repeat('&nbsp;', 5);
			
		if($record === FALSE)
		{
			echo $record;
		}
		if(mysql_num_rows($record) > 0 )
		{
		   
			$counter = 0;
			
			echo "<div class='container'>";
			echo "<table>";
			
			while($row = mysql_fetch_array($record)) 
			{
			
			   $sFname = $row['sFname'];
			   $sLname = $row['sLname'];
			   $tFname = $row['tFname'];
			   $tLname = $row['tLname'];
			   $fComment = $row['fComment'];
			   $fDate = $row['fDate'];
			   $fRate = $row['fRate'];
			   
			   $counter++;
			   
					
				echo "<tr>";
				echo "<th><b>Written by:</b>".$space." ".$sFname." ".$sLname." ".$space." ".$space."<b>ON:</b>".$space." ".$fDate." ".$space." ".$space." ".$space." "."<b>Rate:</b>".$space." ".$fRate."</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>".$fComment."</td>";
				echo "</tr>";
						
			}
			
			echo "<h2>There are ($counter) comments about $tFname $tLname</h2>";
			echo "</table>";
				
			echo "</div>
				   <div class='container'>
				   </div>";
		}

		else
		{
			echo "<div class='container'>
					<h1>There are no comment </h1>
				  </div>";
		}
		echo "<br><div class='container'><a href='requestTutor.php'><< Back</a></div><br>";
	}
	
	require "masterFooter.php";
?>