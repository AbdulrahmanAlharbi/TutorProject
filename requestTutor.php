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
    width: 80%;
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
//if ($connection->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//} 

			$connect = new mysqli($localhost, $dusername, $dpassword, $database);

			if ($connect->connect_error) 
			{
				die("Connection failed: " . $connect->connect_error);
			}

			$query = "Select * FROM `course`";
			$res = mysqli_query($connect, $query);

			$options = "";
			while($row = mysqli_fetch_array($res))
			{
				$options = $options."<option>$row[1]</option>";
			}


 
$que =  " SELECT DISTINCT s.SID as sid, s.SFName as fname, s.SLName as lname, s2.SID as tSid, s2.SFName as Tfname, s2.SLName as Tlname, 
				c.CourseID as courseID, c.CourseName as courseName, sub.SubjectID as subjectID, s2.SEmail as tEmail
		  FROM student s, student s2, course c, taughtby tby, subject sub
		  WHERE s.SID = tby.SID_1 AND
			    s2.SID = tby.TaughtBySID_2 AND
			    c.CourseID = tby.CourseID AND
			    c.SubjectID = sub.SubjectID AND
				s.Username = '$username'";

$record = mysql_query($que) or print(mysql_error());

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
		echo "<th>Tutor</th>";
		echo "<th>Contact Tutor</th>";
		echo "</tr>";

 while($row = mysql_fetch_array($record)) {
	   //echo mysql_num_rows($record);
       
	   $tSid = $row['tSid'];
	   $sid = $row['sid'];
	   $fname = $row['fname'];
	   $lname = $row['lname'];
	   $tfname = $row['Tfname'];
	   $tlname = $row['Tlname'];
	   $courseID = $row['courseID'];
       $courseName = $row['courseName'];
	   $subjectID = $row['subjectID'];
	   $tEmail = $row['tEmail'];
	   $counter++;
			
		echo "<tr>";
		echo "<td>".$courseID."</td>";
 		echo "<td>".$courseName."</td>";
		echo "<td>".$subjectID."</td>";
		echo "<td>".$tfname." ".$tlname."</td>";
		echo "<td>"."<a href='mailto:$tEmail'>Send Email</a>"."</td>";
		echo "</tr>";
			    
   }
 	echo "<h2>$fname $lname There are ($counter) course you take</h2>";
   		echo "</table>";
		
	echo "</div>
	
	
<div>
      <br><br>
      
</div>

<div class='container'>
</div>";

}


else
{
	echo "<h1>You do not have any course <a href='requestTutor.php'>Click here to request tutor</a></h1>";
}





?>
</div>
<br><br>	
	
<html>
<div>
      <br><br>
      <div class="container" style = "background:#f2f2f2">   
          <form action="searchForTutor.php" method="post">
          <table align="left">
				<h2>SEARCH FOR TUTOR</h2>
				
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
					<td colspan="3"><button type="submit" class="button button-block" />Search For Tutor</button></td>
				</tr>
          </table>
				<input type="hidden" name="sid" id="sid" value="<?php echo $sid; ?>">
				<input type="hidden" name="tSid" id="tSid" value="<?php echo $tSid; ?>">
          </form>
	   </div>
</div>

<br><br>

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