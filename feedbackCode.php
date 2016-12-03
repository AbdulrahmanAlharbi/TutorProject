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
	
	$tSid = $_POST['tSid'];
	$studentID = $_POST['studentID'];
	$comment = mysql_real_escape_string($_POST['comment']);
	$timeDate = date("Y-m-d h:i:s");
	$rate = $_POST['rate'];
	
	
	$localhost = 'localhost';
	$dusername = 'root';
	$dpassword = 'root';
	$database = 'tutordb';
	$connection = mysql_connect($localhost , $dusername , $dpassword);
	mysql_select_db($database, $connection);
	
	
	if(!@mysql_connect($localhost, $dusername, $dpassword))
	{
		die('Unable to connect'); //or exit
	}
	else
	{
		if(@mysql_select_db($database))
		{
		
	
			$db = "INSERT INTO feedback(FeedID, Comment, Date)"; 
			$db.= "VALUES('','$comment','$timeDate')" ;
			$q = mysql_query($db);
			
			if($q)
			{
				
				$que =  "SELECT FeedID FROM feedback ORDER BY FeedID DESC LIMIT 1";
				$record = mysql_query($que) or print(mysql_error());
	
				if($record === FALSE)
				{
					echo $record;

				}
				if(mysql_num_rows($record) > 0 )
				{
					while($row = mysql_fetch_array($record)) 
					{
					//echo mysql_num_rows($record);	   
						$feedID = $row['FeedID'];
						
						//Add into feedback_rate table
						$db2 = "INSERT INTO feedback_rate(Rate, FeedID)"; 
						$db2.= "VALUES('$rate','$feedID')" ;
						$q2 = mysql_query($db2);
						
						//Add into write_tb table
						$db3 = "INSERT INTO write_tb(SID, FeedID)"; 
						$db3.= "VALUES('$studentID','$feedID')" ;
						$q3 = mysql_query($db3);
						
						//Add into 
						$db4 = "INSERT INTO preview(SID, FeedID)"; 
						$db4.= "VALUES('$tSid','$feedID')" ;
						$q4 = mysql_query($db4);
					}
				}
				//echo "Singup Successfully";
				echo "<script>
							alert('Your comment has been submitted');
							window.location.href='http://localhost:8080/TutorProject/takingCourses.php';
					  </script>";
				header( "location: feedback.php" );
			}
			else
			{
				echo mysql_error();

			} 
		}
	
		else
		{
			die('Unable to connect'); //or exit
		}
	
	}
	
	
	
	//echo "Tutor ID = $tSid<br>Student ID = $studentID<br>Comment =	$comment <br>Created at: $timeDate<br>Rate = $rate";
	
	require "masterFooter.php";
?>