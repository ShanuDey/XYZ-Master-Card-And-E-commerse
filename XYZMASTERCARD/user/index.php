<?php
	session_start();
	if(isset($_SESSION['uid'])==FALSE)
	{
		header("location:login.php");
	}
	else
	{
		header("location:../index.php");
	}	
?>