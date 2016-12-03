<?php
	require "master.php";
?>

<div id="content" class="page-contact">
    
    <!-- /#page-heading -->

	<div class="section gray-light">

		<div class="container" align="center">
				<table border="1" width="100%" height="400" align="center">
			<tr>
				<td>
				<iframe
					align="center"
					width="100%"
					height="100%"
					frameborder="0"
					style="border:0"
					src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyCcp3ukjxQcptKxgITUeUi_ZvymMPgxbD4&origin=Saint Joseph's University, City Avenue, Philadelphia, PA					&destination=Saint Joseph's University, City Avenue, Philadelphia, PA" allowfullscreen>
				</iframe>
				</td>
			</tr>
		</table>
		</div>
	</div>
    <div class="section gray-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="main">
                        <div class="row">
                            <div class="col-sm-4 col-md-4">
                                <div class="block block-shadow block-margin white contact">
                                    <div class="block-inner">
                                        <div class="block-title">
                                            <h3>
                                                Contact Information
                                            </h3>
                                        </div>
                                        <p>
                                            <strong>Online Tutor Schedule System Helper</strong>
                                        </p>
                                        <p class="address">
                                            <i class="icon icon-normal-pointer-pin"></i>
                                            <span>5000 City Avenue, Saint Joseph's University<br />
                                            Philadelphia, PA 19131</span>
                                        </p>
                                        <p>
                                            <strong><i class="icon icon-normal-phone"></i> Phone:</strong> (267) 678-9861<br />
                                            <strong><i class="icon icon-normal-mail"></i> E-mail:</strong> DBTutorProject@gmail.com
                                        </p>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="col-sm-4 col-md-4">
                                <div class="block block-shadow block-margin white about">
                                    <div class="block-inner">
                                        <div class="block-title">
                                            <h3>
                                                Shortly about Us
                                            </h3>
                                        </div>

                                        <div class="description">
                                            We are a group of students study at Saint Joseph's University. We study Database Management System as a course during fall 2016 semester. We have decided to create a website that help students to find tutors and tutors to advertise themselves online easily. We appreciate your opinions and recommendations to develop our website. 
                                        </div>

                                        <div class="social">
                                            <div class="inner">
                                                
                                            </div><!-- /.inner -->
                                        </div><!-- /.social -->

                                    </div>
                                </div>
                            </div>
                        </div><!-- /.row -->

                        <div class="row">
                            <div class="block">
                                <div class="page-header center">
                                    <div class="page-header-inner">
                                        <div class="line">
                                            <hr>
                                        </div><!-- /.line -->

                                        <div class="heading">
                                            <h2>Send us a Message</h2>
                                        </div><!-- /.heading -->

                                        <div class="line">
                                            <hr>
                                        </div><!-- /.line -->
                                    </div><!-- /.page-header-inner -->
                                </div>

                                <form action="contact_thank.php" method="post">

                                    <div class="form-inline">
                                        <div class="form-group col-sm-4 col-md-4">
                                            <label><label style="color:red">*</label> First name</label>
                                            <input type="text" name="fn" class="form-control" required>
                                        </div>
										<div class="form-group col-sm-4 col-md-4">
                                            <label><label style="color:red">*</label> Last name</label>
                                            <input type="text" name="ln" class="form-control" required>
                                        </div>
                                        <div class="form-group col-sm-4 col-md-4">
                                            <label><label style="color:red">*</label> Email address</label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="textarea form-group col-sm-12 col-md-12">
                                        <label><label style="color:red">*</label> Message</label>
                                        <textarea name="message" class="form-control" required></textarea>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <button type="submit" class="btn btn-primary btn-block">Contact</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                    <!-- /#main -->
                </div>
                <!-- /.col-md-12 -->
           </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.section -->
</div>


<?php
	require "masterFooter.php";
?>