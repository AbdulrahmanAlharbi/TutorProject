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
	
	require "master_student.php";
	
	$username = $_SESSION['login_user'];

	$localhost = 'localhost';
	$dusername = 'root';
	$dpassword = 'root';
	$database = 'tutordb';
	$connection = mysql_connect($localhost , $dusername , $dpassword);
	mysql_select_db($database, $connection);
	
	$db =  " SELECT * from student where Username = '$username'";
	$q = mysql_query($db) or print(mysql_error());
	
	if($q === FALSE)
	{
		echo $q;
	}
	if(mysql_num_rows($q) > 0 )
	{
	   
		while($rows = mysql_fetch_array($q)) 
		{
			$email = $rows['SEmail'];
		}
	}


	else
	{
		echo mysql_error();
	}
	
	
	$que =  " SELECT * from messages where sEmail = '$email' OR rEmail = '$email'";
	$record = mysql_query($que) or print(mysql_error());
	
	if($record === FALSE)
	{
		echo $record;
	}
	if(mysql_num_rows($record) > 0 )
	{
	   
		$counter = 0;
		
		echo "<div class='container'><table align='center' width='100%' height='100%'>";
		
		echo "<tr>";
		echo "<th>Sender</th>";
		echo "<th>Sender Email</th>";
		echo "<th>Receiver</th>";
		echo "<th>Receiver Email</th>";
		echo "<th>Message</th>";
		echo "<th>Confirmed Status</th>";
		echo "<th>Confirm</th>";
		echo "<th>Respose</th>";
		echo "</tr>";

		while($row = mysql_fetch_array($record)) 
		{
			$id = $row['id'];
			$sfname = $row['sFName'];
			$slname = $row['sLName'];
			$sEmail = $row['sEmail'];
			$rFname = $row['rFName'];
			$rLname = $row['rLName'];
			$rEmail = $row['rEmail'];
			$message = $row['message'];
			$response = $row['response'];
			   
			$counter++;
			if($email == $sEmail)
			{
				echo "<tr>";
				echo "<td>$sfname $slname</td>";
				echo "<td>$sEmail</td>";
				echo "<td>$rFname $rLname</td>";
				echo "<td>$rEmail</td>";
				echo "<td>$message</td>";
				echo "<td>$response</td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "</tr>";
			}
			
			if($email == $rEmail)
			{
				echo "<tr>";
				echo "<td>$sfname $slname</td>";
				echo "<td>$sEmail</td>";
				echo "<td>$rFname $rLname</td>";
				echo "<td>$rEmail</td>";
				echo "<td>$message</td>";
				echo "<td>$response</td>";
				echo "<td><a href = 'messageConfirm.php?Confirm=$id'>Confirm</a></td>";
				echo "<td><a href='mailto:$sEmail'>Respond</a></td>";
				echo "</tr>";
			}					
	   }
		echo "<h2>There are ($counter) messages</h2>";
		echo "</table></div>";
			
	}

	else
	{
		echo "<h1>There are no message</h1>";
	}
	
	echo "<div>
		  <br><br>
		  
	</div>

	<div class='container'>
	</div>";

	require "masterFooter.php";
?>