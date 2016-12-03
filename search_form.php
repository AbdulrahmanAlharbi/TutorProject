<?php require "master.php"?>



<span style="text-align:center">
	<form action="view_search_results.php" method="get" id="mySearchForm" onsubmit="search.php">
						Enter a course name to search <br><br>
		<input type="text" name="searchTarget" id="searchTarget"/><br><br>
		<input type="submit" name="submit" value="Search" id="search_button"/>
	</form>
</span>


<?php require "masterFooter.php" ?>