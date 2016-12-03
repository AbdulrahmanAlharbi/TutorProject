<?php       
	require "master_student.php";
	
	$username = $_SESSION['login_user'];

	// serve the page normally.


	$localhost = 'localhost';
	$dusername = 'root';
	$dpassword = 'root';
	$database = 'tutordb';
	$connection = mysql_connect($localhost , $dusername , $dpassword);
	mysql_select_db($database, $connection);

	if (isset($username))
	{
		
		$password = $_POST['newPass'];
		
		$que =  "UPDATE login SET Password ='$password' WHERE Username = '$username'";
		$record = mysql_query($que) or print(mysql_error());
		//echo "<meta http-equiv='refresh' content = '0;url=adminProfile.php'>";

			echo "<script>
					alert('Your password has been changed successfully');
					window.location.href='http://localhost:8080/TutorProject/myProfile.php';
					</script>";

	//iterate over all the rows
	if($record === FALSE)

	echo $record;

	}
	
	require "masterFooter.php";
?>