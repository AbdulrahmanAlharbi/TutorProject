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

<script>
function validation()
{
	
	if(form1.oldPass.value != form1.oldPassOrg.value)
	{
		alert("Wrong Password it does not mutch your password in our Database");
		form1.oldPass.focus();
		form1.oldPass.value = "";
		form1.newPass.value = "";
		form1.confPass.value = "";
		return false;
	}
	
	if(form1.newPass.value != form1.confPass.value)
	{
		alert("New Password and Confirm Password do not mutch");
		form1.newPass.focus();
		form1.newPass.value = "";
		form1.confPass.value = "";
		return false;
	}
	return true;
}
</script>

<?php       
	require "master_admin.php";
?> 


    





<?php

$username = $_SESSION['login_user'];

// serve the page normally.

$localhost = 'localhost';
$dusername = 'root';
$dpassword = 'root';
$database = 'tutordb';
$connection = mysql_connect($localhost , $dusername , $dpassword);
mysql_select_db($database, $connection);

 
$que =  " SELECT * FROM admin, login WHERE admin.username = login.username AND admin.username ='$username'";
$record = mysql_query($que) or print(mysql_error());


//iterate over all the rows
if($record === FALSE){
echo $record;

}
if(mysql_num_rows($record) > 0 ){
   // echo mysql_num_rows($record);
   
   echo "<div class='container'>
			<div class='col-md-12'>
				<div class='row'>
					<div class='col-md-12'>
						<div class='block block-margin sort'>
							<div>
							</div>
						</div> 
					</div>
				</div>
				<div class='col-md-6 sidebar'>";
	
    	echo "<table align='center' width='100%' height='100%'>";	

 while($row = mysql_fetch_array($record)) {
	   //echo mysql_num_rows($record);
       
		$f_name = $row['AdFName'];
		$l_name = $row['AdLName'];
		$email = $row['AdminEmail'];
		
		$password = $row['Password'];
		
		echo "<tr>";
		echo "<td>Welcome</td>";
		echo "<td>".$f_name."  ".$l_name."</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>Your First Name:</td>";  
		echo "<td>".$f_name."</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>Your Last Name:</td>";
		echo "<td>".$l_name."</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>Your Email:</td>";
		echo "<td>".$email."</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td></td>";
		echo "<td></td>";
		echo "</tr>";
			    
   }
   	echo "</table></div></div></div>";

}

?>
		
	<div class="container">
		<form name="form1" action="changeAdminPass.php" method="post" onsubmit="return(validation());">
		<div class="col-md-6 sidebar">
			<table align="center" width="100%" height="100%">
				<tr>
					<td>Old Password:</td>
					<td><input type="text" name="oldPass" id="oldPass" class="form-control" required></td>
					<input type="hidden" name="oldPassOrg" id="oldPassOrg" value="<?php echo $password ?>">
				</tr>
				
				<tr>
					<td>New Password:</td>
					<td><input type="text" name="newPass" id="newPass" class="form-control" required></td>
				</tr>
				
				<tr>
					<td>Confirm Password:</td>
					<td><input type="text" name="confPass" id="confPass" class="form-control" required></td>
				</tr>
				
				<tr>
					<td><button type="submit" class="btn btn-primary btn-block">Change Password</button></td>
				</tr>
			</table>
		</div>
		</form>
	</div>