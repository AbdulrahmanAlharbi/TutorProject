<?php
include('session_admin.php');
	//session_start();
	if (!isset($_SESSION['login_user']) || empty($_SESSION['login_user'])) {
		  // redirect to your login page
		  header("Location: login_admin.php"); 
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
						
							<li><b>Welcome Admin </b><?php echo $login_session; ?></li> 
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
						<li><a href="index_admin.php">Home</a></li>						
						<li><a href="addSubject.php"><i class="icon icon-normal-cog-wheel"></i> Manage Subjects</a></li>
						<li><a href="addCourse.php"><i class="icon icon-normal-cog-wheel"></i> Manage Courses</a></li>
						<li><a href="tutoringReport.php"><i class="icon icon-normal-file-text"></i> Tutoring Report</a></li>
						<li><a href="adminProfile.php"><i class="icon icon-normal-profile-checkbox"></i> Admin Profile</a></li>
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