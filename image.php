<?php 
  require_once('modules/connect.php');
  include "modules/verify.php";
  if(isset($_POST['rate'])) {
   	$sql1="UPDATE user_dash SET gettingpaid=''";
  
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
  </script>
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
  <form class="form-signin" method="POST" enctype="multipart/form-data" >
    <h2 class="form-signin-heading">Profile photo</h2>
    <div class="form-group">
      <label for="InputFile">Upload image (10Mb)</label><br>
      <input style=" width:300px"  type="file" name="file" id="img" onchange="validateImage()">
      <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="success()" >Upload</button>
    </div>
  </form>
  <br>	
  <form class="YourRate" method="post">
    <div class="form-rate">
      <label >Your Rate per Hour</label>
      <input type="number" class="rate" name="rate" >
    </div>
  </form>
</body>