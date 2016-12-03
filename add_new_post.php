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
    width: 50%;
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
	include_once('mysql_conn.php');
	require "master_student.php";
	
	$username = $_SESSION['login_user'];
	
	$localhost = 'localhost';
	$dusername = 'root';
	$dpassword = 'root';
	$database = 'tutordb';
	$connection = mysql_connect($localhost , $dusername , $dpassword);
	mysql_select_db($database, $connection);
	
	$que =  "Select * from student where Username = '$username'";

	$record = mysql_query($que) or print(mysql_error());
	//echo $record;


	//iterate over all the rows
	if($record === FALSE){
		echo $record;

	}
	if(mysql_num_rows($record) > 0 )
	{
		while($row = mysql_fetch_array($record))
		{
			$sid = $row['SID'];
			$fname = $row['SFName'];
			$lname = $row['SLName'];
			$type = $row['IsTutor'];
					
	   }
	   if($type == 1)
	   {
			echo "<h2 align='center'>$fname $lname<h3 align='center'>You are already registered as a tutor <a href='teatchingCourses.php'>Click Here</a> to view your courses</h3></h2>";
	   }
	   else
	   {
		   $type = "1";
?>

<!-- This file is for loading subjects and correlated courses from the database dynamically-->

<html>
<div>
      <br><br>
      <div class="container" style = "background:#f2f2f2">   
          <form action="applyForTutoring.php" method="post">
          <table align="left">
				<h2>ADD NEW COURSE TO TEACH</h2>
				
				<tr>
					<td>Choose Subject</td>
					<td>
						<div class="subject">
							<select name="subject" onchange="getSubjectId(this.value);">
							<option value="">Please Select Subject</option>
							<?php
								$query = "SELECT * FROM subject";
								$results = mysqli_query($con, $query);
								
								foreach ($results as $subject) {
								?>
								<option value="<?php echo $subject['SubjectID']; ?>"><?php echo $subject['SubjectName']; ?></option>
								<?php 
									}
								?>
							</select>
						</div>
					</td>
				</tr>
				
				<tr>
					<td>Choose Course</td>
					<td>
						<div class="course">
							<select name="course" id="courseList">
								<option>Please Select Course</option>
							</select>
						</div>
					</td>
				</tr>
				
				<tr>
					<td colspan="3"><button type="submit" class="button button-block" />Add New Course To TEACH</button></td>
				</tr>
          </table>
				<input type="hidden" name="type" id="type" value="<?php echo $type; ?>">
				<input type="hidden" name="sid" id="sid" value="<?php echo $sid; ?>">
				
          </form>
	   </div>
</div>

<br><br>

<?php
   }
}
?>	

<div class="container">
</div>
</html>




<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>

<script>
	function getSubjectId(val) {
		$.ajax({
			type: "POST",
			url: "getdata.php",
			data: "SubjectID=" + val,
			success: function(data) {
				$("#courseList").html(data);
			}
		});
	}	
</script>

<?php
	require "masterFooter.php";
?>