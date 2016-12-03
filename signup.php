<?php

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = 'root';

if(!@mysql_connect($mysql_host, $mysql_user, $mysql_password))
{
		 die('Unable to connect'); //or exit
}
else
{
	if(@mysql_select_db('tutordb'))
	{

	$first = mysql_real_escape_string($_POST["fn"]);
	$last = mysql_real_escape_string($_POST["ln"]);
	$email = mysql_real_escape_string($_POST["email"]);
	$isTutor = "0";
	$type = "Student";
	$username = mysql_real_escape_string($_POST["username"]);
	$password = mysql_real_escape_string($_POST["pass"]);
 
 
		$db = "INSERT INTO login (Username, Password, Type) VALUES ('$username','$password','$type') " ;
		$q = mysql_query($db);
		
		$db2 = "INSERT INTO student (SID, SFName, SLName, SEmail, IsTutor, Username) VALUES ('','$first','$last','$email','$isTutor','$username') " ;
 		$q2 = mysql_query($db2);
		
		if($q && $q2)
		{
				//echo "Singup Successfully";
				echo "<script>
						alert('Your account has been created Please use your username and password to login');
						window.location.href='http://localhost:8080/TutorProject/login.php';
					</script>";
			
				//header( "location: login.php" );
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
 
?>
