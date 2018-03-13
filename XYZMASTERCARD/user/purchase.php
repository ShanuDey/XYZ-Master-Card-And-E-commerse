<?php include('header.php'); 
$store=$_GET['store'];
?>
<style>
input
{
	font-size:30px;
	size:10px;
}
option
{
	font-size:30px;
}
</style>
<form action="purchase.php?store=<?php print $store; ?>" method="post">
<table align="center" border="1">
	<tr>
		<td align="center" colspan="2">Purchase</td>
	</tr>
	<tr>
		<td align="center"> Store :</td>
		<td align="center"> <?php print $store; ?></td>
	</tr>
	<tr>
		<td align="center">Pay to :</td>
		<td align="center"><input type="text" name="to" <?php 
		if(isset($_GET['to'])) 
		{
			print 'value="'.$_GET['to'].'"';
		}
		else
			print 'placeholder="Enter Store`s UserName"';
		?>"/></td>
	</tr>
	<tr>
		<td align="center">Price : </td>
		<td align="center"><input type="text" name="price" <?php 
		if(isset($_GET['to'])) 
		{
			print 'value="'.$_GET['price'].'"';
		}
		else
			print 'placeholder="Enter the Price"';
		?>"/></td>
	</tr>
	<tr>
		<td align="center">Password : </td>
		<td align="center"><input type="password" name="pass" placeholder="Enter the Password"</td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" name="submit" value="Buy Now" /></td>
	</tr>
</table>
</form>
<?php include('footer.php'); ?>
<?php
if(isset($_POST['submit']))
{
	include('../dbcon.php');
	$pass=$_POST['pass'];
	$price=$_POST['price'];
	if($price<0)
	{	?><script>
		window.alert('Enter the Correct Details');
		</script><?php
	}
	$id=$_SESSION['uid'];
	$query="SELECT * FROM `user` WHERE `id`='$id'";
	$run=mysqli_query($con,$query);
	$data=mysqli_fetch_assoc($run);
	if($pass===$data['password'])
	{
		if($price>$data['balance'])
		{
			{	?><script>
		location.replace('dashboard.php');	
		window.alert('Not Enough Balance');
		</script><?php
			}
		}
		$balance=$data['balance']-$price;
		if($store=='local')
		{
			$a=$price*1.25/100;
			$balance+=$a;
		}
		else
		{
			$a=$price*1/100;
			$balance+=$a;
		}
		$query2="UPDATE `user` SET `balance`='$balance' WHERE `id`='$id'";
		$run2=mysqli_query($con,$query2);
		$payto=$_POST['to'];
		$query4="SELECT * FROM `user` WHERE `name`='$payto'";
		$run4=mysqli_query($con,$query4);
		$data4=mysqli_fetch_assoc($run4);
		$p=$data4['balance']+$price;
		$query3="UPDATE `user` SET `balance`='$p' WHERE `name`='$payto'";
		$run3=mysqli_query($con,$query3);
		$date=date('Y-m-d H:i:s');
		$ip=$_SERVER['REMOTE_ADDR'];
		$to=$data4['id'];
		$query5="INSERT INTO `tranhistory`(`idfrom`, `price`, `datetime`, `ip`, `idto`) VALUES ('$id','$price','$date','$ip','$to')";
		$run5=mysqli_query($con,$query5);
		?><script>
		location.replace('dashboard.php');
		window.alert('Transaction Successful You got $<?php print $a." as a Reward for purchasing from ".$store." store."; ?>');
		</script><?php
	}
	else
	{
		?><script>
		window.alert('Enter the Correct Password');
		</script><?php
	}	
}
?>