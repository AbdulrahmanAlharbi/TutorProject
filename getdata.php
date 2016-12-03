<?php
	include_once "mysql_conn.php";
	include_once "add_new_post.php";
	
	if (!empty($_POST["SubjectID"])) {
		$subjectID = $_POST["SubjectID"];
		$query = "SELECT * FROM course WHERE SubjectID = '".$subjectID."'";
		$results = mysqli_query($con, $query);
		
		foreach ($results as $course) {
			?>
			<option value="<?php echo $course["CourseID"]; ?>"><?php echo $course["CourseName"]; ?></option>
			<?php
		}
	}
?>