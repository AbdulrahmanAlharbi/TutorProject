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
				//window.location.href='login.php';
		    </script>";	 
      }
   }
?>

    
        <link rel="stylesheet" href="assets/css/style.css">


<div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="signup.php" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" name = "fn"required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name="ln" required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" id="email" required autocomplete="off"/>
          </div>
		  
		  <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text" name="username" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" name="pass"required autocomplete="off"/>
          </div>
		  
		  <!--<div class="field-wrap">
            <label>
				Are you apply for tutoring?<span class="req">*</span>
            </label>
			<div class="forgot">
            <select name="question" id="question">
				<option>No</option><option>Yes</option>			
			</select>

          </div>
		  </div>-->
		  
		  <div class="field-wrap">
			<label>
 
            </label>						
	
 					</div>
          
          <button type="submit" class="button button-block" />Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="login.php" method="post">
          
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
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
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