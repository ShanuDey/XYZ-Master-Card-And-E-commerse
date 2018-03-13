<?php
	$con=mysqli_connect("au-cdbr-sl-syd-01.cleardb.net","b0ca206f3813cd","d841fc34","ibmx_b136a0bbc71cccd");
	if($con==FAlSE)
	{
		print "Error in connection !!";
		header("location:index.php");
	}
?>