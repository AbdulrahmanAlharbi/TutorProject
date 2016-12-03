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

<?php       

	require "master_admin.php";


?> 

<?php




	$username = $_SESSION['login_user'];


	$localhost = 'localhost';
	$dusername = 'root';
	$dpassword = 'root';
	$database = 'tutordb';
	$connection = mysql_connect($localhost , $dusername , $dpassword);
	mysql_select_db($database, $connection);

if (isset($_GET['Edit']))
{
	
	$subjectID = $_GET['Edit'];
	$que = mysql_query("Select * FROM subject WHERE SubjectID = '$subjectID'");
	$row = mysql_fetch_array($que);

}

if (isset($_POST['subjectID']))
{
	
		$subjectOldID = $_POST["subjectIDOld"];
		$subjectID = $_POST["subjectID"];
		$subjectName = $_POST["subjectName"];
		
			
		$que2 =  "UPDATE subject SET subjectID ='$subjectID', subjectName ='$subjectName' where subjectID='$subjectOldID'";
		$record2 = mysql_query($que2) or print(mysql_error());
		
		echo "<script>
					alert('The subject has been updated successfully');
					window.location.href='http://localhost:8080/TutorProject/addSubject.php';
				</script>";

if($record2 === FALSE)

echo $record2;

}


?>


	<div class="container">
		<form action="edit_subject.php" method="post" enctype="multipart/form-data">
		<div class="col-md-6 sidebar">
			<table align="center" width="100%" height="100%">
				<tr>
					<td>Subject ID:</td>
					<td><input type="text" name="subjectID" id="subjectID" value="<?php echo $row['SubjectID']; ?>" class="form-control" required>
						<input type="hidden" name="subjectIDOld" id="subjectIDOld" value="<?php echo $row['SubjectID']; ?>">
					</td>
				</tr>
				
				<tr>
					<td>Subject Name</td>
					<td><input type="text" name="subjectName" id="subjectName" value="<?php echo $row['SubjectName']; ?>" class="form-control" required></td>
				</tr>
				
				
				<tr>
					<td><button type="submit" class="btn btn-primary btn-block">Update Subject</button></td>
				</tr>
			</table>
		</div>
		</form>
	</div>
	
<?php
	require "masterFooter.php";
?>