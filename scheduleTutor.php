<?php
	require "master_student.php";
	
	$username = $_SESSION['login_user'];
	
	$tSid = $_POST['tSid'];
	$courseID = $_POST['courseID'];
	$tEmail = $_POST['tEmail'];
	$tfname = $_POST['tfname'];
	$tlname = $_POST['tlname'];
	
	$localhost = 'localhost';
	$dusername = 'root';
	$dpassword = 'root';
	$database = 'tutordb';
	$connection = mysql_connect($localhost , $dusername , $dpassword);
	mysql_select_db($database, $connection);
	
	$connect = new mysqli($localhost, $dusername, $dpassword, $database);

	if ($connect->connect_error) 
	{
		die("Connection failed: " . $connect->connect_error);
	}

	$query = "Select * FROM student where Username = '$username'";
	$res = mysqli_query($connect, $query);

	while($row = mysqli_fetch_array($res))
	{
		$studentID = $row[0];
		$sfname = $row[1];
		$slname = $row[2];
		$studentEmail = $row[3];
	}

	//echo "CourseID = $courseID <br> Tutor ID = $tSid <br> Student ID = $studentID";
	
	$db = "INSERT INTO requesttutoron(CourseID, SID)"; 
	$db.= "VALUES('$courseID','$studentID')" ;
	$q = mysql_query($db);
	
	$db2 = "INSERT INTO taughtby(SID_1, TaughtBySID_2, CourseID)"; 
	$db2.= "VALUES('$studentID','$tSid', '$courseID')" ;
	$q2 = mysql_query($db2);
						
	if($q && $q2)
	{
		echo "<script>
				alert('your request has been saved. Please Send a massage to the tutor');
				</script>";
		
		echo "<div class='container'><div class='row'>
                            <div class='block'>
                                <div class='page-header center'>
                                    <div class='page-header-inner'>
                                        <div class='line'>
                                            <hr>
                                        </div><!-- /.line -->

                                        <div class='heading'>
                                            <h2>Send a Message to $tfname $tlname</h2>
                                        </div><!-- /.heading -->

                                        <div class='line'>
                                            <hr>
                                        </div><!-- /.line -->
                                    </div><!-- /.page-header-inner -->
                                </div>

                                <form action='sendMessage.php' method='post'>

                                    <div class='form-inline'>
                                        <div class='form-group col-sm-4 col-md-4'>
                                            <label><label style='color:red'>*</label> First name</label>
                                            <input type='text' name='fn' class='form-control' value='$sfname' readonly>
                                        </div>
										<div class='form-group col-sm-4 col-md-4'>
                                            <label><label style='color:red'>*</label> Last name</label>
                                            <input type='text' name='ln' class='form-control' value='$slname' readonly>
                                        </div>
                                        <div class='form-group col-sm-4 col-md-4'>
                                            <label><label style='color:red'>*</label> Email address</label>
                                            <input type='email' name='email' class='form-control' value='$studentEmail' readonly>
                                        </div>
                                    </div>

                                    <div class='textarea form-group col-sm-12 col-md-12'>
                                        <label><label style='color:red'>*</label> Message</label>
                                        <textarea name='message' class='form-control' required></textarea>
                                    </div>

                                    <div class='form-group col-md-3'>
                                        <button type='submit' class='btn btn-primary btn-block'>Send Message</button>
										<input type='hidden' name='tEmail' id='tEmail' value='$tEmail'>
										<input type='hidden' name='tfname' id='tfname' value= $tfname>
										<input type='hidden' name='tlname' id='tlname' value= $tlname>
                                    </div>
                                </form>
                            </div>
                        </div>
						</div>";
		
		//header( "location: teatchingCourses.php" );
	}
	else
	{
		echo mysql_error();
	}
?>

<?php
	require "masterFooter.php";
?>