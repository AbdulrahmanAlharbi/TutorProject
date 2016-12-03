<?php
	require "master_admin.php";
	
	$username = $_SESSION['login_user'];

	
	$localhost = 'localhost';
	$dusername = 'root';
	$dpassword = 'root';
	$database = 'tutordb';
	$connection = mysql_connect($localhost , $dusername , $dpassword);
	mysql_select_db($database, $connection);
	

	if (isset($_GET['Delete']))
	{
		
		$subjectID = $_GET['Delete'];
		
		
		$que =  " DELETE FROM subject WHERE subjectID = '$subjectID'";
		$record = mysql_query($que) or print(mysql_error());
		
		
		if($record === FALSE)
		{
			
			echo "<script>
						alert('The subject cannot be deleted becouse it is a foriegn key on another table');
						window.location.href='http://localhost:8080/TutorProject/addSubject.php';
					</script>";
		}
		
		
		echo "<script>
					alert('The subject has been deleted successfully');
					window.location.href='http://localhost:8080/TutorProject/addSubject.php';
				</script>";
	}

?>