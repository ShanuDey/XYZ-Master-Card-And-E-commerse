<?php
	//print "session";
	session_start();
	if(isset($_SESSION['uid'])==FALSE)
	{
		header("location:login.php");
	}
	
	//print $_SESSION['uid'];

?>
<html>
<head>
<link rel="stylesheet" href="../css/login.css">
<title>Change Password</title>
</head>

<table align="center" >
	<tr>
		<td><a href="dashboard.php"> Back</a></td>
		<td>Change Password</td>
		<td><a href="logout.php">Logout</a></td>
	</tr>
</table>
<br>
<form action="changepass.php" method="post">
<table border="1" align="center"  >
	<tr>
		<td colspan="4" align="center"><h3>Change Password</h3></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><h3>Old Password</h3></td>
		<td colspan="2" align="center"><input type="password" name="opass" placeholder="Enter old password"></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><h3>New Password</h3></td>
		<td colspan="2" align="center"><input type="password" name="npass" placeholder="Enter New password"></td>
	</tr>
	<tr>
		
		<td colspan="4" align="center"><input type="submit" name="submit" value="Change"></td>
	</tr>

</table>
</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
include("../dbcon.php");
$opass=$_POST['opass'];
$npass=$_POST['npass'];
$id=$_SESSION['uid'];
$query="SELECT `password` FROM `user` WHERE `id`='$id'";
$run=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($run);

if($opass===$data['password'])
{
	
	$query1="UPDATE `user` SET `password`=$npass WHERE `id`='$id'";
	$run1=mysqli_query($con,$query1);
	?>
	<h3 align="center">Password change successfull<br>
	<a href="logout.php">Logout</a><br> Or 
	<a href="dashboard.php">Stay login</a>
	</h3>
	<?php
	
}
else
{
?>
<h3 align="center">Password Does not match</h3>
<?php
}
}
 ?>