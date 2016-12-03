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
?>
 


<div class="container">

<?php

	$username = $_SESSION['login_user'];

	$studentFirtName = $_POST['fn'];
	$studentLastName = $_POST['ln'];
	$studentEmail = $_POST['email'];
	$message = mysql_real_escape_string($_POST['message']);
	$tutorEmail = $_POST['tEmail'];
	$tutorFirstName = $_POST['tfname'];
	$tutorLastName = $_POST['tlname'];
	$response = "No";
	
	

	$localhost = 'localhost';
	$dusername = 'root';
	$dpassword = 'root';
	$database = 'tutordb';
	$connection = mysql_connect($localhost , $dusername , $dpassword);
	mysql_select_db($database, $connection);

	
	$db = "INSERT INTO messages(id, sFname, sLname, sEmail, rFname, rLname, rEmail, message, response)"; 
	$db.= "VALUES('', '$studentFirtName', '$studentLastName', '$studentEmail', '$tutorFirstName', '$tutorLastName', '$tutorEmail', '$message', '$response')" ;
	$q = mysql_query($db);
	
						
	if($q)
	{
		echo "<script>
					alert('Your message has been sent');
					window.location.href='http://localhost:8080/TutorProject/message.php';
				</script>";
		//header( "location: teatchingCourses.php" );
	}
	else
	{
		echo mysql_error();
	}
	
	
//	echo "Student First Name:  $studentFirtName<br>Student Last Name:  $studentLastName<br>Student Email:  $studentEmail
	//	  <br>Message:  $message<br>Tutor:  $tutorEmail<br>Tutor First Name:  $tutorFirstName<br>Tutor Last Name:  $tutorLastName";

?>
</div>
<?php
	require "masterFooter.php";
?>