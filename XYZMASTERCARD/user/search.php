<?php
	session_start();
	if(isset($_SESSION['uid'])==FALSE)
	{
		header("location:login.php");
	}
?>
<html>
<head>
<title>XYZ Store</title>
<link rel="stylesheet" href="../css/store.css" />
</head>
<body>
<table align="left">
	<tr>
		<td><a href="store.php"> Back</a></td>
	</tr>
</table>
<table align="center">
	<td style="font-size:30px; color:#990000">The</td>
	<td style="font-size:60px; color:#FF6600">XYZ STORE</td>
	</tr>
</table>
<table align="left">
		<tr>
			<td><a href="search.php?p=Fashion"> FASHION |</a></td>
			<td><a href="search.php?p=Food"> FOOD |</a></td>
			<td><a href="search.php?p=Electronics"> ELECTRONICS </a></td>
		</tr>
  </table>
<br><br><br><br>
<form action="search.php?p=<?php print $_GET['p']; ?>" method="post">
<table border="1" align="center" >
	<tr>
		<td align="center" colspan=4><?php print $_GET['p']; ?></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="text" name="pname" placeholder="Search Product name" required></td>
		<td colspan="4" align="center"><input type="submit" name="submit" value="Search"></td>
	</tr>
</table>
</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	$pname=$_POST['pname'];
include("../dbcon.php");
$query="SELECT * FROM `nfdeal` WHERE `name` LIKE '%$pname%'";
$run=mysqli_query($con,$query);
$row=mysqli_num_rows($run);
if($row<1)
{?>
<h3 align="center">
	No Record Found
	</h3>
	<?php
}
else
{	$count=0;
?>
<table border="1" align="left">
			
			<tr>
				<th colspan="4" align="center">Search Details</th>
			</tr>
			<?php
	while($data=mysqli_fetch_assoc($run))
	{
		?>		
	<tr>
		<td rowspan="2"><img src="../dataimg/product/<?php print $data['img']; ?>" HIGHT="60" WIDTH="120" BORDER="1" ></td>
		<td><?php print '$'.$data['price']; ?></td>
		<td><?php print '<a href="purchase.php?store=local&to='.$data['payto'].'&price='.$data['price'].'">'.$data['name'].'</a>'; ?></td>
	</tr>
	<tr>
		<td colspan="2"><?php print $data['details']; ?></td>
	</tr>
						
<?php
	}
	?>
	</table>
	<?php
}
}
else
{
	include('../dbcon.php');
	$id=$_SESSION['uid'];
	$query7="SELECT * FROM `user` WHERE `id`='$id'";
	$run7=mysqli_query($con,$query7);
	$data7=mysqli_fetch_assoc($run7);
	if($_GET['p']=='Fashion')
		$no=0;
	else if($_GET['p']=='Food')
		$no=1;
	else
		$no=2;
	$query=("SELECT * FROM `nfdeal` WHERE `no`='$no'");
	$run=mysqli_query($con,$query);	
?>
<table align=left" border="1">
	<tr>
		<td colspan="3" align="center"> Latest Deals </td>
	</tr>
	<?php while($data=mysqli_fetch_assoc($run))
	{
	?>		
	<tr>
		<td rowspan="2"><img src="../dataimg/product/<?php print $data['img']; ?>" HIGHT="60" WIDTH="120" BORDER="1" ></td> 
		<td><?php print '$'.$data['price']; ?></td>
		<td><?php print '<a href="purchase.php?store=local&to='.$data['payto'].'&price='.$data['price'].'">'.$data['name'].'</a>'; ?></td>
	</tr>
	<tr>
		<td colspan="2"><?php print $data['details']; ?></td>
	</tr>
						
<?php
	}
	?>
</table>
<?php
}
?>
