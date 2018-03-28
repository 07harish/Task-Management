<?php require_once("modules/html-header.php");
  require_once('modules/connect.php');
  include "modules/verify.php";
  include "modules/body-footer.php";
  if(isset($_POST['rate']) & (isset($_SESSION['email']))) {
       $rate=$_POST['rate'];
   		$e=$_SESSION['email'];
  
   	$sql1="UPDATE user_dash SET rate='$rate' WHERE email='$e'";
   	$result=mysqli_query($conn,$sql1);
  }
  ?>
<head>
  <script>
    function validateImage() {
        var formData = new FormData();
     
        var file = document.getElementById("img").files[0];
     
        formData.append("Filedata", file);
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
            alert('Please select a valid image file');
            document.getElementById("img").value = '';
            return false;
        }
        if (file.size > 10240000) {
            alert('Max Upload size is 1MB only');
            document.getElementById("img").value = '';
            return false;
        }
        return true;
    }
    	function success() {
    		  var file = document.getElementById("img").files[0];
    		if(file){
    					alert('Uploaded Successfully!');
    				}
    		else 	{
    					alert('Empty!');
    				}
    	}	
    	function profile() {
    		var newrate = document.getElementById("rate").value;
    		if(newrate>30) {
    			alert("Your new rate Updated");
    		}
    		else {
    			alert("Empty?!!!");
    		}
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
    text-align: center;
    }
    form:hover {
    color: #ffeeee;
    border:2px solid #818181;
    height: 30%;
    width:80%;
    background-color: #c7c7c7;
    }
    button{
    width: 18%;
    height: 13%;
    font-style: normal;
    font-family:fantasy;
    letter-spacing: 2px;
    word-spacing:  10px;
    color:#606060;
    border:2px solid #8e8a8a;
    }
    button:hover{
    width: 18%;height: 14%;
    border:2px solid #646464;
    font-family:fantasy;
    letter-spacing: 2px;
    color:#ffffff;
    word-spacing:  10px;
    }
    label{
    font-style: normal;
    font-family:cursive;
    letter-spacing: 2px;
    word-spacing:  10px;
    color:#5c5c5c;
    font-size: 13px;
    }
    h2{
    font-style: normal;
    font-family:cursive;
    letter-spacing: 2px;
    word-spacing:  10px;
    color:black;
    text-align: center;
    font-size: 18px;
    }
    .full{
    padding-left: 10%;
    padding-bottom: 0;
    }
    }
    input, input[type=number] {
    padding-left: 0;
    width: 20%;
    color: black;
    font-family: cursive;
    font-weight: bolder;
    border:2px solid #818181;
    background-color:#888888;
    font-size: 20px;
    }
    input:hover{
    padding-left: 0;
    width: 21%;
    color: black;
    font-family: cursive;
    font-weight: bolder;
    border:3px solid #6a6a6a;
    background-color: #888888;
    }
    input[type=file],input[type=file]:hover{
    width: 45%;
    height:10%;
    }
  </style>
</head>
<body>
  <?php
    if(isset($_FILES) & !empty($_FILES)){
       $name = $_FILES['file']['name'];
      // $size = $_FILES['file']['size'];
      // $type = $_FILES['file']['type'];
       $tmp_name = $_FILES['file']['tmp_name'];
    } 
    if (isset($_SESSION['email'])){
       $e=$_SESSION['email'];
    
       if (!file_exists('profile_images/'.$e)) {
       mkdir('profile_images/'.$e, 0777, true);
    }
    $location = 'profile_images/'.$e.'/';
    }
    
    
    if(isset($name) & !empty($name))
      {
       if(move_uploaded_file($tmp_name, $location.$name)){
                      $sql = "UPDATE `user` SET `image`='$location$name' WHERE `email`='$e'";
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
  <div class="full">
    <form class="form-signin" method="POST" enctype="multipart/form-data" >
      <h2 class="form-signin-heading">Profile photo</h2>
      <div class="form-group">
        <label for="InputFile">Upload image below 10Mb </label><br>
        <input  type="file" name="file" id="img" onchange="validateImage()">
        <br><br>
        <br><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="success()" >Upload</button>
      </div>
    </form>
    <br>	
    <form class="YourRate" method="post">
      <div class="form-rate">
        <br>
        <h2>Your Rate per Hour</h2>
        <br>
        <input style="background-color:#888888;" type="number" id="rate" class="rate" name="rate" ><br><br>
        <button type="submit" onclick="profile()" >Ok</button>
      </div>
    </form>
  </div>
</body>