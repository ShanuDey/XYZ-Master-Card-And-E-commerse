<?php
	session_start();
	if(isset($_SESSION['uid']))
	{
		header("location:dashboard.php");
	}
?>
<html>
<head>
<link rel="stylesheet" href="../css/login.css">
<title>Login Page </title>
</head>
<body>
<div class="header">
<h1 align="center">
<a href="../index.php" id="back">< Back</a>
</h1>
<h1 align="center"> User login here</h1></div>
<form action="login.php" method="post">
<table align="center" border="1">
	<tr>
		<td>User Name : </td>
		<td><input type="text" name="uname" placeholder="Enter your User Name" required></td>
	</tr>
	<tr>
		<td>Password : </td>
		<td><input type="password" name="pass" placeholder="Enter your Password" height="80px" required></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" name="submit" value="Log in"></td>
	</tr>
</table>
</form>
<h2 align="center">or<br><a href="signin.php">Create a new account</a></h2>
</body>
</html>
<?php
	if(isset($_POST['submit']))
	{
		include("../dbcon.php");
		$name=$_POST['uname'];
		$pass=$_POST['pass'];
		//print $name." ".$pass;
		$query="SELECT * FROM `user` WHERE `name`='$name' AND`password`='$pass'";
		$run=mysqli_query($con,$query);
		$row=mysqli_num_rows($run);
		if($row<1)
		{?>
		<script>
			window.alert('User Name or Password does not match')
		</script>
		<?php
		}
		else
		{
			$data=mysqli_fetch_assoc($run);
			$_SESSION['uid']=$data['id'];
//exit(header("location : dashboard.php"));?>
 <script> location.replace("dashboard.php"); </script>
	<?php	}
	}
?>