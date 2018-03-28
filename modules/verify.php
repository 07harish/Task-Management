<link href="https://fonts.googleapis.com/css?family=Voltaire" rel="stylesheet">
	<style>
		p {
			position: absolute;
            top: 45px;right: 90px;
			font-size: 15px;letter-spacing: 2px;
			font-family:cursive;
		}
	</style><p>
<?php
session_start();
if(isset($_SESSION["email"])){
    include "connect.php";
    $e=$_SESSION['email'];
	$sql = "SELECT * FROM user WHERE email='$e'";
$result=mysqli_query($conn,$sql);
$Row=(mysqli_fetch_assoc($result));
echo "<b>Hey ".$Row['fname']."";
echo ", You're logged as : <b>".$_SESSION['email']; 
}
else{
	header("Location: login.php");
}
	?></p>
<br><br>