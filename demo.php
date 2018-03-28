<?php
  include "modules/verify.php";
  include "modules/connect.php";
  include "modules/body-footer.php";
  include "modules/html-header.php";
  
  $sql="SELECT * FROM task WHERE assignedto='$e'";
  $result=mysqli_query($conn,$sql);
  if (isset($_POST['taskid'])) {
  	//variables to hold our submitted data with post
  	echo $taskid = $_POST['taskid'];      
     if (mysqli_num_rows($result)) {
  		//echo "Welcome";
  		//creating a session name with username ad inserting the submitted username
  		$_SESSION['taskid'] = $taskid;
          
      echo $taskid;
  		//redirecting to homepage
  		header("Location:filetransfer.php");
  	} else{
  		//display error if no record exists
  	echo "Error : Invalid Login Credentials";
  	}
  }
  
  ?>
<!DOCTYPE html>
<html>
  <head>
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
    <form method="POST">
      <?php 
        if(mysqli_num_rows($result) > 0){
           while ($Row3=(mysqli_fetch_assoc($result))) {
        ?>
      <?php $taskid= $Row3['task_id']; ?>
      <div  class="card">
        <h2 style="font-family:monospace;font-weight:bold;font-size:22px;"><?php echo $Row3['title'];?></h2>
        <?php echo "<h2>task id: ".$Row3['task_id']."<h2>"; ?>
        <div class="container">
          <?php echo "<b><i><br>Estimated hours: ".$Row3['estimated']."</i>";?><br><br>
          <b  style="font-size:20px;font-weight:bold;">
            <center>Description:</center>
          </b>
          <?php
            $arr = array();
            $string =$Row3['description'];
            $len =$Row3['description'];
            	$arr = explode(" ", $string);
            $display_string ="";
             if(strlen($string)>20){
            foreach($arr AS $word){
            $length = strlen($display_string) + strlen($word);
            if($length >= 30){
            $display_string .= "".$word." ";
            }else{
            $display_string .= $word." ";
            } 
            }
            echo $display_string;
            //echo strlen($display_string);	  
            }
             ?>
          <?php echo "<br><br>Given on: ".$Row3['givenon']; ?><?php echo "<br><br>Deadline: ".$Row3['deadline'];
            ?>
          <br>
          <center><button type="submit" class="like" name="taskid" value="<?php echo $taskid ?>">Upload</button></center>
        </div>
      </div>
      <?php   
        } 
        } else{
        echo "no tasks";}
        
        ?>
    </form>
  </body>
</html>