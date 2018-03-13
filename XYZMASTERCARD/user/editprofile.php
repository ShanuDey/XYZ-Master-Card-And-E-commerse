<?php
	//print "session";
	session_start();
	if(isset($_SESSION['uid'])==FALSE)
	{
		header("location:login.php");
	}	
	//print $_SESSION['uid'];
	$id=$_SESSION['uid'];
	include("../dbcon.php");
	$query="SELECT * FROM `user` WHERE `id`='$id'";
	$run=mysqli_query($con,$query);
	$data=mysqli_fetch_assoc($run);
?>
<html>
<head>
<link rel="stylesheet" href="../css/login.css">
<title>My Profile</title>
</head>
<body>
<h1 align="left">
<a href="dashboard.php"> Back</a>
</h1>
<h1 align="center" style="color:#FFFF00">
My Profile
</h1>
<form action="profile.php" method="post" enctype="multipart/form-data">
<table align="center" border="1">
	<tr>
		<td rowspan="2" align="center"><img src="../dataimg/<?php print $data['image']; ?>" HIGHT="120" WIDTH="120" BORDER="1" ></td>
		<td>Change Profie picture</td>
	</tr>
	<tr>
		<td align="center"><input type="file" accept=".jpg,.jpeg,.png" name="img" value="Change Profie picture"></td>
	</tr>
	<tr>
		<td align="center">User Name : </td>
		<td align="center"><input type="text" name="email" value="<?php print $data['name']; ?>" required></td>
	</tr>
	<tr>
		<td  align="center">Email ID :</td>
		<td align="center"><input type="email" name="email" value="<?php print $data['email']; ?>" required></td>
	</tr>
	<tr>
		<td align="center">Master Card Details :</h1></td>
		<td align="center"><input type="text" name="card" value="<?php print $data['cardno']; ?>" required></td>
	</tr>
	<tr>
		<td  align="center">Phone No :</td>
		<td align="center"><input type="text" name="phone" value="<?php print $data['phone']; ?>"  required></td>
	</tr>
	<tr>
		<td align="center">Date of Birth :</td>
		<td align="center"><input type="date" name="dob" value="<?php print $data['dob']; ?>" required></td>
	</tr>
	<tr>
		<td align="center">Gender :</td>
		<td align="center"><select name="gender">
			<option value="male">Male</div></option>
			<option value="female">Female</div></option>
		</select></td>
	</tr>
	<tr>
		<td align="center">Country :</td>
		<td align="center"><input type="text" name="country" value="<?php print $data['country']; ?>" placeholder="Country" required></td>
	</tr>
	<tr>
		<td align="center">Social Media Info :</td>
		<td align="center"><input type="text" name="social" value="<?php print $data['social']; ?>" placeholder="Social Media Info"></td>
	</tr>
	<tr>
		<td align="center"><input type="submit" name="submit" value="Submit"></td>
		<td align="center"><a href="dashboard.php">Cancel</a></td>	
	</tr>	
</table>
</form>
</body>
</html>

<?php
	if(isset($_POST['submit']))
	{
		include('../dbcon.php');
		$name=$_POST['uname'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$query="SELECT * FROM `user` WHERE `email`='$email' OR`phone`='$phone'";
		$run=mysqli_query($con,$query);
		$row=mysqli_num_rows($run);
		if($row>0)
		{?>
			<h1 align="center">This Phone Number or Email  already exits!!<br> try again!!</h1>
			<?php
		}
		else
		{
			//print $_POST['uname']." ".$_POST['pass']." ".$_POST['email']." ".$_FILES['img']['name'];			
			$pass=$_POST['pass'];
			$img=$_FILES['img']['name'];
			$tempname=$_FILES['img']['tmp_name'];
			//print $tempname;
			$query2="INSERT INTO `user`(`name`, `password`, `image`, `phone`, `email`) VALUES ('$name','$pass','$img','$phone','$email')";
			$run2=mysqli_query($con,$query2);
			move_uploaded_file($tempname,"../dataimg/$img");			
			?>
			<h1 align="center">Your accout has been created<br>
			<a href="login.php">Click here to login</a>
			</h1>
			<?php
		}	
	}	
?>