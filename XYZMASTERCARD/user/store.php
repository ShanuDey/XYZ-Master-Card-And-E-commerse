<html>
<head>
<title>XYZ Store</title>
<link rel="stylesheet" href="../css/store.css" />
</head>
<body>
<table align="left">
	<tr>
		<td><a href="dashboard.php"> Back</a></td>
	</tr>
</table>
<table align="center">
	<tr>
		<td><a href="login.php"> Login |</a></td>
		<td><a href="signin.php"> SignUp </a></td>
	</tr>
</table>
<div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
    <table align="center">
	<td style="font-size:40px; color:#990000">The</td>
	<td style="font-size:80px; color:#FF6600">XYZ STORE</td>
	</tr>
</table>
<br><br />
<style>
.mySlides {
	display:none;
	height:280px;;	
}
.slide
{
	max-height:500px;
	border:inset;
}
</style>
<div align="left">
<div style="max-width:500px" align="center" class="slide">
  <img class="mySlides" src="../css/me.jpeg" style="width:100%">
  <img class="mySlides" src="../css/food.jpg" style="width:100%">
  <img class="mySlides" src="../css/elec.jpg" style="width:100%">
</div>
</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
  <table align="left">
		<tr>
			<td><a href="search.php?p=Fashion"> FASHION |</a></td>
			<td><a href="search.php?p=Food"> FOOD |</a></td>
			<td><a href="search.php?p=Electronics"> ELECTRONICS |</a></td>
		</tr>
  </table>	
</div>
</body>
</html>
