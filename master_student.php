<?php
include('session_student.php');
	//session_start();
	if (!isset($_SESSION['login_user']) || empty($_SESSION['login_user'])) {
		  // redirect to your login page
		  header("Location: login.php"); 
		  exit();
	}
?>
<html>

<head>

    
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="libraries/pictopro-normal/pictopro-normal.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="assets/css/carat.css" media="screen, projection">
	
	
<style>.tmvwidget{-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;width:248px;border-width:1px;}.tmvwidget .tmvwidget-header{-webkit-border-top-right-radius:5px;-moz-border-radius-topright:5px;border-top-right-radius:5px;-webkit-border-top-left-radius:5px;-moz-border-radius-topleft:5px;border-top-left-radius:5px;}
.tmvwidget .tmvwidget-inner{-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;}
</style>

<title>Online Tutor Schedule System</title>
	
</head>
<body onload="getLocation()">
  <div class="topbar gray">
	<div class="container">
		<div class="row">
            <div class="col-md-6 col-xs-12 header-top-left">
                
            </div>

            <div class="col-md-6 col-xs-12 header-top-right">
                <div>
                    

                    <div class="languages">
                        <ul>
						
							<li><b>Welcome </b><?php echo $login_session; ?></li> 
                            <li><a href = "logoutPage.php">Sign Out</a></li>
							
                        </ul>
                    </div><!-- /.languages -->

                </div>
            </div><!-- /.col-md-5 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.topbar -->

<header id="header">
	<div class="header-inner">
		<div class="container">
			<div class="row">
				<div class="col-md-12 clearfix">
					<div class="brand">
						<div class="logo">
							<a href="/">
								<img src="assets/img/pp.png" alt="Carat HTML Template">
							</a>
						</div><!-- /.logo -->
	
					</div><!-- /.brand -->

					

					
					

					<nav class="collapse navbar-collapse navbar-collapse" role="navigation">


						<ul class="navigation">
						<li><a href="index_student.php">Home</a></li>						
						<li class="menuparent has-regularmenu">
						<a href="#"><i class="icon icon-normal-cog-wheel"></i>My Courses</a>
						<div class="regularmenu">
						<ul class="regularmenu-inner">
						<li><a href="teatchingCourses.php"><i class="icon icon-normal-file-text"></i> Preview Teaching Courses</a></li>
						<li><a href="takingCourses.php"><i class="icon icon-normal-file-text"></i> Preview Taking Courses</a></li>
						<li><a href="requestTutor.php"><i class="icon icon-normal-file-text"></i> Request Tutor</a></li>
						</ul><!-- /.regularmenu-inner -->
						</div><!-- /.regularmenu -->
						</li>
						<li><a href="add_new_post.php"><i class="icon icon-normal-profile-checkbox"></i> Apply for tutoring</a></li>
						<li><a href="message.php"><i class="icon icon-normal-mail"></i>Messages</a></li>
						<li><a href="myProfile.php"><i class="icon icon-normal-profile-checkbox"></i> My Profile</a></li>
						</ul><!-- /.nav -->


					</nav>
				</div><!-- /.col-md-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.header-inner -->
</header><!-- /#header -->


<div class="infobar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				

				<div class="contact pull-right">
					
					<div class="contact-item mail">
						<div class="label"><i class="icon icon-normal-mail"></i></div><!-- /.label -->
						<div class="value"><a href="mailto:DBTutorProject@gmail.com">DBTutorProject@gmail.com</a></div><!-- /.value -->
					</div><!-- /.mail -->

					
				</div><!-- /.contact -->
			</div><!-- /.col-md-12 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
	
</div><!-- /.infobar -->