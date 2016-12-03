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
    width: 40%;
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
$que =  " SELECT subjectID, subjectName FROM `subject`";

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
		echo "<th>Subject ID</th>";
		echo "<th>Subject Name</th>";
		echo "<th>Edit</th>";
		echo "<th>Delete</th>";
		echo "</tr>";

 while($row = mysql_fetch_array($record)) {
	   //echo mysql_num_rows($record);
       
	   $subjectID = $row['subjectID'];
       $subjectName = $row['subjectName'];
	   $counter++;
			
		echo "<tr>";
		echo "<td>".$subjectID."</td>";
 		echo "<td>".$subjectName."</td>";
		echo "<td>". "<a href = 'edit_subject.php?Edit=$row[subjectID]'>Edit</a>".  "</td>";
		echo "<td>". "<a href = 'delete_subject.php?Delete=$row[subjectID]' onclick='return checkDelete()'>Delete</a>
						<script language='JavaScript' type='text/javascript'>
							function checkDelete()
							{
								return confirm('Are you sure to delete this subject?');
							}
						</script>
				".  "</td>";
		echo "</tr>";
			    
   }
 	echo "<h2>There are ($counter) Subject</h2>";
   		echo "</table>";

}






?>
</div>
	
	
<div>
      <br><br>
      <div class="container" style = "background:#f2f2f2">   
          <form action="addSubjectCode.php" method="post">
          <table align="left">
				<h2>ADD NEW SUBJECT</h2>
				<tr>
					<td>Subject ID<td>
					<td><input type="text" name = "subjectID" required autocomplete="off" /></td>
				</tr>
				<tr>
					<td>Subject Name<td>
					<td><input type="text" name = "subjectName"required autocomplete="off" /></td>
				</tr>
				<tr>
					<td colspan="3"><button type="submit" class="button button-block" />Add New Subject</button><td>
				</tr>
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