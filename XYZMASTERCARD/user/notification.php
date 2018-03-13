<?php include('header.php');
	$query="SELECT * FROM `tranhistory` WHERE `idto`='$id' OR`idfrom`='$id'";
	$run=mysqli_query($con,$query);
 ?>
<table align="center" border="1">
	<tr>
		<td align="center">Transaction History</td>
	</tr>
	<?php
	while($data=mysqli_fetch_assoc($run))
	{
		if($data['idto']==$id)
		{
			$query1="SELECT `name` FROM `user` WHERE `id`='$data[idfrom]'";
			$run1=mysqli_query($con,$query1);
			$data1=mysqli_fetch_assoc($run1);
			?>
			<tr>
				<td align="center"><?php print "You got $".$data['price']." from ".$data1['name']." at ".$data['datetime'];?></td>
			<tr><?php
		}
		else
		{
			$query1="SELECT `name` FROM `user` WHERE `id`='$data[idto]'";
			$run1=mysqli_query($con,$query1);
			$data1=mysqli_fetch_assoc($run1);
			?>
			<tr>
				<td align="center"><?php print "You paid $".$data['price']." to ".$data1['name']." at ".$data['datetime'];?> </td>
			<tr><?php
		}
		
	}
	?>
</table>
<?php include('footer.php'); ?>