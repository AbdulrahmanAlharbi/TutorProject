<?php
	include('session_admin.php');
	
	$username = $_SESSION['login_user'];
	
	//echo "Username is $username <br>";
	
	$localhost = 'localhost';
	$dusername = 'root';
	$dpassword = 'root';
	$database = 'tutordb';
	$connection = mysql_connect($localhost , $dusername , $dpassword);
	mysql_select_db($database, $connection);
	
	//Select Admin ID Code

	$que =  "SELECT AdminID FROM admin WHERE Username = '$username'";

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
			$AdminID = $row['AdminID'];
		}
	}
	//echo "AdminID = $AdminID";
	//End Select AdminID Code
	
	
	//Insert into Subject Code";
	if(!@mysql_connect($localhost, $dusername, $dpassword))
{
		 die('Unable to connect'); //or exit
}
else
{
	if(@mysql_select_db($database))
	{
		
	
		$courseID = mysql_real_escape_string($_POST["courseID"]);
		$courseName = mysql_real_escape_string($_POST["courseName"]);
		$subjectIDTake = mysql_real_escape_string($_POST["subjectIDTake"]);
		
		$db = "INSERT INTO course(courseID, courseName, AdminID, subjectID)"; 
		$db.= "VALUES('$courseID','$courseName','$AdminID', '$subjectIDTake')" ;
		$q = mysql_query($db);
		
		if($q)
		{
			//echo "Singup Successfully";
			header( "location: addCourse.php" );
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
//End insert into subject code
?>