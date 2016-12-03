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
	include_once('mysql_conn.php');
	require "master_student.php";
?>
 


<div class="container">

<?php

$username = $_SESSION['login_user'];

// serve the page normally.


$localhost = 'localhost';
$dusername = 'root';
$dpassword = 'root';
$database = 'tutordb';
$connection = mysql_connect($localhost , $dusername , $dpassword);
mysql_select_db($database, $connection);

$que =  " SELECT s.SID as sid, s.SFName as 'fname', s.SLName as 'lname', c.CourseID as 'courseID', c.CourseName as 'courseName', sub.SubjectID as 'subjectID', s.Username
		  FROM student s, course c, subject sub, teach t
		  WHERE s.SID = t.SID AND
				t.CourseID = c.CourseID AND
				c.SubjectID = sub.SubjectID AND
				s.Username = '$username'";

$record = mysql_query($que) or print(mysql_error());


//iterate over all the rows
if($record === FALSE){
echo $record;

}
if(mysql_num_rows($record) > 0 ){
   
		$counter = 0;
	
    	echo "<table align='center' width='100%' height='100%'>";
		
		echo "<tr>";
		echo "<th>Course ID</th>";
		echo "<th>Course Name</th>";
		echo "<th>Subject ID</th>";
		echo "<th>View My Student</th>";
		echo "<th>Delete</th>";
		echo "</tr>";

 while($row = mysql_fetch_array($record)) {
       
	   
	   $sid = $row['sid'];
	   $fname = $row['fname'];
	   $lname = $row['lname'];
	   $courseID = $row['courseID'];
       $courseName = $row['courseName'];
	   $subjectID = $row['subjectID'];
	   $counter++;
			
		echo "<tr>";
		echo "<td>".$courseID."</td>";
 		echo "<td>".$courseName."</td>";
		echo "<td>".$subjectID."</td>";
		echo "<td>". "<form action='view_my_student.php' method='post' >
							<input type='submit' value='View My Student'>
							<input type='hidden' name='tSid' id='tSid' value= '$sid'>
							<input type='hidden' name='courseID' id='courseID' value= '$courseID'>
						</form>".  
			 "</td>";
		echo "<td>". "<form action='delete_course_teach.php' method='post' >
							<input type='submit' value='Delete' onclick='return checkDelete();'>
							<input type='hidden' name='tSid' id='tSid' value= '$sid'>
							<input type='hidden' name='courseID' id='courseID' value= '$courseID'>
						</form>
						<script language='JavaScript' type='text/javascript'>
							function checkDelete()
							{
								return confirm('Are you sure to delete this course?');
							}
						</script>".  
			  "</td>";
		echo "</tr>";
			    
   }
 	echo "<h2>$fname $lname There are ($counter) course you teach</h2>";
   		echo "</table>";
?>

<div>
      <br><br>
      <div class="container" style = "background:#f2f2f2">   
          <form action="add_new_courseTeach.php" method="post">
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
								<option value="">Please Select Course</option>
							</select>
						</div>
					</td>
				</tr>
				
				<tr>
					<td colspan="3"><button type="submit" class="button button-block" />Add New Course To TEACH</button></td>
				</tr>
          </table>
				<input type="hidden" name="sid" id="sid" value="<?php echo $sid; ?>">
          </form>
	   </div>
</div>

<?php
}


else
{
	echo "<h1>You do not have any course to teach <a href='add_new_post.php'>Click here to apply</a></h1>";
}


?>
</div>
<br><br>	
	


<div class="container">
</div>


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