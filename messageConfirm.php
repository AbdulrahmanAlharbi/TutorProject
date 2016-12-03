<?php
	
	require "master_student.php";
	
	$username = $_SESSION['login_user'];

	$localhost = 'localhost';
	$dusername = 'root';
	$dpassword = 'root';
	$database = 'tutordb';
	$connection = mysql_connect($localhost , $dusername , $dpassword);
	mysql_select_db($database, $connection);
	
	if (isset($_GET['Confirm']))
	{
		$mID = $_GET['Confirm'];
		$que =  "UPDATE messages SET response ='Yes' where id='$mID'";
		$record = mysql_query($que) or print(mysql_error());
		
		echo "<script>
					alert('The massage has been confirmed successfully');
					window.location.href='http://localhost:8080/TutorProject/message.php';
				</script>";

		if($record === FALSE)
		{
			echo $record;
		}
	}

	require "masterFooter.php";
?>