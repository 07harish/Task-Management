<?php
  require_once("modules/html-header.php"); 
   require_once('modules/connect.php');
   include "modules/verify.php";
  require_once("modules/body-footer.php"); 
   
   if(isset($_FILES) & !empty($_FILES)){
     $name = $_FILES['file']['name'];
     $size = $_FILES['file']['size'];
     $type = $_FILES['file']['type'];
     $tmp_name = $_FILES['file']['tmp_name'];
  } 
  
  if (isset($_SESSION['email'])){
     $e=$_SESSION['email'];
  
  }
  if (isset($_SESSION['taskid'])){
   $t=$_SESSION['taskid'];
     if (!file_exists('uploads/'.$t)) {
     mkdir('uploads/'.$t, 0777, true);
  }
  $location = 'uploads/'.$t.'/';
  }
  
  
  
  if(isset($name) & !empty($name))
    {
     if(move_uploaded_file($tmp_name, $location.$name) & isset($_POST['description'])){
  		$desc= $_POST['description'];
  		$sql = "INSERT INTO `upload` (email, name, size, type, location, task_id,description) VALUES ('$e','$name','$size','$type','$location$name','$t','$desc')";
           $res=mysqli_query($conn,$sql);
           if($res){
                    echo "Uploaded successful!";
                     
                   }
         }
     else{
           echo " Failed to upload";
          }
     }
  
  ?> 
<html>
  <head>
    <script>
      function success() {
      	  var file = document.getElementById("InputFile").files[0];
      	 // var text = document.getElementById("desc").value;
      	if(file){
      				alert('Uploaded Successfully!');
      		return true;
      			}
      	else 	{
      				alert('Please upload file!');
      		document.getElementById("InputFile").style.color="#ea5050";
      		document.getElementById("InputFile").style.borderColor="#ea5050";
      		document.getElementById("desc").focus();
      		return false;
      			}
      	return false;
      }		
      
    </script>
    <style>
      body {
      padding-left: 120px;
      color: #000000;
      }      
      form {
      color: #ffeeee;
      border:2px solid #818181;
      height: 30%;
      width:80%;
      background-color: #acacac;
      }
      form:hover {
      color: #ffeeee;
      border:2px solid #818181;
      height: 30%;
      width:80%;
      background-color: #c7c7c7;
      }
      button{
      width: 17%;
      height: 13%;
      font-style: normal;
      font-family:fantasy;
      letter-spacing: 2px;
      word-spacing:  10px;
      color:#606060;
      border:2px solid #8e8a8a;
      }
      button:hover{
      width: 22%;height: 15%;
      border:2px solid #646464;
      font-family:fantasy;
      letter-spacing: 2px;
      color:#ffffff;
      word-spacing:  10px;
      transform: scale(1.0); 
      }
      textarea{
      width:85%;
      height:100%;
      border:2px solid #8e8a8a;
      border-radius:4px;
      margin:8px 0;
      outline:none;
      padding:8px;
      box-sizing:border-box;
      transition:.3s;
      background-color:#acacac ;
      font-family:cursive;
      word-spacing: 10px;
      letter-spacing: 2px;
      font-size: 17px;text-align: center;font-weight: bolder;
      }
      textarea:hover{
      width:85%;
      border:2px solid #8e8a8a;
      border-radius:4px;
      margin:8px 0;
      outline:none;
      padding:8px;
      box-sizing:border-box;
      transition:.4s;
      background-color:#c7c7c7 ;
      font-family:cursive;
      font-size: 17px;
      word-spacing: 10px;
      letter-spacing: 2px;
      text-align: center;
      vertical-align: middle;
      font-weight: bolder;
      }
      input[type=file]{
      width:60%;
      border:2px solid #7b7b7b;
      border-radius:4px;
      margin:8px 0;
      outline:none;
      padding:8px;
      box-sizing:content-box;
      transition:.3s;
      background-color: #cbcbcb;
      font-family:cursive;
      font-size: 15px;
      word-spacing: 10px;
      letter-spacing: 1px;
      color: #5c5c5c;
      }
      label{
      font-style: normal;
      font-family:cursive;
      letter-spacing: 2px;
      word-spacing:  10px;
      color:#5c5c5c;
      }
      h2{
      font-style: normal;
      font-family:cursive;
      letter-spacing: 2px;
      word-spacing:  10px;
      color:black;
      }
    </style>
    <br><br><br>
    <link rel="stylesheet" href="brack-1-filetransfer.css" >
  </head>
  <body>
    <center>
      <form class="form-signin" method="POST" enctype="multipart/form-data">
        <center>
          <h2>Uploading for task_id: <?php echo $t; ?></h2>
        </center>
        <div class="form-group" >
          <label for="InputFile"><br><b>Submission :we recommend you to submit as 'Zip file'</b></label>
          <br> 
          <input   type="file" name="file" id="InputFile">
        </div>
        <br>
        <label for="desc"><b>Description:</b></label> <br>
        <textarea rows="8" cols="80" name="description" id="desc" placeholder="(optional) Description : Any remarks you need to say about your Submission :: How to open :: read :: Execute." ></textarea>
        <br><br><button onclick="return success()"  class="btn btn-lg btn-primary btn-block" type="submit">Upload</button>
      </form>
    </center>
  </body>
</html>