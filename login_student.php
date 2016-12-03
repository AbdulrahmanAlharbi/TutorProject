<?php
	require "master.php";
	
	include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['logEmail']);
      $mypassword = mysqli_real_escape_string($db,$_POST['logPass']); 
      
      $sql = "SELECT Username FROM login WHERE Username = '$myusername' AND Password = '$mypassword' AND Type = 'Student'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     // $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
    //     session_register("myusername");
         $_SESSION['login_user'] = $myusername;
 
         header("location: welcome_student.php");
      }else {

         echo "<script>
				alert('Your Login Name or Password is invalid');
				//window.location.href='login_student.php';
		    </script>";	 
      }
   }
?>

<link rel="stylesheet" href="assets/css/login-admin.css">
<link rel="stylesheet" href="assets/css/style.css">

<div class="form">
        
        <div id="login">   
          <h1>Welcome Back Admin!</h1>
          
          <form action="login_admin.php" method="post">
          
            <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text" name = "logEmail" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name ="logPass" required autocomplete="off"/>
          </div>
          
          
          <button class="button button-block"  />Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="assets/js/index.js"></script>



<?php
	require "masterFooter.php";
?>