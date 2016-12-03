
<?php

	require "master.php";
	include("config.php");
	session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['logEmail']);
      $mypassword = mysqli_real_escape_string($db,$_POST['logPass']); 
      
      $sql = "SELECT * FROM login WHERE Username = '$myusername' AND Password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     // $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
    //     session_register("myusername");
         $_SESSION['login_user'] = $myusername;
		 $type = $row['Type'];
		
		if($type == "Student")
		{
			header("location: welcome_student.php");
		}
		else
		{
			header("location: welcome_admin.php");
		}
		
         
      }else {

         echo "<script>
				alert('Your Login Name or Password is invalid');
				//window.location.href='login.php';
		    </script>";	 
      }
   }

?>
<div style='background-image: url(assets/img/TutorBackground.jpg); background-repeat:no-repeat; height:600'><br><br>

		
		<div style="width: 5%; text-align: left; font-size: 16px; float: left; height: 100px;">
			
		</div>
		
		<div style="width: 40%; text-align: left; font-size: 16px; float: left; height: 100px;">
			<form name="form1" action="index.php" method="post">
			<h1>Welcome to Online Tutor Schedule</h1>
				<p><b>Our website help you to apply as a tutor<br>
					and find a wonderful tutor as a student<br>
					easily.</b>
				</p>
				<div style="width: 100%; text-align: left; font-size: 16px; float: left; height: 40px;">
					<div style="width: 17%; text-align: left; font-size: 16px; float: left; height: 20px;">
						Username:
					</div>
					<div style="width: 75%; text-align: left; font-size: 16px; float: left; height: 20px;">
						<input type="text" name="logEmail" id="logEmail" placeholder="Enter your usernam" style="width: 50%; padding: 5px 10px; margin: 0px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
					</div>
				</div>
				<div style="width: 100%; text-align: left; font-size: 16px; float: left; height: 40px;">
					<div style="width: 17%; text-align: left; font-size: 16px; float: left; height: 20px;">
						Password:
					</div>
					<div style="width: 75%; text-align: left; font-size: 16px; float: left; height: 20px;">
						<input type="password" name="logPass" id="logPass" placeholder="Enter your password" style="width: 50%; padding: 5px 10px; margin: 0px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
					</div>
				</div>
				<div style="width: 100%; text-align: left; font-size: 16px; float: left; height: 40px;">
					<div style="width: 17%; text-align: left; font-size: 16px; float: left; height: 20px;">
					
					</div>
					<div style="width: 75%; text-align: left; font-size: 16px; float: left; height: 20px;">
						<p><input type="submit" value="Login" style="width: 20%; background-color: #4CAF50; color: white; padding: 5px 10px; margin: 0px 0; border: none; border-radius: 4px; cursor: pointer;"></p>
					</div>
				</div>
				<div style="width: 100%; text-align: left; font-size: 16px; float: left; height: 40px;">
					<div style="width: 17%; text-align: left; font-size: 16px; float: left; height: 20px;">
					
					</div>
					<div style="width: 75%; text-align: left; font-size: 16px; float: left; height: 20px;">
						<p><a href="login.php">or sign up here</a></p>
					</div>
				</div>
			</form>	
		</div>
	
		
		<div style="width: 5%; text-align: left; font-size: 16px; float: left; height: 100px;">
			
		</div>
		<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			text-align: left;
			padding: 8px;
		}

		tr{background-color: #f2f2f2}
		tr:hover {background-color: #f5f5f5}
		 
		th {
			background-color: #4CAF50;
			color: white;
		}
		</style>
		<div style="width: 45%; text-align: left; font-size: 16px; float: left; height: 100px;">
			<h1>Top 5 Tutors</h1>
			<?php
				$localhost = 'localhost';
				$dusername = 'root';
				$dpassword = 'root';
				$database = 'tutordb';
				$connection = mysql_connect($localhost , $dusername , $dpassword);
				mysql_select_db($database, $connection);
							
				$que =  "SELECT s.SID as tSID, s.SFName as tFName, s.SLName as tLName, TRUNCATE(AVG(fr.Rate),1) as rate
						 FROM student s, feedback f, feedback_rate fr, preview p
						 WHERE s.SID = p.SID AND
							  f.FeedID = fr.FeedID AND
							  f.FeedID = p.FeedID
						 GROUP BY s.SID
						 ORDER BY rate DESC
						 LIMIT 5";

				$record = mysql_query($que) or print(mysql_error());

				if($record === FALSE)
				{
					echo $record;
				}
				if(mysql_num_rows($record) > 0 )
				{
				   
						$counter = 0;
					
						
						echo "<table>";
						echo "<tr>";
						echo "<th><b>Tutor Name</b></th>";
						echo "<th><b>Average Rate</b></th>";
						echo "<th><b>Preview Course</b></th>";
						echo "</tr>";
						

				 while($row = mysql_fetch_array($record)) {
					   //echo mysql_num_rows($record);
					   
					   $tutorID = $row['tSID'];
					   $tutorFName = $row['tFName'];
					   $tutorLname = $row['tLName'];
					   $tRate = $row['rate'];
					   
					   $counter++;
					   
							
						echo "<tr>";
						echo "<td>$tutorFName $tutorLname</td>";
						echo "<td>$tRate</td>";
						echo "<td><a href = 'view_courses.php?Preview=$tutorID'>View Courses</a></td>";
						echo "</tr>";
								
				   }
					echo "</table>";
				}
			?>
		</div>

</div>
<!--
<table background ="assets/img/TutorBackground.jpg" height="650" width="1260" align="center">
	<tr>
	<td></td>
		<td>
			<h1>Welcome to Online Tutor Schedule</h1>
			<p><b>Our website help you to apply as a tutor<br>
				and find a wonderful tutor as a student<br>
				easily.</b>
			</p>
		</td>
	</tr>
	<tr>
		<td width ="100"></td>
		<td>
			<form name="form1" action="index.php" method="post">
				<p>Username
					<input type="text" name="logEmail" id="logEmail" placeholder="Enter your usernam">
				</p>
				<p>Password 
					<input type="password" name="logPass" id="logPass" placeholder="Enter your password"><br>
					<p><a href="login.php">or sign up here</a></p>
					<p><label id="searchVal" style="color:red"></label></p>
				</p>
				<p><input type="submit" value="Login"></p>
			</form>
		</td>
		<td></td>
	</tr>
</table>
-->

<?php
	require "masterFooter.php"
?>