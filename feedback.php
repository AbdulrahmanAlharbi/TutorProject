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
    width: 60%;
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
	
	$username = $_SESSION['login_user'];
	
	$tSid = $_POST['tSid'];
	$studentID = $_POST['studentID'];
	$tfname = mysql_real_escape_string($_POST['tfname']);
	$tlname = mysql_real_escape_string($_POST['tlname']);
	$courseID = $_POST['courseID'];
	$courseName = mysql_real_escape_string($_POST['courseName']);
	
	$localhost = 'localhost';
	$dusername = 'root';
	$dpassword = 'root';
	$database = 'tutordb';
	$connection = mysql_connect($localhost , $dusername , $dpassword);
	mysql_select_db($database, $connection);
	
	$que =  " SELECT s.SFName as sFname, s.SLName as sLname, s2.SFName as tFname, s2.SLName as tLname, fb.Comment as fComment, fb.Date as fDate, fr.Rate as fRate
			  FROM student s, student s2, feedback fb, feedback_rate fr, write_tb wf, preview p
			  WHERE s2.SID = '$tSid' AND
					s.SID = wf.SID AND
					s2.SID = p.SID AND
					fb.FeedID = fr.FeedID AND
					fb.FeedID = wf.FeedID AND
					fb.FeedID = p.FeedID ";

$record = mysql_query($que) or print(mysql_error());
//echo $record;
echo "<div style='background-image: url(assets/img/TutorBackground.jpg); background-repeat:no-repeat; height:100%'><br><br>";
	$space = str_repeat('&nbsp;', 5);
	
//iterate over all the rows
if($record === FALSE){
echo $record;

}
if(mysql_num_rows($record) > 0 ){
   // echo mysql_num_rows($record);
   
		$counter = 0;
	
    	echo "<div class='container'>";
		echo "<table>";
		

 while($row = mysql_fetch_array($record)) {
	   //echo mysql_num_rows($record);
       
	   $sFname = $row['sFname'];
	   $sLname = $row['sLname'];
	   $tFname = $row['tFname'];
	   $tLname = $row['tLname'];
	   $fComment = $row['fComment'];
	   $fDate = $row['fDate'];
	   $fRate = $row['fRate'];
	   
	   $counter++;
	   
			
		echo "<tr>";
		echo "<th><b>Written by:</b>".$space." ".$sFname." ".$sLname." ".$space." ".$space."<b>ON:</b>".$space." ".$fDate." ".$space." ".$space." ".$space." "."<b>Rate:</b>".$space." ".$fRate."</th>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>".$fComment."</td>";
		echo "</tr>";
			    
   }
 	echo "<h2>There are ($counter) comments about $tFname $tLname</h2>";
   		echo "</table>";
		
	echo "</div>
		   <div class='container'>
		   </div>";
}


else
{
	echo "<div class='container'>
			<h1>There are no comment about $tfname $tlname</h1>
		  </div>";
}
	
?>
<div style= height:40>

</div>
<div class="container">
<table>
	<form action="feedbackCode.php" method="post">
		<tr>
			<td colspan="5">
				<h3>You will write feedback about <?php echo $tfname." ". $tlname ."<br> ON ". $courseName; ?></h3>
			</td>
		</tr>
		
		<tr>
			<td colspan="5"><label><label style="color:red">*</label> Comment (should be no more than 250 characters):</label></td>
		</tr>
		
		<tr>
			<td colspan="5">
				<textarea name="comment" rows="4" col="250" required maxlength="250" style= width:400></textarea>
			</td>
		</tr>
		
		<tr>
			<td colspan="5">
				<h3>Please rate your tutor (5) is highly recommended</h3>
			</td>
		</tr>
		
		<tr>
			<td><input type="radio" name="rate" value="5" checked> 5</td>
			<td><input type="radio" name="rate" value="4"> 4</td>
			<td><input type="radio" name="rate" value="3"> 3</td>
			<td><input type="radio" name="rate" value="2"> 2</td>
			<td><input type="radio" name="rate" value="1"> 1</td>
		</tr>
		
		<tr>
			<td colspan="4"><button type="submit" class="btn btn-primary btn-block">Submit My Comment</button></td>
		</tr>
			<input type="hidden" name="tSid" id="tSid" value= "<?php echo $tSid; ?>">
			<input type="hidden" name="studentID" id="studentID" value= "<?php echo $studentID; ?>">
	</form>
</table>
</div>

<div style = height:40>

</div>

<?php
	echo "</div>";
	require "masterFooter.php";
?>