<?php require_once("modules/html-header.php"); ?>
<?php
  include "modules/connect.php";
  session_start();
  if (isset($_SESSION['username'])) {
  	header("Location:dashboard.php");
  }
  if (isset($_POST['username'])) {
  	$username = $_POST['username'];
  	$pass = ($_POST['password']);
  	$sql = "SELECT * FROM user WHERE email='$username' AND password='$pass'";
      echo "$sql";
  	$re = mysqli_query($conn, $sql);
     
  
  	if (mysqli_num_rows($re)) {
  		$_SESSION['email'] = $username;
  		header("Location:dashboard.php");
  	}else{
  		echo "Error : Invalid Login Credentials";
  	}
  }
  ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
    <link rel="icon" href="../favicon.png" type="image/png">
    <style> 
      body {
      padding-left: 70px;
      background-color: #989898;
      opacity: 0.7;
      }
      button{
      width: 10%;
      position: absolute;
      left: 25%;
      }
      input[type=text]{
      width:60%;
      border:2px solid #1f1f1f;
      border-radius:4px;
      margin:8px 0;
      outline:none;
      padding:8px;
      box-sizing:border-box;
      transition:.3s;background-color: darkgray;
      }
      input[type=text]:focus{
      border-color: #298cea; width:70%;
      box-shadow:0 0 8px 0 #004689;
      font-family: cursive;
      font-size: 15px;
      font-weight: bold;
      background-color: darkgray;
      }
      .inputWithIcon input[type=text]{
      padding-left:10px;
      }
      .inputWithIcon{
      position:relative;
      }
      .inputWithIcon i{
      padding:9px 8px;
      color:#5a5555;
      transition:.3s;
      }
      .inputWithIcon input[type=text]:focus + i{
      color:	#000000;
      }
      .inputWithIcon.inputIconBg i{
      background-color:#aaa;
      color:#fff;
      padding:9px 4px;
      border-radius:7px 0 0 4px;
      }
      .inputWithIcon.inputIconBg input[type=text]:focus + i{
      color:#fff;
      background-color:dodgerBlue;
      }
      form{
      padding-left: 50px;
      width: 50%;
      }
    </style>
  </head>
  <style></style>
  <body>
    <br><br><br><br>
    <form class="myform" method="POST">
      <div class="inputWithIcon">
        <input type="text" name="username" placeholder="Email">
        <i class="fa fa-envelope fa-lg fa-fw" style="font-size:22px" aria-hidden="true"></i>
      </div>
      <div class="inputWithIcon">
        <input type="text" name="password" placeholder="Password">
        <i class="fa fa-product-hunt" style="font-size:22px" aria-hidden="true"></i>
      </div>
      <br>
      <button style="font-size:14px" type="submit"><i class="fa fa-check-square-o"></i> Login</button>    
    </form>
  </body>
</html>