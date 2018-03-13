<?php include('header.php'); ?>
<br><div align="center" class="messege" style="font-size:80px">Welcome <?php print $data['name']; ?>, to XYZ Master Card</div>
<br><br><br>
<table align="center" >
	<tr>
		<td><a href="profile.php"> My Account Details |</a></td>
		<td><a href="store.php"> XYZ Store |</a></td>
		<td><a href="purchase.php?store=other"> Purchase |</a></td>
		<td><a href="notification.php"> Transaction History </a></td>
	</tr>
</table>
<?php include('footer.php'); ?>
