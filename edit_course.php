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
    width: 100%;
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

	require "master_admin.php";


?> 

<?php

	$username = $_SESSION['login_user'];

	$localhost = 'localhost';
	$dusername = 'root';
	$dpassword = 'root';
	$database = 'tutordb';
	$connection = mysql_connect($localhost , $dusername , $dpassword);
	mysql_select_db($database, $connection);

	if (isset($_GET['Edit']))
	{
		
		$courseID = $_GET['Edit'];
		$que = mysql_query("Select * FROM course WHERE courseID = '$courseID'");
		$row = mysql_fetch_array($que);
	}
	
	if (isset($_POST['subjectID']))
	{
		
			$subjectID = $_POST["subjectID"];
			$courseNewID = $_POST["courseID"];
			$courseOldID = $_POST["courseIDOld"];
			$courseName = $_POST["courseName"];
			
		
			$que1 =  "UPDATE course SET CourseID ='$courseNewID', CourseName ='$courseName' where CourseID='$courseOldID'";
			$record1 = mysql_query($que1) or print(mysql_error());
			
			
			echo "<script>
						alert('The course has been updated successfully');
						window.location.href='http://localhost:8080/TutorProject/addCourse.php';
					</script>";

	//iterate over all the rows
	if($record1 === FALSE)

	echo $record1;

	}


?>


	<div class="container">
		<form action="edit_course.php" method="post" enctype="multipart/form-data">
		<div class="col-md-6 sidebar">
			<table align="center" width="100%" height="100%">
				<tr>
					<td>Subject ID:</td>
					<td><input type="text" name="subjectID" id="subjectID" value="<?php echo $row['SubjectID']; ?>" class="form-control" required readonly>
					</td>
				</tr>
				<tr>
					<td>Course ID:</td>
					<td><input type="text" name="courseID" id="courseID" value="<?php echo $row['CourseID']; ?>" class="form-control" required>
						<input type="hidden" name="courseIDOld" id="courseIDOld" value="<?php echo $row['CourseID']; ?>">
					</td>
				</tr>
				
				<tr>
					<td>Course Name</td>
					<td><input type="text" name="courseName" id="courseName" value="<?php echo $row['CourseName']; ?>" class="form-control" required></td>
				</tr>
				
				
				<tr>
					<td><button type="submit" class="btn btn-primary btn-block">Update Course</button></td>
				</tr>
			</table>
		</div>
		</form>
	</div>
	
<?php
	require "masterFooter.php";
?>