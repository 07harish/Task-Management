<?php
include "modules/connect.php";
include "modules/verify.php";
include "modules/body-footer.php";
include "modules/html-header.php";
$sql= "SELECT * FROM messages where email='jon@gmail.com'";
$result=mysqli_query($conn,$sql);
 $Row = (mysqli_fetch_assoc($result));
?>
<form>
<div class="card">
	<div class="container">
   <br><?php echo "<b>Message<br><b>".$Row['text']; ?>
  <br><br><?php echo "time : ".$Row['time']; ?>  
  <br><br>	 <?php echo "from : ".$Row['to_whom']; ?></div>
</div></form>
<?php	
$page = $_SERVER['PHP_SELF'];
$sec = "5";
echo "Watch the page reload itself in 10 second!";
?>
<html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
		 <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      .card {
      padding-bottom: 2%;
      padding-top: 2%;
      padding-left: 2%;
      padding-right: 2%;
      letter-spacing: 1px;
      word-spacing: 5px;
      word-break: normal;
      text-align: left;
      box-shadow: 0 20px 50px 0 rgba(23, 21, 21, 0.2);
      transition: 0.1s;
      width: 135%;
      color: #2f2f2f;
      background-color: grey;
      border-color: aquamarine;	
      margin: 40px;
      font-family: cursive;
      }
      .card:hover {
      box-shadow: 0 15px 30px 0 rgb(96, 237, 255);background-color: #bebebe;
      font-family: cursive;
      }
      .container {
      width: 100%; resize: both;
      overflow: auto;
      font-size: 16px;
      letter-spacing: 1px;
      }
      form{
      width: 70%;
      padding-right: 3%;
      }
      button{
      height: 30px;width: 70px;
      }button:hover{
      height: 30px;width: 95px;
      transform: scale(1.0); 
      cursor:pointer; 
      }
    </style>
    </head>
	
	
    <body>
    
    </body>
</html>