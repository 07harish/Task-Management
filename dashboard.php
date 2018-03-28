<?php require_once("modules/html-header.php"); ?>
<?php 
  include "modules/verify.php";
  include "modules/connect.php";
  $e=$_SESSION['email'];
  
  $sql1="SELECT rate, workedhrs, rate * workedhrs as 'gettingpaid' FROM user_dash WHERE email='$e'";
  $result1=mysqli_query($conn,$sql1);
  $Row1 = (mysqli_fetch_assoc($result1));
  $paid=$Row1['gettingpaid'];
  
  $sql2 ="UPDATE user_dash SET gettingpaid='$paid' WHERE email='$e'";
  $sql3="SELECT * FROM task WHERE assignedto='$e'";
  
  $result2=mysqli_query($conn,$sql2);
  $result3=mysqli_query($conn,$sql3);
  
  
  //echo "<br><br><b>Hey ".$Row['fname']."!";
  //echo "<b><br><br>Welcome to TaskManagement! You're logged as<b> ".$_SESSION['email'];
  
  if (isset($_POST['taskid'])) {
  	//variables to hold our submitted data with post
  	$taskid = $_POST['taskid'];      
  if (mysqli_num_rows($result3)) {
  		//echo "Welcome";
  		//creating a session name with username ad inserting the submitted username
  		$_SESSION['taskid'] = $taskid;
          
      
  		//redirecting to homepage
  		header("Location:filetransfer.php");
  	}else{
  		//display error if no record exists
  		echo "Error : Invalid Login Credentials";
  	}
  }
  ?>
<?php require_once("modules/body-footer.php"); ?>
<head>
  <title>TaskManagement</title>
  <style>
  </style>
  <script>
    function reveal() {
    if (document.getElementById("hidden").style.display === "none") {
    	document.getElementById("hidden").style.display = "block";
    } else { document.getElementById("hidden").style.display = "none"; }
    }
    
  </script>
  <?php require_once("modules/body-footer.php"); ?>
  <br><button onclick="reveal()" style="width:10%;height:5%;">Tasks</button>
  <button  style="width:10%;height:5%;"><a style="text-decoration:none;color:black;" href="demo.php">Smart View</a></button><br>
<body>
  <form method="POST" id="hidden" style="display: none"  "margin-right: 850px;">
  <?php 
    if(mysqli_num_rows($result3) > 0){
       while ($Row3=(mysqli_fetch_assoc($result3))) {
    
       ?> 
  <?php $taskid= $Row3['task_id']; ?>
  <br><br>
  <br><?php echo "<b>Task ID".$Row3['task_id']; ?>
  <br><br><?php echo "Title :".$Row3['title']; ?>  
  <br><br>	 <?php echo "Description :".$Row3['description']; ?>	
  <br><br>    <?php echo "Given on :".$Row3['givenon']; ?>
  <br><br>    <?php echo "Deadline :".$Row3['deadline']; ?>
  <br><br>	<button type="submit" style="width:10%;" class="like" name="taskid" value="<?php echo $taskid ?>">Upload</button>
  <br><?php echo "------------------------------------------------------------------------------------------------------------------------------------------"; ?>
  <?php   
    } 
    } else{
    echo "no tasks";}
    
    ?> 
  </form>
  <style>
    form{
    width: 90%;
    }
  </style>
</body>