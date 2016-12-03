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
	require "master_admin.php";
?>
 


<div class="container">

<?php

$username = $_SESSION['login_user'];


$localhost = 'localhost';
$dusername = 'root';
$dpassword = 'root';
$database = 'tutordb';
$connection = mysql_connect($localhost , $dusername , $dpassword);
mysql_select_db($database, $connection);


$que =  " SELECT courseID, courseName, subjectID FROM `course`";
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
		echo "<th>Edit</th>";
		echo "<th>Delete</th>";
		echo "</tr>";

 while($row = mysql_fetch_array($record)) {
       
	   $courseID = $row['courseID'];
       $courseName = $row['courseName'];
	   $subjectID = $row['subjectID'];
	   $counter++;
			
		echo "<tr>";
		echo "<td>".$courseID."</td>";
 		echo "<td>".$courseName."</td>";
		echo "<td>".$subjectID."</td>";
		echo "<td>". "<a href = 'edit_course.php?Edit=$row[courseID]'>Edit</a>".  "</td>";
		echo "<td>". "<a href = 'delete_course.php?Delete=$row[courseID]' onclick='return checkDelete()'>Delete</a>
						<script language='JavaScript' type='text/javascript'>
							function checkDelete()
							{
								return confirm('Are you soure to delete this course');
							}
						</script>"."</td>";
		echo "</tr>";
			    
   }
 	echo "<h2>There are ($counter) course</h2>";
   		echo "</table>";

}

	$connect = new mysqli($localhost, $dusername, $dpassword, $database);

			if ($connect->connect_error) 
			{
				die("Connection failed: " . $connect->connect_error);
			}

			$query = "Select * FROM `subject`";
			$res = mysqli_query($connect, $query);

			$options = "";
			while($row = mysqli_fetch_array($res))
			{
				$options = $options."<option>$row[0]</option>";
			}




?>
</div>
	
	
<div>
      <br><br>
      <div class="container" style = "background:#f2f2f2">   
          <form action="addCourseCode.php" method="post">
          <table align="left">
				<h2>ADD NEW COURSE</h2>
				<tr>
					<td>Choose Subject<td>
					<td><select name="subjectIDTake" id="subjectIDTake"><?php echo $options; ?></select></td>
				</tr>
				<tr>
					<td>Course ID<td>
					<td><input type="text" name = "courseID"required autocomplete="off" /></td>
				</tr>
				<tr>
					<td>course Name<td>
					<td><input type="text" name = "courseName"required autocomplete="off" /></td>
				</tr>
				<tr>
					<td colspan="3"><button type="submit" class="button button-block" />Add New Course</button><td>
				</tr>
          </table>
          </form>
	   </div>
</div>

<div class="container">
</div>

<?php
	require "masterFooter.php";
?>