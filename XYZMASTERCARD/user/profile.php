<?php include('header.php'); 
	$id=$_SESSION['uid'];
	include("../dbcon.php");
	$query="SELECT * FROM `user` WHERE `id`='$id'";
	$run=mysqli_query($con,$query);
	$data=mysqli_fetch_assoc($run);
?>
<br><h1 style="color:#FFFF00">My Profile</h1>
<table align="center" border="1" style="background-color:#CCCCCC">
	<tr>
		<td colspan="2" align="center"><img src="../dataimg/<?php print $data['image']; ?>" HIGHT="120" WIDTH="120" BORDER="1" ></td>
	</tr>
	<tr>
		<td align="center">User Name : </td>
		<td align="center"><?php print $data['name']; ?></td>
	</tr>
	<tr>
		<td  align="center">Email ID :</td>
		<td align="center"><?php print $data['email']; ?></td>
	</tr>
	<tr>
		<td  align="center">Phone No :</td>
		<td align="center"><?php print $data['phone']; ?></td>
	</tr>
	<tr>
		<td align="center">Date of Birth :</td>
		<td align="center"><?php print $data['dob']; ?></td>
	</tr>
	<tr>
		<td align="center">Gender :</td>
		<td align="center"><?php print $data['gender']; ?></td>
	</tr>
	<tr>
		<td align="center">Country :</td>
		<td align="center"><?php print $data['country']; ?></td>
	</tr>
	<tr>
		<td align="center">Social Media Info :</td>
		<td align="center"><?php print $data['social']; ?></td>
	</tr>
	<tr>
		<td colspan="2" align="center">Master Card Details :</h1></td>
	</tr>
	<tr>
		<td  align="center">Card Holder name :</h1></td>
		<td align="center"><?php print $data['name']; ?></td>
	</tr>
	<tr>
		<td  align="center">Master Card Number :</h1></td>
		<td align="center"><?php print $data['cardno']; ?></td>
	</tr>
	<tr>
		<td  align="center">Valid upto :</h1></td>
		<td align="center"><?php print $data['cardvalid']; ?></td>
	</tr>
</table>
<?php include('footer.php'); ?>