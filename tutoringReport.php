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
    width: 90%;
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
 

<div style = "background:#f2f2f2">

</div>

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


//$mail =  $_SESSION['login_user'] ; 
$que =  "SELECT DISTINCT s.SFName as tutor, s.SEmail as tEmail, s2.SFName as student, s2.SEmail as sEmail, co.CourseName as course, sub.SubjectName as subject
		FROM student s, student s2, subject sub, course co, teach t, requesttutoron r, taughtby tby
		WHERE s.SID = t.SID AND
        t.CourseID = co.CourseID AND
        s.SID = tby.TaughtBySID_2 AND
        s2.SID = tby.SID_1 AND
        s2.SID = r.SID AND 
        r.CourseID = co.CourseID AND
        co.SubjectID = sub.SubjectID
		ORDER BY s2.SFName, s.SFName, sub.SubjectID, co.CourseName";
		

$record = mysql_query($que) or print(mysql_error());
//echo $record;


//iterate over all the rows
if($record === FALSE){
echo $record;

}
if(mysql_num_rows($record) > 0 ){
   // echo mysql_num_rows($record);
   
		$counter = 0;
	
    	echo "<table align='center' width='100%' height='100%'>";
		
		echo "<tr>";
		echo "<th>Student</th>";
		echo "<th>Tutor</th>";
		echo "<th>Course Name</th>";
		echo "<th>Subject</th>";
		echo "<th>Contact Tutor</th>";
		echo "<th>Contact Student</th>";
		echo "</tr>";

 while($row = mysql_fetch_array($record)) {
	   //echo mysql_num_rows($record);
       
	   $student = $row['student'];
       $tutor = $row['tutor'];
	   $sEmail = $row['sEmail'];
       $tEmail = $row['tEmail'];
	   $course = $row['course'];
	   $subject = $row['subject'];
	   $counter++;
			
		echo "<tr>";
		echo "<td>".$student."</td>";
 		echo "<td>".$tutor."</td>";
		echo "<td>".$course."</td>";
		echo "<td>".$subject."</td>";
		echo "<td>". "<a href = 'mailto:$tEmail'>Contact Tutor</a>".  "</td>";
		echo "<td>". "<a href = 'mailto:$sEmail'>Contact Student</a>".  "</td>";
		echo "</tr>";
			    
   }
 	echo "<h2>There are ($counter) tutoring activites</h2>";
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
</div>	

<?php
	require "masterFooter.php";
?>