<html>
<head>
<title>Home page</title>
<link rel="stylesheet" href="css/dashboard.css"/>
</head>
<body>
<table align="right">
	<tr>
		<td><a href="user/login.php"> Login |</a></td>
		<td><a href="user/signin.php"> SignUp |</a></td>
		<td><a href="user/store.php"> XYZ Store |</a></td>
		<td><a href="user/aboutus.php"> About us </a></td>
	</tr>	
</table>
<br><br><br><br>
<div align="center" class="messege">Welcome to XYZ Master Card</div>

<style>
.mySlides {
	display:none;
	height:300px;	
}
.slide
{
	max-height:500px;
	border:inset;
}
</style>
<div align="center">
<div style="max-width:500px" align="center" class="slide">
  <img class="mySlides" src="css/dash.jpeg" style="width:100%">
  <img class="mySlides" src="css/store.jpg" style="width:100%">
  <img class="mySlides" src="css/ind1.jpeg" style="width:100%">
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
<br><br>
<table align="center" id="footer" style="background-color:#CCFF00; color:#00008B">
	<tr>
		<td><p id="demo"></p>
<script>
document.getElementById("demo").innerHTML = Date();
</script></td>
	</tr>
	<tr>
		<td>Your public ip : <?php print $_SERVER['REMOTE_ADDR']; ?></td>
	</tr>
	<tr>
		<td>Contact us:</td>
		<td><a href="user/aboutus.php">About us</a></td>
	</tr>
	<tr>
		<td>Phone : 033-1111-1111 (Toll Free)</td>
	</tr>
	<tr>
		<td>Email : XYZmaster.card@gmail.com</td>
	</tr>
</table>
</body>
</html>