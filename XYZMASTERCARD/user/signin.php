<html>
<head>
<link rel="stylesheet" href="../css/login.css">
<title>New User</title>
</head>
<body>
<h1 align="left">
<a href="../index.php"> Back</a>
</h1>
<?php
	if(isset($_POST['submit']))
	{
		include('../dbcon.php');
		$name=$_POST['uname'];
		$cardno=$_POST['cardno'];	
		$query="SELECT * FROM `user` WHERE `name`='$name' OR `cardno`='$cardno'";
		$run=mysqli_query($con,$query);
		$row=mysqli_num_rows($run);
		if($row>0)
		{
			?>
			<script>
				window.alert('User Name or Card No already exist')
			</script>
			<?php
		}
		else
		{			
			$pass=$_POST['pass'];
			$email=$_POST['email'];
			$phone=$_POST['phone'];
			$cardvalid=$_POST['cardvalid'];
			$gender=$_POST['gender'];
			$dob=$_POST['dob'];
			$country=$_POST['country'];
			$img=$_FILES['img']['name'];
			$social=$_POST['social'];
			$tempname=$_FILES['img']['tmp_name'];
			//print $tempname;
			$query2="INSERT INTO `user`(`name`, `password`, `image`, `phone`, `email`, `country`, `social`, `dob`, `gender`, `cardno`, `cardvalid`) VALUES ('$name','$pass','$img','$phone','$email','$country','$social','$dob','$gender','$cardno','$cardvalid')";
			$run2=mysqli_query($con,$query2);
			move_uploaded_file($tempname,"../dataimg/$img");			
			?>
			<h1 align="center">Your accout has been created<br>
			<a href="login.php">Click here to login</a>
			</h1>
			<?php
		}
	}
	else
	{?>
<div align="center" ><h1>Asterics (*) marked field must be filled</h1></div>	
	<?php
	}	
?>
<form action="signin.php" method="post" enctype="multipart/form-data">
<table align="center" border="1">
	<tr>
		<td align="center">*User Name : </td>
		<td align="center"><input type="text" name="uname" placeholder="Enter your User Name" required></td>
	</tr>
	<tr>
		<td  align="center">*Email ID :</td>
		<td align="center"><input type="email" name="email" placeholder="Enter your Email ID" required></td>
	</tr>
	<tr>
		<td colspan="2" align="center">Master Card Details :</h1></td>
	</tr>
	<tr>
		<td align="center">*Master Card Number :</h1></td>
		<td align="center"><input type="text" name="cardno" placeholder="Enter Master Card Number" required></td>
	</tr>
	<tr>
		<td align="center">*Card Validity Date :</h1></td>
		<td align="center"><input type="date" name="cardvalid" required></td>
	</tr>
	<tr>
		<td colspan="2" align="center">Personal Details :</h1></td>
	</tr>
	<tr>
		<td  align="center">*Phone No :</td>
		<td align="center"><input type="text" name="phone" placeholder="Enter your Phone No"  required></td>
	</tr>
	<tr>
		<td align="center">*Date of Birth :</td>
		<td align="center"><input type="date" name="dob" required></td>
	</tr>
	<tr>
		<td align="center">*Gender :</td>
		<td align="center"><select name="gender">
			<option value="male">Male</div></option>
			<option value="female">Female</div></option>
		</select></td>
	</tr>
	<tr>
		<td align="center">*Country :</td>
		<td align="center"><input type="text" name="country" placeholder="Country" required></td>
	</tr>
	<tr>
		<td align="center">Social Media Info :</td>
		<td align="center"><input type="text" name="social" placeholder="Social Media Info"></td>
	</tr>
	<tr>
		<td align="center">*Image:</td>
		<td align="center"><input type="file" accept=".jpg,.jpeg,.png" name="img" value="Upload" required></td>
	</tr>
	<tr>
		<td align="center">*Password : </td>
		<td align="center"><input type="password" name="pass" placeholder="Enter your Password" required></td>
	</tr>
	<tr>
		
		<td align="center"><input type="radio" name="term" required></td>
		<td align="center"><a target="_blank" href="../term.php">Terms and Conditions</a></td>
	</tr>
	<tr>
	
		<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>
</form>
</body>
</html>
