<?php
	//print "session";
	session_start();
	if(isset($_SESSION['uid'])==FALSE)
	{
		header("location:login.php");
	}	
	$id=$_SESSION['uid'];
	include('../dbcon.php');
	$query="SELECT * FROM `user` WHERE `id`='$id'";
	$run=mysqli_query($con,$query);
	$data=mysqli_fetch_assoc($run);
	//print $_SESSION['uid'];
?>
<html>
<head>
<link rel="stylesheet" href="../css/dashboard.css">
<title>Master Card</title>
</head>
<body align="center">
<table align="left">
	<tr>
		<td><a href="dashboard.php"> Back</a></td>
	</tr>
</table>
<table align="right">
	<tr>
		<td><a href="dashboard.php"> Home |</a></td>
		<td><a href="profile.php"> My Profile |</a></td>
		<td> <a href="notification.php"> Notifications |</a></td>
		<td> <div class="dropdown">
  <span style="font-style:italic"> Settings |</span>
  <div class="dropdown-content">
  	<a href="editprofile.php">Edit Profile</a>
	<a href="changepass.php">Change Password</a>
	<a href="logout.php">Logout</a>
  </div>
</div> </td>
		<td> <a href="logout.php"> Logout </a></td>
	</tr>
</table>
<br><br><br><br>
<table align="center">
	<tr>
		<td align="center"> Your current account balance : <?php print "$".$data['balance'] ?> </td>
	</tr>
</table>
<br><br><br>