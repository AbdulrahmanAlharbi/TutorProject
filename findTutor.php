<style>
input[type=text], select {
    width: 57%;
    padding: 14px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

#first {
    width: 33%;
	text-align: right;
	font-size: 16px;
    float: left;
    height: 100px;
}
#second {
    width: 33%;
	text-align: center;
	font-size: 16px;
    float: left;
    height: 100px;
}
#third {
    width: 33%;
	text-align: left;
	font-size: 16px;
    float: left;
    height: 100px;
}
#fourth {
    width: 75%;
	text-align: center;
	font-size: 16px;
    float: left;
    height: 100px;
}

</style>


<?php
	require "master.php";

?>

<div style='background-image: url(assets/img/TutorBackground.jpg); background-repeat:no-repeat; height:600'><br><br>

	<form action="view_search_results.php" method="get" id="mySearchForm" onsubmit="search.php">
		<div id="first">
			<p><b>Enter a course name to search</b></p>
			<input type="text" name="searchTarget" id="searchTarget" placeholder="Enter the course to search" />
		</div>
		<div id="second">
			<p><b>Enter a subject name to search</b></p>
			<input type="text" name="searchTarget2" id="searchTarget2" placeholder="Enter the subject to search" />
			
		</div>
		<div id="third">
			<p><b>Choose the rate to search</b></p>
			<select name="rate" onchange="location =('feedback_by_rate.php?Rate='+this.value);">
				<option value="">Select the rate</option>
				<option value="5">5 and less</a></option>
				<option value="4">4 and less</option>
				<option value="3">3 and less</option>
				<option value="2">2 and less</option>
				<option value="1">1 and less</option>
			</select>
		</div>
		<div id="fourth">
			<br>
			<p><button type="submit"  name="submit" style="height:67;width:214"><img src="assets/img/FindTutor.jpg" /></button></p>
		</div>
	</form>

</div>
<?php
	require "masterFooter.php"
?>